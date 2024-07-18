<?php
// Connexion à la base de données
include("../connection.php");
$sql = "SELECT dp.id, dp.content, dp.photo, dp.post_date, dp.post_time, d.docname AS doctor_name
        FROM doctor_post dp
        JOIN doctor d ON dp.docid = d.docid
        ORDER BY dp.post_date DESC, dp.post_time DESC";

$result = $database->query($sql);

$posts = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
    echo json_encode($posts);
} else {
    echo json_encode(array("status" => "error", "message" => "Aucun post trouvé"));
}

$database->close();
?>