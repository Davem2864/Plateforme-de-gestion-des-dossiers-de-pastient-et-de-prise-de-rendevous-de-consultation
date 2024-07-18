<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT prescription.prid, patient.pname, doctor.docname, medoc.nom AS nom_m, traitement.nom, prescription.date_prescr, prescription.date_fins, prescription.instruction
            FROM prescription
            INNER JOIN patient ON prescription.pid = patient.pid
            INNER JOIN doctor ON prescription.docid = doctor.docid
            INNER JOIN medoc ON prescription.mid = medoc.mid
            INNER JOIN traitement ON prescription.tid = traitement.tid
            WHERE prescription.prid='$id'";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $prid = $row["prid"];
        $pname = $row["pname"];
        $docname = $row["docname"];
        $nom_m = $row["nom_m"];
        $nom_t = $row["nom"];
        $date_p = $row["date_prescr"];
        $date_fin = $row["date_fins"];
        $instruction = $row["instruction"];

        $response = [
            'success' => true,
            'data' => [
                'prid' => $prid,
                'pname' => $pname,
                'docname' => $docname,
                'nom_m' => $nom_m,
                'nom_t' => $nom_t,
                'date_prescr' => $date_p,
                'date_fins' => $date_fin,
                'instruction' => $instruction
            ]
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'Prescription introuvable']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID non fourni']);
}
?>
