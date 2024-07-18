<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des docteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body>
<script>
document.querySelectorAll('.view-doctor').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var docId = this.getAttribute('data-id');

        // Use AJAX to get doctor details
        fetch('view_doctor.php?id=' + docId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var doctor = data.data;
                    Swal.fire({
                        title: 'Informations dur le Docteur',
                        html: `
                        <div style="text-align: left;">
                            <p><strong>Nom:</strong> ${doctor.name}</p>
                            <p><strong>Email:</strong> ${doctor.email}</p>
                            <p><strong>Numéro national:</strong> ${doctor.nic}</p>
                            <p><strong>Contact:</strong> ${doctor.tele}</p>
                            <p><strong>Spécialité:</strong> ${doctor.specialty}</p>
                        </div>
                        `,
                        icon: 'warning',
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
