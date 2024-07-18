<?php
include("../connection.php");

if (isset($_POST['pid']) && isset($_POST['did'])) {
    $pid = $_POST['pid'];
    $did = $_POST['did'];

    $sql = "SELECT patient.pname, patient.pemail, patient.pnic, patient.pdob, patient.ptel, patient.paddress, dossier.did, dossier.date_c, dossier.date_maj 
            FROM patient 
            JOIN dossier ON patient.pid = dossier.pid 
            WHERE patient.pid='$pid' AND dossier.did='$did'
            ORDER BY dossier.did ASC";
    $result = $database->query($sql);

    if ($result->num_rows > 0) {
        $patientData = [];
        while ($row = $result->fetch_assoc()) {
            if (empty($patientData)) {
                $patientData['pid'] = $pid;
                $patientData['name'] = $row["pname"];
                $patientData['email'] = $row["pemail"];
                $patientData['nic'] = $row["pnic"];
                $patientData['dob'] = $row["pdob"];
                $patientData['tele'] = $row["ptel"];
                $patientData['address'] = $row["paddress"];
                $patientData['dossiers'] = [];
            }
            $patientData['dossiers'][] = [
                'did' => $row['did'],
                'date_c' => $row['date_c'],
                'date_maj' => $row['date_maj']
            ];
        }

        // Récupérer les rendez-vous du patient
        $appo = $database->query("SELECT 
        appointment.appoid,
        schedule.scheduleid,
        schedule.title,
        doctor.docname,
        schedule.scheduledate,
        schedule.scheduletime,
        appointment.apponum,
        appointment.appodate
        FROM 
        schedule 
        INNER JOIN 
        appointment ON schedule.scheduleid = appointment.scheduleid 
        INNER JOIN 
        doctor ON schedule.docid = doctor.docid  
        WHERE  
        appointment.pid=$pid");
        $patientData['appointments'] = $appo->fetch_all(MYSQLI_ASSOC);

        // Récupérer les traitements du patient
        $traitement = $database->query("SELECT 
        traitement.tid, 
        doctor.docname, 
        traitement.nom, 
        traitement.description, 
        traitement.dosage, 
        traitement.frequence, 
        traitement.date_dbt, 
        traitement.date_fin, 
        traitement.etat, 
        traitement.effet_sec
        FROM 
        traitement
        INNER JOIN 
        doctor ON traitement.docid = doctor.docid
        WHERE 
        traitement.pid='$pid'");
        $patientData['treatments'] = $traitement->fetch_all(MYSQLI_ASSOC);

        // Récupérer les prescriptions du patient
        $prescr_res = $database->query("SELECT 
        prescription.prid, 
        doctor.docname, 
        medoc.nom, 
        prescription.date_prescr, 
        prescription.date_fins, 
        prescription.instruction
        FROM 
        prescription
        INNER JOIN 
        doctor ON prescription.docid = doctor.docid
        INNER JOIN 
        medoc ON prescription.mid = medoc.mid
        WHERE 
        prescription.pid = $pid");
        $patientData['prescriptions'] = $prescr_res->fetch_all(MYSQLI_ASSOC);

        $response = [
        'success' => true,
        'data' => $patientData
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'Patient introuvable']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID non fourni']);
}
?>
