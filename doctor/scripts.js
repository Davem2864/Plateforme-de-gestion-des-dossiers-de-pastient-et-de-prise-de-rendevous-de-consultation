document.addEventListener('DOMContentLoaded', () => {
    const messagesContainer = document.getElementById('messages');
    const messageText = document.getElementById('messageText');
    const sendButton = document.getElementById('sendButton');

    const docid = document.getElementById('docid').value; // Doctor ID (dynamic)

    // Ajoutez un gestionnaire d'événements pour le clic sur le bouton d'envoi
    sendButton.addEventListener('click', () => {
        // Récupérez le texte du message
        const text = messageText.value.trim();
        if (text) {
            // Envoyez le message
            sendMessage(text);
        }
    });

    // Chargez les messages du serveur
    function loadMessages() {
        fetch('get_messages.php')
            .then(response => response.json())
            .then(messages => {
                messagesContainer.innerHTML = '';
                messages.forEach(message => {
                    displayMessage(message.message, message.heure_envoi, message.sender === 'doc', message.sender);
                });
            })
            .catch(error => console.error('Error loading messages:', error));
    }

    // Affiche un message dans le conteneur des messages
    function displayMessage(text, time, sent, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message');
        if (sent || sender === 'doc') {
            messageDiv.classList.add('sent');
        } else {
            messageDiv.classList.add('received');
        }
        messageDiv.textContent = text;
        const timeDiv = document.createElement('div');
        timeDiv.classList.add('time');
        timeDiv.textContent = time;
        messageDiv.appendChild(timeDiv);
        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    // Envoie un message au serveur
    function sendMessage(text) {
        fetch('send_message.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ docid, message: text })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Affiche le message envoyé
                displayMessage(text, new Date().toLocaleTimeString(), true, 'doc');
                // Efface le champ de texte
                messageText.value = '';
                // Charge les messages après un délai
                setTimeout(loadMessages, 1000);
            } else {
                console.error('Error sending message:', data.message);
            }
        })
        .catch(error => console.error('Error sending message:', error));
    }

    // Charge les messages au chargement de la page
    loadMessages();
});
