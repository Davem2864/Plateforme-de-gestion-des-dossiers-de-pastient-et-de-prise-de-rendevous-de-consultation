<?php
// Connexion à la base de données
include("../connection.php");

$sql = "SELECT p.pname, d.docname, s.title, pl.plid, pl.pid, d.docid, s.scheduleid, pl.date_reception, pl.nature_plaintes, pl.description, pl.statut, pl.date_resolution, pl.commentaires
        FROM plaintes pl
        INNER JOIN patient p ON pl.pid = p.pid
        INNER JOIN doctor d ON pl.docid = d.docid
        INNER JOIN schedule s ON pl.scheduleid = s.scheduleid
        WHERE pl.statut = 'en cours'
        ORDER BY pl.plid DESC;
";
$result = $database->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode(array("data" => $data));
} else {
    echo json_encode(array("data" => array()));
}

$database->close();
?>
