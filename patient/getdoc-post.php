<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
include("../connection.php");

$sql = "
    SELECT dp.id, dp.content, dp.photo, dp.post_date, dp.post_time, d.docname AS author_name
    FROM doctor_post dp
    JOIN doctor d ON dp.docid = d.docid
    UNION
    SELECT ap.id, ap.content, ap.photo, ap.post_date, ap.post_time, 'Admin' AS author_name
    FROM admin_post ap
    ORDER BY post_date DESC, post_time DESC";

$result = $database->query($sql);

$posts = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
    echo json_encode($posts);
} else {
    echo json_encode(array("status" => "error", "message" => "Aucun post trouvé"));
}

$database->close();
?>
