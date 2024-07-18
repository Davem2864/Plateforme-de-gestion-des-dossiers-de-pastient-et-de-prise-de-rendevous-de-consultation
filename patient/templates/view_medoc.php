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
document.querySelectorAll('.view-medoc').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var medId = this.getAttribute('data-id');

        // Utilisez AJAX pour obtenir les détails du médicament
        fetch('view_medoc.php?id=' + medId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var medoc = data.data;
                    Swal.fire({
                        title: 'Informations sur le médicament',
                        html: `
                        <div style="text-align: left;">
                            <p><strong>Nom:</strong> ${medoc.nom}</p>
                            <p><strong>Description:</strong> ${medoc.description}</p>
                            <p><strong>Date d'expiration:</strong> ${medoc.date_exp}</p>
                            <p><strong>Prix:</strong> ${medoc.prix}</p>
                            <p><strong>Quantité:</strong> ${medoc.qte}</p>
                            <p><strong>Dosage:</strong> ${medoc.dosage}</p>
                            <p><strong>Fabricant:</strong> ${medoc.fab}</p>
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
