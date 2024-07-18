<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body>
<script>
document.getElementById('addSessionBtn').addEventListener('click', function() {
    Swal.fire({
        title: 'Ajouter une nouvelle session',
        html: `
            <form id="addSessionForm">
                <table width="100%" class="sub-table scrolldown add-doc-form-container" border="0">
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="title" class="form-label">Titre de la session :</label>
                            <input type="text" name="title" class="form-control" placeholder="Nom de cette session" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="docid" class="form-label">Sélectionner le docteur :</label>
                            <select name="docid" class="form-control" required>
                                <option value="" disabled selected hidden>Choisissez un docteur dans la liste</option>
                                <?php
                                $list11 = $database->query("select * from doctor order by docname asc;");
                                while ($row00 = $list11->fetch_assoc()) {
                                    $sn = $row00["docname"];
                                    $id00 = $row00["docid"];
                                    echo "<option value=\"$id00\">$sn</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="nop" class="form-label">Nombre de patients / Numéros de rendez-vous :</label>
                            <input type="number" name="nop" class="form-control" min="0" placeholder="Le numéro de rendez-vous final pour cette session dépend de ce nombre" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="date" class="form-label">Date de la session :</label>
                            <input type="date" name="date" class="form-control" min="${new Date().toISOString().split('T')[0]}" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="time" class="form-label">Heure de la session :</label>
                            <input type="time" name="time" class="form-control" placeholder="Heure" required>
                        </td>
                    </tr>
                </table>
            </form>
        `,
        showCancelButton: true,
        confirmButtonText: 'Ajouter',
        preConfirm: () => {
            var form = document.getElementById('addSessionForm');
            var formData = new FormData(form);
            return fetch('add-session.php', {
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
                text: 'La session a été ajoutée avec succès!',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload(); // Actualise la page
            });
        }
    });
});

window.onload = function() {
    var queryParams = new URLSearchParams(window.location.search);
    var error = queryParams.get('error');
    if (error) {
        var errorMessage = '';
        switch (error) {
            case '1':
                errorMessage = 'Erreur lors de l\'ajout de la session.';
                break;
            case '2':
                errorMessage = 'Veuillez vérifier les informations saisies.';
                break;
            default:
                errorMessage = 'Une erreur inconnue s\'est produite.';
        }
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: errorMessage,
            confirmButtonText: 'OK'
        });
    }
};
</script>
</body>
</html>