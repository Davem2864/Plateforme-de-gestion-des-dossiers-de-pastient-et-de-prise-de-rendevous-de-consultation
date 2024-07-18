<?php
include("../connection.php");

// Préparez une déclaration pour récupérer les médicaments
$sql = "SELECT * FROM medoc ORDER BY nom ASC";
$result = $database->query($sql);

$medocs = [];

// Vérifiez si des médicaments ont été trouvés
if ($result->num_rows > 0) {
    // Parcourez chaque médicament et ajoutez-le à la liste
    while ($row = $result->fetch_assoc()) {
        $medocs[] = [
            'nom' => $row["nom"],
            'mid' => $row["mid"]
        ];
    }
}

// Fermer la connexion
$database->close();

// Renvoyer les médicaments en format JSON
header('Content-Type: application/json');
echo json_encode(['success' => true, 'medocs' => $medocs]);
?>
