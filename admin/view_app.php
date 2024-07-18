<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT medoc.nom, approvisionnement.apid, approvisionnement.mid, approvisionnement.qte, approvisionnement.prix, approvisionnement.date_app FROM medoc JOIN approvisionnement ON medoc.mid = approvisionnement.mid WHERE approvisionnement.apid='$id'";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $apid = $row["apid"];
        $nom = $row["nom"];
        $qte = $row["qte"];
        $prix = $row["prix"];
        $date_app = $row["date_app"];

        $response = [
            'success' => true,
            'data' => [
                'apid' => $apid,
                'nom' => $nom,
                'qte' => $qte,
                'prix' => $prix,
                'date_app' => $date_app
            ]
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'Approvisionnement introuvable']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID non fourni']);
}
?>
