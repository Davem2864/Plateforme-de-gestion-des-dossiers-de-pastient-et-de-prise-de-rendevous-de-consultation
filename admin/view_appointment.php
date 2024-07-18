<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT appointment.appoid, schedule.scheduleid, schedule.title, doctor.docname, patient.pname, schedule.scheduledate, schedule.scheduletime, appointment.apponum, appointment.appodate
            FROM schedule
            INNER JOIN appointment ON schedule.scheduleid = appointment.scheduleid
            INNER JOIN patient ON patient.pid = appointment.pid
            INNER JOIN doctor ON schedule.docid = doctor.docid
            WHERE appointment.appoid='$id'";
    $result = $database->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = [
            'success' => true,
            'data' => [
                'appoid' => $row["appoid"],
                'title' => $row["title"],
                'docname' => $row["docname"],
                'pname' => $row["pname"],
                'scheduledate' => $row["scheduledate"],
                'scheduletime' => $row["scheduletime"],
                'apponum' => $row["apponum"],
                'appodate' => $row["appodate"]
            ]
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'Rendez-vous introuvable']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID non fourni']);
}
?>
