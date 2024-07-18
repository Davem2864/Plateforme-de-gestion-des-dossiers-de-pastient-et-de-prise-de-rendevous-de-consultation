<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Rendez-vous</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body>
    <script>
        document.querySelectorAll('.view-appointment').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var appointmentId = this.getAttribute('data-id');
                // Use AJAX to get appointment details
                fetch('view_appointment.php?id=' + appointmentId)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            var appointment = data.data;
                            Swal.fire({
                                title: 'Informations sur le Rendez-vous',
                                html: `
                                <div style="text-align: left;">
                                    <p><strong>ID Rendez-vous:</strong> ${appointment.appoid}</p>
                                    <p><strong>Session:</strong> ${appointment.title}</p>
                                    <p><strong>Médecin:</strong> ${appointment.docname}</p>
                                    <p><strong>Patient:</strong> ${appointment.pname}</p>
                                    <p><strong>Date:</strong> ${appointment.scheduledate}</p>
                                    <p><strong>Heure:</strong> ${appointment.scheduletime}</p>
                                    <p><strong>Numéro de rendez-vous:</strong> ${appointment.apponum}</p>
                                    <p><strong>Date de prise de rendez-vous:</strong> ${appointment.appodate}</p>
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
