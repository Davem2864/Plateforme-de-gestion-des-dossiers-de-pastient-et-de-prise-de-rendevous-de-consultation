<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT traitement.tid, patient.pname, doctor.docname, traitement.nom, traitement.description, traitement.dosage, traitement.frequence, traitement.date_dbt, traitement.date_fin, traitement.etat, traitement.effet_sec
            FROM traitement
            INNER JOIN patient ON traitement.pid = patient.pid
            INNER JOIN doctor ON traitement.docid = doctor.docid WHERE traitement.tid='$id'";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tid = $row["tid"];
        $pname = $row["pname"];
        $docname = $row["docname"];
        $nom = $row["nom"];
        $desc = $row["description"];
        $dosage = $row["dosage"];
        $frequence = $row["frequence"];
        $date_dbt = $row["date_dbt"];
        $date_fin = $row["date_fin"];
        $etat = $row["etat"];
        $effet_sec = $row["effet_sec"];

        $response = [
            'success' => true,
            'data' => [
                'tid' => $tid,
                'pname' => $pname,
                'docname' => $docname,
                'nom' => $nom,
                'description' => $desc,
                'dosage' => $dosage,
                'frequence' => $frequence,
                'date_dbt' => $date_dbt,
                'date_fin' => $date_fin,
                'etat' => $etat,
                'effet_sec' => $effet_sec
            ]
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'Traitement introuvable']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID non fourni']);
}
?>
