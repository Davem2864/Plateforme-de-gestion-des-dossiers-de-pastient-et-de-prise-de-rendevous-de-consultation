document.addEventListener('DOMContentLoaded', () => {
    const messagesContainer = document.getElementById('messages');
    const messageText = document.getElementById('messageText');
    const sendButton = document.getElementById('sendButton');

    const pid = document.getElementById('pid').value; // Patient ID (dynamic)
// Ajoutez un gestionnaire d'événements pour le clic sur le bouton d'envoi
sendButton.addEventListener('click', () => {
    // Ici, vous enverrez votre message et effectuerez d'autres opérations nécessaires

    // Après avoir envoyé le message, rechargez la page
    window.location.reload();
});

    // Load messages from server
    function loadMessages() {
        fetch('get_messages.php')
            .then(response => response.json())
            .then(messages => {
                messagesContainer.innerHTML = '';
                messages.forEach(message => {
                    displayMessage(message.message, message.heure_envoi, message.sent, message.sender);
                });
            })
            .catch(error => console.error('Error loading messages:', error));
    }

    // Display a message in the messages container
    function displayMessage(text, time, sent, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message');
        if (sent) {
            messageDiv.classList.add('sent');
        } else if (sender === 'doc') {
            messageDiv.classList.add('received');
        } else {
            messageDiv.classList.add('sent');
        }
        messageDiv.textContent = text;
        const timeDiv = document.createElement('div');
        timeDiv.classList.add('time');
        timeDiv.textContent = time;
        messageDiv.appendChild(timeDiv);
        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    // Send a message to the server
    function sendMessage(text) {
        fetch('send_message.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ pid, message: text })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                displayMessage(text, new Date().toLocaleTimeString(), true, 'patient');
                messageText.value = '';
                // Simulate receiving a response from the doctor
                setTimeout(() => {
                    receiveMessage();
                }, 1000);
            } else {
                console.error('Error sending message:', data.message);
            }
        })
        .catch(error => console.error('Error sending message:', error));
    }

    // Handle sending a message
    sendButton.addEventListener('click', () => {
        const text = messageText.value.trim();
        if (text) {
            sendMessage(text);
        }
    });

    // Simulate receiving a message from the doctor
    function receiveMessage() {
        fetch('get_messages.php')
            .then(response => response.json())
            .then(messages => {
                const lastMessage = messages[messages.length - 1];
                displayMessage(lastMessage.message, lastMessage.heure_envoi, false, 'doc');
            })
            .catch(error => console.error('Error receiving message:', error));
    }

    // Load messages on page load
    loadMessages();
});
