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
document.querySelectorAll('.view-prescr').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var traitId = this.getAttribute('data-id');
        // Use AJAX to get prescription details
        fetch('view_prescr.php?id=' + traitId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var prescription = data.data;
                    Swal.fire({
                        title: 'Informations sur la Prescription',
                        html: `
                        <div style="text-align: left;">
                            <p><strong>ID:</strong> Prescription->${prescription.prid}</p>
                            <p><strong>Nom du Patient:</strong> ${prescription.pname}</p>
                            <p><strong>Nom du Docteur:</strong> ${prescription.docname}</p>
                            <p><strong>Médicament:</strong> ${prescription.nom_m}</p>
                            <p><strong>Traitement:</strong> ${prescription.nom_t}</p>
                            <p><strong>Date de la Prescription:</strong> ${prescription.date_p}</p>
                            <p><strong>Date de Fin de Traitement:</strong> ${prescription.date_fin}</p>
                            <p><strong>Instruction:</strong> ${prescription.instruction}</p>
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
