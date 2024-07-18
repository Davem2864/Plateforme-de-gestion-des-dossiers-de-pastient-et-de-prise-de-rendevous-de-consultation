<?php
// Connexion à la base de données
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plid = $_POST['plid'];
    $commentaires = $_POST['commentaires'];
    $statut = $_POST['statut'];
    $date_resolution = $_POST['date_resolution'];

    $stmt = $database->prepare("UPDATE plaintes SET commentaires = ?, statut = ?, date_resolution = ? WHERE plid = ?");
    $stmt->bind_param("sssi", $commentaires, $statut, $date_resolution, $plid);

    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Plainte mise à jour avec succès"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Erreur lors de la mise à jour de la plainte"));
    }

    $stmt->close();
}

$database->close();
?>
