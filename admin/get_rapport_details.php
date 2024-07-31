<?php
include '../connection.php';

if (isset($_GET['id'])) {
    $rapport_id = $_GET['id'];

    $query = "SELECT r.rapport_id, r.docid, d.docname AS doctor_name, r.report_date, r.total_patients, r.common_diagnoses,
                     GROUP_CONCAT(DISTINCT t.nom ORDER BY t.nom ASC SEPARATOR ', ') AS common_treatments, 
                     GROUP_CONCAT(DISTINCT p.instruction ORDER BY p.instruction ASC SEPARATOR ', ') AS common_prescriptions, 
                     r.general_notes
              FROM rapportdoc r
              JOIN doctor d ON r.docid = d.docid
              LEFT JOIN traitement t ON FIND_IN_SET(t.tid, r.common_treatments)
              LEFT JOIN prescription p ON FIND_IN_SET(p.prid, r.common_prescriptions)
              WHERE r.rapport_id = ?
              GROUP BY r.rapport_id, r.docid, d.docname, r.report_date, r.total_patients, r.common_diagnoses, r.general_notes";

    // Préparer la requête
    if ($stmt = $database->prepare($query)) {
        // Lier les paramètres
        $stmt->bind_param("i", $rapport_id);

        // Exécuter la requête
        $stmt->execute();

        // Obtenir le résultat
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $report = $result->fetch_assoc();
            echo json_encode(['success' => true, 'report' => $report]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Rapport non trouvé.']);
        }

        // Fermer la requête préparée
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur de préparation de la requête.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID de rapport non spécifié.']);
}
?>
