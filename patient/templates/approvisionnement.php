<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un docteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body>
<script>
document.getElementById('openFormBtn').addEventListener('click', function() {
    // Récupérez la liste des médicaments
    fetch('get_medocs.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Créez le formulaire avec les options de médicaments
                var formHtml = `
                    <form id="addAppForm">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Date</label>
                          <input type="text" class="form-control" name="added_date" id="added_date" value="${new Date().toISOString().split('T')[0]}" readonly/>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Choisir un médicament</label>
                          <select class="form-control" name="nom" id="" class="box" >
                            ${data.medocs.map(medoc => `<option value="${medoc.mid}">${medoc.nom}</option>`).join('')}
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Quantité</label>
                        <input type="number" name="qte" class="form-control" placeholder="Quantité" required>
                      </div>
                      <div class="form-group">
                        <label>Prix d'achat</label>
                        <input type="number" step="0.001" name="prix" class="form-control" required>
                      </div>
                    </form>
                `;

                // Affichez le SweetAlert avec le formulaire
                Swal.fire({
                    title: 'Ajouter un nouvel approvisionnement',
                    html: formHtml,
                    showCancelButton: true,
                    confirmButtonText: 'Ajouter',
                    preConfirm: () => {
                        var form = document.getElementById('addAppForm');
                        var formData = new FormData(form);
                        return fetch('add-app.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.success) {
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
                        if (result.value.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Succès',
                                text: 'Nouvel approvisionnement ajouté avec succès!',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload(); // Actualise la page
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: result.value.message,
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            } else {
                Swal.fire({
                    title: 'Erreur',
                    text: data.message,
                    icon: 'error'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Erreur',
                text: 'Une erreur s\'est produite lors de la récupération des médicaments.',
                icon: 'error'
            });
        });
});

window.onload = function() {
    var queryParams = new URLSearchParams(window.location.search);
    var error = queryParams.get('error');
    if (error) {
        var errorMessage = '';
        switch (error) {
            case '1':
                errorMessage = 'Il existe déjà un compte pour cette adresse e-mail.';
                break;
            case '2':
                errorMessage = 'Erreur de confirmation du mot de passe. Veuillez reconfirmer votre mot de passe.';
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
