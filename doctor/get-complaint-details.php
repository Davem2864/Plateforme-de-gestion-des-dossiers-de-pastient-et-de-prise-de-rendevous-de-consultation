<?php
// Connexion à la base de données
include("../connection.php");

// Récupérer le plid de la plainte
$plid = isset($_POST['plid']) ? intval($_POST['plid']) : 0;

$sql = "SELECT p.pname, d.docname, s.title, pl.plid, pl.pid, d.docid, s.scheduleid, pl.date_reception, pl.nature_plaintes, pl.description, pl.statut, pl.date_resolution, pl.commentaires
        FROM plaintes pl
        INNER JOIN patient p ON pl.pid = p.pid
        INNER JOIN doctor d ON pl.docid = d.docid
        INNER JOIN schedule s ON pl.scheduleid = s.scheduleid
        WHERE pl.plid = ?;
";
$stmt = $database->prepare($sql);
$stmt->bind_param("i", $plid);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "error", "message" => "Plainte non trouvée"));
}

$stmt->close();
$database->close();
?>
