<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des patients</title>
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
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
<script>
window.onbeforeprint = function() {
    var tables = document.getElementsByTagName('table');
    for (var i = 0; i < tables.length; i++) {
        var table = tables[i];
        var rows = table.getElementsByTagName('tr');
        for (var j = 0; j < rows.length; j++) {
            var row = rows[j];
            var cells = row.getElementsByTagName('td');
            for (var k = 0; k < cells.length; k++) {
                var cell = cells[k];
                cell.style.border = '1px solid black';
            }
        }
    }
}

function printDiv() {
    var divContents = document.getElementById("imprimer").innerHTML;
    var mywindow = window.frames["print_frame"];
    mywindow.document.write('<html><head><title></title>');
    mywindow.document.write('<style>@media print {table, th, td {border: 1px solid black !important;}}</style>');
    mywindow.document.write('</head><body>');
    mywindow.document.write(divContents);
    mywindow.document.write('</body></html>');
    mywindow.document.close(); // nécessaire pour IE >= 10
    mywindow.focus(); // nécessaire pour IE >= 10
    mywindow.print();
}

document.querySelectorAll('.view-doc').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var dossierId = this.getAttribute('data-did');
        var patientId = this.getAttribute('data-pid');

        fetch('view_docp.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'did=' + encodeURIComponent(dossierId) + '&pid=' + encodeURIComponent(patientId)
        })
        .then(response => response.json())
        .then(data => {
                if (data.success) {
                    var patient = data.data;
                    var dossiersHtml = '<h5>Dossiers</h5>';
                    patient.dossiers.forEach(dossier => {
                        dossiersHtml += `
                            <p><strong>ID Dossier:</strong> ${dossier.did}</p>
                            <p><strong>Date de Création:</strong> ${dossier.date_c}</p>
                            <p><strong>Date de Mise à Jour:</strong> ${dossier.date_maj}</p>
                            <hr>
                        `;
                    });

                    var appointmentsHtml = '<h5>Rendez-vous</h5><table><tr><th>Num</th><th>Titre</th><th>Docteur</th><th>Date</th></tr>';
                    patient.appointments.forEach(appointment => {
                        appointmentsHtml += `
                            <tr>
                                <td>${appointment.apponum}</td>
                                <td>${appointment.title}</td>
                                <td>${appointment.docname}</td>
                                <td>${appointment.appodate}</td>
                            </tr>
                        `;
                    });
                    appointmentsHtml += '</table>';

                    var treatmentsHtml = '<h5>Traitements</h5><table><tr><th>Nom</th><th>Description</th><th>Dosage</th><th>Fréquence</th><th>Etat</th><th>Effet Secondaire</th></tr>';
                    patient.treatments.forEach(treatment => {
                        treatmentsHtml += `
                            <tr>
                                <td>${treatment.nom}</td>
                                <td>${treatment.description}</td>
                                <td>${treatment.dosage}</td>
                                <td>${treatment.frequence}</td>
                                <td>${treatment.etat}</td>
                                <td>${treatment.effet_sec}</td>
                            </tr>
                        `;
                    });
                    treatmentsHtml += '</table>';

                    var prescriptionsHtml = '<h5>Prescriptions</h5><table><tr><th>Docteur</th><th>Médicament</th><th>Traitement</th><th>Instruction</th></tr>';
                    patient.prescriptions.forEach(prescription => {
                        prescriptionsHtml += `
                            <tr>
                                <td>${prescription.docname}</td>
                                <td>${prescription.nom}</td>
                                <td>${prescription.nom}</td>
                                <td>${prescription.instruction}</td>
                            </tr>
                        `;
                    });
                    prescriptionsHtml += '</table>';


                    Swal.fire({
                        title: 'Informations sur le Patient',
                        html: `
                        <div id="imprimer" style="text-align: left;">
                            <p><strong>Nom:</strong> ${patient.name}</p>
                            <p><strong>Email:</strong> ${patient.email}</p>
                            <p><strong>Numéro national:</strong> ${patient.nic}</p>
                            <p><strong>Contact:</strong> ${patient.tele}</p>
                            <p><strong>Adresse:</strong> ${patient.address}</p>
                            <p><strong>Date de Naissance:</strong> ${patient.dob}</p>
                            <hr>
                            ${dossiersHtml}
                            ${appointmentsHtml}
                            ${treatmentsHtml}
                            ${prescriptionsHtml}
                        </div><br>
                        <button onclick="printDiv()" class="btn btn-primary">Imprimer</button>
                        `,
                        icon: 'info',
                        confirmButtonText: 'OK',
                        width: '80%',
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonText: 'Fermer'
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