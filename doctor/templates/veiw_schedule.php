<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voir les Détails de la Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
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
                            <td>${patient.pid}
                            <td style="font-weight:600;padding:25px">${patient.pname}
                            <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">${patient.apponum}
                            <td>${patient.ptel}
                            <td>
                                <button class="btn btn-primary add-trait" data-pid="${patient.pid}" data-docid="${schedule.docid}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
                                <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                </svg>
                                <i class="bi bi-patch-plus"></i>
                                Traiter
                                </button>
                            
                        
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
                                                <th>Action</th>
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

                    document.querySelectorAll('.add-trait').forEach(button => {
                        button.addEventListener('click', function(event) {
                            event.preventDefault();
                            var patientId = this.getAttribute('data-pid');
                            var docId = this.getAttribute('data-docid');
                            Swal.fire({
                                title: 'Ajouter un traitement',
                                html: `
                            <form method="POST" id="add-new-form">
                                <input type="hidden" name="pid" value="${patientId}">
                                <input type="hidden" name="docid" value="${docId}">
                                <label for="description" class="form-label">Etat du Patient: </label>
                                <textarea name="etat" class="form-control" placeholder="Etat du Patient" required></textarea><br>
                                <label for="name" class="form-label">Nom du Traitement: </label>
                                <input type="text" name="nom" class="form-control" placeholder="Nom du Traitement" required><br>
                                <label for="description" class="form-label">Descrption du Traitement: </label>
                                <textarea name="desc" class="form-control" placeholder="Description du Traitement" required></textarea><br>
                                <label for="dosage" class="form-label">Dosage: </label>
                                <input type="text" name="dosage" class="form-control" placeholder="Dosage" required><br>
                                <label for="prix" class="form-label">Frequence de prise de medicament: </label>
                                <select name="frequence" class="form-control">
                                <option value="once-daily">Une fois par jour</option>
                                <option value="twice-daily">Deux fois par jour</option>
                                <option value="three-times-daily">Trois fois par jour</option>
                                <option value="four-times-daily">Quatre fois par jour</option>
                                <option value="every-other-day">Un jour sur deux</option>
                                <option value="once-weekly">Une fois par semaine</option>
                                </select>
                                <label for="Tele" class="form-label">Date de debut de traitement prevu: </label>
                                <input type="date" name="date_dbt" class="form-control" placeholder="Date de debut" required><br>
                                <label for="password" class="form-label">Date de fin de traitement prevu: </label>
                                <input type="date" name="date_fin" class="form-control" placeholder="Fabricant du medicament" required><br>
                                <label for="description" class="form-label">Effet Secondaire du Traitement: </label>
                                <textarea name="effet" class="form-control" placeholder="Effet secondaire du Traitement" required></textarea><br>
                                    </form>
                                `,
                                confirmButtonText: 'Ajouter',
                                focusConfirm: false,
                                preConfirm: () => {
                                const form = Swal.getPopup().querySelector('#add-new-form');
                                const formData = new FormData(form);
                                return fetch('add-trait.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.error) {
                                        Swal.showValidationMessage(data.message);
                                        throw new Error(data.message);
                                    }
                                    return data;
                                })
                                .catch(error => {
                                    Swal.showValidationMessage(`Request failed: ${error}`);
                                });
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Succès',
                                    text: 'Le traitement a été ajouté avec succès!',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    location.reload(); // Actualise la page
                                });
                            }
                        });
                    });
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
