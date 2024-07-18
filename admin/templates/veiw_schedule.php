<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voir les Détails de la Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: black;
        }
        td {
            background-color: #f2f2f2;
            color: black;
        }
        @media print {
            th, td {
                border: 1px solid black !important;
            }
        }
    </style>
</head>
<body>
<script>
document.querySelectorAll('.view-schedule').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var scheduleId = this.getAttribute('data-id');
        fetch('view_schedule.php?id=' + scheduleId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var schedule = data.data;
                    var patientsHtml = schedule.patients.map(patient => `
                        <tr style="text-align:center;">
                            <td>${patient.pid}</td>
                            <td style="font-weight:600;padding:25px">${patient.pname}</td>
                            <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">${patient.apponum}</td>
                            <td>${patient.ptel}</td>
                        </tr>
                    `).join('');

                    Swal.fire({
                        title: 'Détails de la Session',
                        width: '70%',
                        html: `
                            <div style="text-align: left;">
                                <p><strong>Titre de la session:</strong> ${schedule.title}</p>
                                <p><strong>Docteur:</strong> ${schedule.docname}</p>
                                <p><strong>Date de la session:</strong> ${schedule.scheduledate}</p>
                                <p><strong>Heure de la session:</strong> ${schedule.scheduletime}</p>
                                <p><strong>Patients inscrits:</strong> ${data.data.patients.length}/${schedule.nop}</p>
                                <div class="abc scroll" style="display: flex; justify-content: center;">
                                    <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                        <thead>
                                            <tr>
                                                <th>Patient ID</th>
                                                <th>Nom du Patient</th>
                                                <th>Numéro de Rendez-vous</th>
                                                <th>Téléphone du Patient</th>
                                            </tr>
                                        </thead>
                                        <tbody>${patientsHtml}</tbody>
                                    </table>
                                </div>
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
