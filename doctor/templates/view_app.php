<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des médicaments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body>
<script>
document.querySelectorAll('.view-app').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var appId = this.getAttribute('data-id');

        // Utilisez AJAX pour obtenir les détails de l'approvisionnement
        fetch('view_app.php?id=' + appId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var approvisionnement = data.data;
                    Swal.fire({
                        title: 'Informations sur l\'approvisionnement',
                        html: `
                        <div style="text-align: left;">
                            <p><strong>ID:</strong> ${approvisionnement.apid}</p>
                            <p><strong>Nom du médicament:</strong> ${approvisionnement.nom}</p>
                            <p><strong>Quantité:</strong> ${approvisionnement.qte} bte</p>
                            <p><strong>Prix d'achat:</strong> ${approvisionnement.prix} $</p>
                            <p><strong>Date d'approvisionnement:</strong> ${approvisionnement.date_app}</p>
                        </div>
                        `,
                        icon: 'info',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Erreur',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Erreur',
                    text: 'Une erreur s\'est produite lors de la récupération des détails.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    });
});

</script>
</body>
</html>
