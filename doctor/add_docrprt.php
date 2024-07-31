<?php
include '../connection.php'; // Connexion à la base de données

header('Content-Type: application/json'); // Assurez-vous que la réponse est JSON

// Vérifiez que les données sont envoyées par POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenez les valeurs des données POST avec des valeurs par défaut
    $docid = isset($_POST['docid']) ? $_POST['docid'] : '';
    $report_date = isset($_POST['report_date']) ? $_POST['report_date'] : '';
    $total_patients = isset($_POST['total_patients']) ? $_POST['total_patients'] : '';
    $common_diagnoses = isset($_POST['common_diagnoses']) ? $_POST['common_diagnoses'] : '';
    // Assurez-vous que 'common_treatments' et 'common_prescriptions' sont des tableaux
    $common_treatments = isset($_POST['common_treatments']) ? $_POST['common_treatments'] : [];
    $common_prescriptions = isset($_POST['common_prescriptions']) ? $_POST['common_prescriptions'] : [];
    $general_notes = isset($_POST['general_notes']) ? $_POST['general_notes'] : '';

    // Convertir les sauts de ligne en puces pour les diagnostics communs
    $formatted_diagnoses = str_replace("\n", "<br>• ", $common_diagnoses);

    // Assurez-vous que $common_treatments et $common_prescriptions sont des tableaux avant d'utiliser implode
    $treatments_str = is_array($common_treatments) ? implode(',', $common_treatments) : '';
    $prescriptions_str = is_array($common_prescriptions) ? implode(',', $common_prescriptions) : '';

    // Exemple d'insertion dans la base de données avec des requêtes préparées
    $sql = "INSERT INTO rapportdoc (docid, report_date, total_patients, common_diagnoses, common_treatments, common_prescriptions, general_notes) 
            VALUES (?, NOW(), ?, ?, ?, ?, ?)";

    $stmt = $database->prepare($sql);
    $stmt->bind_param("iissss", $docid, $total_patients, $formatted_diagnoses, $treatments_str, $prescriptions_str, $general_notes);

    $response = [];
    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = $stmt->error;
    }

    $stmt->close();
    echo json_encode($response);
} else {
    // Réponse pour les requêtes non POST
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
