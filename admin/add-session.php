<?php
session_start();

// Vérifiez si l'utilisateur est connecté et a le bon type d'utilisateur
if (!isset($_SESSION["user"]) || $_SESSION["user"] == "" || $_SESSION['usertype'] != 'a') {
    header("location: ../login.php");
    exit();
}

// Importez la connexion à la base de données
include("../connection.php");

$response = [];

if ($_POST) {
    $title = $_POST["title"];
    $docid = $_POST["docid"];
    $nop = $_POST["nop"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    // Préparez la requête SQL pour insérer la session
    $stmt = $database->prepare("INSERT INTO schedule (docid, title, scheduledate, scheduletime, nop) VALUES (?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("isssi", $docid, $title, $date, $time, $nop);
        if ($stmt->execute()) {
            $response = ['error' => false, 'message' => 'Nouvelle session ajoutée avec succès!'];
        } else {
            $response = ['error' => true, 'message' => 'Erreur lors de l\'ajout de la session.'];
        }
        $stmt->close();
    } else {
        $response = ['error' => true, 'message' => 'Erreur de préparation de la requête.'];
    }
} else {
    $response = ['error' => true, 'message' => 'Une erreur inconnue s\'est produite.'];
}

echo json_encode($response);
?>
