<?php
include("../connection.php");

if ($_POST) {
    $nom = $_POST["nom"];
    $desc = $_POST["desc"];
    $date = $_POST["date"];
    $prix = $_POST["prix"];
    $dosage = $_POST["dosage"];
    $fab = $_POST["fab"];
    $id = $_POST["id00"];

    // Préparez une déclaration de mise à jour
    $sql = "UPDATE medoc SET nom=?, description=?, date_exp=?, prix=?, dosage=?, fab=? WHERE mid=?";
    
    if($stmt = $database->prepare($sql)){
        // Liez les variables à la déclaration préparée en tant que paramètres
        $stmt->bind_param("sssdisi", $nom, $desc, $date, $prix, $dosage, $fab, $id);
        
        // Tentez d'exécuter la déclaration préparée
        if($stmt->execute()){
            echo json_encode(['success' => true]);
        } else{
            echo json_encode(['success' => false, 'message' => 'Quelque chose a mal tourné. Veuillez réessayer plus tard.']);
        }
    }
     
    // Fermer la déclaration
    $stmt->close();

    // Fermer la connexion
    $database->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Requête non valide']);
}
?>
