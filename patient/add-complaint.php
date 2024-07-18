<?php
// Connexion à la base de données
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pid = $_POST['pid'];
    $docid = $_POST['docid'];
    $scheduleid = $_POST['scheduleid'];
    $date_reception = $_POST['date_reception'];
    $nature_plaintes = $_POST['nature_plaintes'];
    $description = $_POST['description'];
    $statut = $_POST['statut'];
    $date_resolution = $_POST['date_resolution'];
    $commentaires = isset($_POST['commentaires']) ? $_POST['commentaires'] : 'en attente';

    $stmt = $database->prepare("INSERT INTO plaintes (pid, docid, scheduleid, date_reception, nature_plaintes, description, statut, date_resolution, commentaires) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiissssss", $pid, $docid, $scheduleid, $date_reception, $nature_plaintes, $description, $statut, $date_resolution, $commentaires);

    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Plainte déposée avec succès"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Erreur lors de l'insertion de la plainte"));
    }

    $stmt->close();
}

$database->close();
?>
