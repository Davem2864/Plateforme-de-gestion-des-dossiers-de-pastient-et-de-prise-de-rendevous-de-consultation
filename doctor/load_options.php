<?php
session_start();
include '../connection.php'; // Connexion à la base de données

if (!isset($_SESSION["user"]) || $_SESSION['usertype'] != 'd') {
    header("Location: ../login.php");
    exit();
}

// Récupérer l'ID du médecin depuis la session
$useremail = $_SESSION["user"];
$userrow = $database->query("SELECT docid FROM doctor WHERE docemail='$useremail'");
$userfetch = $userrow->fetch_assoc();
$doctor_id = $userfetch["docid"];

// Charger les traitements pour ce médecin
$treatments_query = "SELECT tid, nom, description FROM traitement WHERE docid = '$doctor_id' AND date_trait = CURDATE()";
$treatments_result = $database->query($treatments_query);

// Charger les prescriptions faites aujourd'hui pour ce médecin
$prescriptions_query = "SELECT prid, tid, date_prescr, date_fins, instruction FROM prescription WHERE docid = '$doctor_id' AND date_prescr = CURDATE()";
$prescriptions_result = $database->query($prescriptions_query);

$treatments = [];
$prescriptions = [];

while ($row = $treatments_result->fetch_assoc()) {
    $treatments[] = $row;
}

while ($row = $prescriptions_result->fetch_assoc()) {
    $prescriptions[] = $row;
}

echo json_encode([
    'treatments' => $treatments,
    'prescriptions' => $prescriptions
]);
?>
