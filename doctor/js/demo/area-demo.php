<?php
 $database= new mysqli("localhost","root","Mbuluku@0022","edoc");
 if ($database->connect_error){
     die("Connection failed:  ".$database->connect_error);
 } 
$sql = "SELECT schedule.title, COUNT(appointment.appoid) AS patient_count
        FROM schedule
        INNER JOIN appointment ON schedule.scheduleid = appointment.scheduleid
        GROUP BY schedule.title";
$result = $database->query($sql);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>
