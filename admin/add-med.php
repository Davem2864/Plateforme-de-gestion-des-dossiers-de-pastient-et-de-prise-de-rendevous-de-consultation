<?php
include("../connection.php");

$response = [];

try {
    if ($_POST) {
        $nom = $_POST["nom"];
        $desc = $_POST["desc"];
        $date = $_POST["date"];
        $prix = $_POST["prix"];
        $dosage = $_POST["dosage"];
        $fab = $_POST["fab"];

        // Vérifiez d'abord si un médicament avec le même nom existe déjà
        $checkSql = "SELECT * FROM medoc WHERE nom=?";
        if($checkStmt = $database->prepare($checkSql)){
            $checkStmt->bind_param("s", $nom);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();
            if ($checkResult->num_rows > 0) {
                $response = ['success' => false, 'message' => 'Ce médicament existe déjà'];
            } else {
                // Préparez une déclaration d'insertion
                $sql = "INSERT INTO medoc (nom, description, date_exp, prix , qte, dosage, fab) VALUES (?, ?, ?, ?, DEFAULT, ?, ?)";
                
                if($stmt = $database->prepare($sql)){
                    // Liez les variables à la déclaration préparée en tant que paramètres
                    $stmt->bind_param("sssdis", $nom, $desc, $date, $prix, $dosage, $fab);
                    
                    // Tentez d'exécuter la déclaration préparée
                    if($stmt->execute()){
                        $response = ['success' => true, 'message' => 'Nouveau médicament ajouté avec succès!'];
                    } else{
                        throw new Exception('Quelque chose a mal tourné. Veuillez réessayer plus tard.');
                    }
                }
            }
            $checkStmt->close();
        }
         
        // Fermer la déclaration
        $stmt->close();

    } else {
        throw new Exception('Requête non valide');
    }
} catch (Exception $e) {
    $response = ['success' => false, 'message' => $e->getMessage()];
}

// Fermer la connexion
$database->close();

echo json_encode($response);
?>
