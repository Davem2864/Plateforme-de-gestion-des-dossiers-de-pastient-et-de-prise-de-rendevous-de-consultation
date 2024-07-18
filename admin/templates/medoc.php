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
    Swal.fire({
        title: 'Ajouter un nouveau médicament',
        html: `
            <form id="addMedocForm">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Date</label>
                  <input type="text" class="form-control" name="added_date" id="added_date" value="${new Date().toISOString().split('T')[0]}" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <label>Nom du médicament</label>
                  <input type="text" class="form-control" name="nom" id="product_name" placeholder="Nom du médicament" required>
                </div>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" name="desc" class="form-control" placeholder="Description" required></textarea>
              </div>
              <div class="form-group">
                <label>Date d'expiration</label>
                <input type="date" class="form-control" name="date" placeholder="Date d'expiration" required>
              </div>
              <div class="form-group">
                <label>Prix</label>
                <input type="number" step="0.001" class="form-control" name="prix" placeholder="Prix" required>
              </div>
              <div class="form-group">
                <label>Dosage (en Mg)</label>
                <input type="text" class="form-control" name="dosage" placeholder="Dosage (en Mg)" required>
              </div>
              <div class="form-group">
                <label>Fabricant</label>
                <input type="text" class="form-control" name="fab" placeholder="Fabricant" required>
              </div>
            </form>
        `,
        showCancelButton: true,
        confirmButtonText: 'Ajouter',
        preConfirm: () => {
            var form = document.getElementById('addMedocForm');
            var formData = new FormData(form);
            return fetch('add-med.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
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
            if (result.value.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: result.value.message,
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
