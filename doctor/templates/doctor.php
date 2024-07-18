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
        title: 'Ajouter un nouveau docteur',
        html: `
            <form id="addDoctorForm">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Date</label>
                  <input type="text" class="form-control" name="added_date" id="added_date" value="${new Date().toISOString().split('T')[0]}" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <label>Nom du docteur</label>
                  <input type="text" class="form-control" name="name" id="product_name" placeholder="Nom du docteur" required>
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="email" required>
              </div>
              <div class="form-group">
                <label>Numero national</label>
                <input type="text" class="form-control" name="nic" placeholder="Numero national" required>
              </div>
              <div class="form-group">
                <label>Contact</label>
                <input type="tel" class="form-control" name="Tele" placeholder="Numero de contact" required>
              </div>
              <div class="form-group">
                <label>Spécialité</label>
                <select class="form-control" name="spec" required>
                    <?php
                    // Assuming you have a database connection
                    $list11 = $database->query("SELECT * FROM specialties ORDER BY sname ASC;");
                    while ($row00 = $list11->fetch_assoc()) {
                        $sn = $row00["sname"];
                        $id00 = $row00["id"];
                        echo "<option value=\"$id00\">$sn</option>";
                    }
                    ?>
                </select>
              </div>
              <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" class="form-control" name="password" placeholder="Entrez un mot de passe" required/>
              </div>
              <div class="form-group">
                <label>Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="cpassword" placeholder="Confirmez le mot de passe" required/>
              </div>
            </form>
        `,
        showCancelButton: true,
        confirmButtonText: 'Ajouter',
        preConfirm: () => {
            var form = document.getElementById('addDoctorForm');
            var formData = new FormData(form);
            return fetch('add-new.php', {
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
                text: 'Le docteur a été ajouté avec succès!',
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
                errorMessage = 'Compte déjà existant pour cette adresse e-mail.';
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
