<?php
$database = new mysqli("localhost", "root", "Mbuluku@0022", "edoc");
if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}

$sql = "SELECT patient.pname, COUNT(appointment.appoid) AS appointment_count
        FROM appointment
        JOIN patient ON appointment.pid = patient.pid
        GROUP BY appointment.pid";
$result = $database->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'pname' => $row['pname'],
        'appointment_count' => $row['appointment_count']
    ];
}

echo json_encode($data);
?>
