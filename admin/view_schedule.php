<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les détails de la session
    $sqlmain = "SELECT schedule.scheduleid, schedule.title, doctor.docname, schedule.scheduledate, schedule.scheduletime, schedule.nop
                FROM schedule 
                INNER JOIN doctor ON schedule.docid = doctor.docid  
                WHERE schedule.scheduleid = ?";
    
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $docname = $row["docname"];
        $scheduleid = $row["scheduleid"];
        $title = $row["title"];
        $scheduledate = $row["scheduledate"];
        $scheduletime = $row["scheduletime"];
        $nop = $row['nop'];

        // Récupérer les patients inscrits pour cette session
        $sqlmain12 = "SELECT appointment.apponum, patient.pid, patient.pname, patient.ptel
                      FROM appointment 
                      INNER JOIN patient ON patient.pid = appointment.pid 
                      WHERE appointment.scheduleid = ?";
        
        $stmt12 = $database->prepare($sqlmain12);
        $stmt12->bind_param("i", $id);
        $stmt12->execute();
        $result12 = $stmt12->get_result();

        $patients = [];
        while ($row12 = $result12->fetch_assoc()) {
            $patients[] = [
                'apponum' => $row12['apponum'],
                'pid' => $row12['pid'],
                'pname' => $row12['pname'],
                'ptel' => $row12['ptel']
            ];
        }

        $response = [
            'success' => true,
            'data' => [
                'docname' => $docname,
                'scheduleid' => $scheduleid,
                'title' => $title,
                'scheduledate' => $scheduledate,
                'scheduletime' => $scheduletime,
                'nop' => $nop,
                'patients' => $patients
            ]
        ];
    } else {
        $response = ['success' => false, 'message' => 'Session introuvable'];
    }

    $stmt->close();
    $stmt12->close();
} else {
    $response = ['success' => false, 'message' => 'ID non fourni'];
}

echo json_encode($response);
?>
