<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des traitements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body>
<script>
document.querySelectorAll('.view-trait').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var traitId = this.getAttribute('data-id');
        // Use AJAX to get treatment details
        fetch('view_trait.php?id=' + traitId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var traitement = data.data;
                    Swal.fire({
                        title: 'Informations sur le Traitement',
                        html: `
                        <div style="text-align: left;">
                            <p><strong>ID:</strong> Traitement-${traitement.tid}</p>
                            <p><strong>Nom du Patient:</strong> ${traitement.pname}</p>
                            <p><strong>Nom du Docteur:</strong> ${traitement.docname}</p>
                            <p><strong>Nom du Traitement:</strong> ${traitement.nom}</p>
                            <p><strong>Description:</strong> ${traitement.description}</p>
                            <p><strong>Dosage:</strong> ${traitement.dosage}</p>
                            <p><strong>Frequence:</strong> ${traitement.frequence}</p>
                            <p><strong>Date de Debut:</strong> ${traitement.date_dbt}</p>
                            <p><strong>Date de Fin:</strong> ${traitement.date_fin}</p>
                            <p><strong>Etat du Patient:</strong> ${traitement.etat}</p>
                            <p><strong>Effet Secondaire:</strong> ${traitement.effet_sec}</p>
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
