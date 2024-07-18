<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM medoc WHERE mid='$id'";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $mid = $row["mid"];
        $nom = $row["nom"];
        $description = $row["description"];
        $date = $row["date_exp"];
        $prix = $row["prix"];
        $qte = $row["qte"];
        $dosage = $row["dosage"];
        $fab = $row["fab"];

        $response = [
            'success' => true,
            'data' => [
                'mid' => $mid,
                'nom' => $nom,
                'description' => $description,
                'date_exp' => $date,
                'prix' => $prix,
                'qte' => $qte,
                'dosage' => $dosage,
                'fab' => $fab
            ]
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'Médicament introuvable']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID non fourni']);
}
?>
