<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des patients</title>
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
        var patientId = this.getAttribute('data-id');
        // Use AJAX to get patient details
        fetch('view_patient.php?id=' + patientId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var patient = data.data;
                    Swal.fire({
                        title: 'Informations sur le Patient',
                        html: `
                        <div style="text-align: left;">
                            <p><strong>Nom:</strong> ${patient.name}</p>
                            <p><strong>Email:</strong> ${patient.email}</p>
                            <p><strong>Numéro national:</strong> ${patient.nic}</p>
                            <p><strong>Contact:</strong> ${patient.tele}</p>
                            <p><strong>Adresse:</strong> ${patient.address}</p>
                            <p><strong>Date de Naissance:</strong> ${patient.dob}</p>
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
