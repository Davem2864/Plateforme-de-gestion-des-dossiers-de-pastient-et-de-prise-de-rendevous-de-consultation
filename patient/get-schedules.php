<?php
// Connexion à la base de données
include("../connection.php");

$today = date('Y-m-d');

$sql = "SELECT schedule.scheduleid, schedule.scheduledate, schedule.title, doctor.docid, doctor.docname
        FROM schedule
        INNER JOIN doctor ON schedule.docid = doctor.docid
        WHERE schedule.scheduledate >= '$today'
        ORDER BY schedule.scheduledate ASC";

$result = $database->query($sql);

$schedules = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $schedules[] = $row;
    }
    echo json_encode($schedules);
} else {
    echo json_encode(array("status" => "error", "message" => "Aucune session trouvée"));
}

$database->close();
?>
