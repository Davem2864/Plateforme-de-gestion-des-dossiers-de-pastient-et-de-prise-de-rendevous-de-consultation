<?php
    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            echo json_encode(['error' => true, 'message' => 'Vous devez être connecté en tant que médecin pour ajouter une prescription.']);
            exit;
        }
    }else{
        echo json_encode(['error' => true, 'message' => 'Vous devez être connecté pour ajouter une prescription.']);
        exit;
    }
    
    include("../connection.php");
    if($_POST){
        // Récupérer les valeurs du formulaire
        $tid = $_POST["tid"];
        $pid = $_POST["pid"];
        $docid = $_POST["docid"];
        $mid = $_POST["medoc"];
        $date_prescr = $_POST["date_presc"];
        $date_fins = $_POST["date_fin"];
        $instruction = $_POST["instruction"];
        
        // Préparer une requête d'insertion
        $sql = "INSERT INTO prescription (pid, docid, mid, tid, date_prescr, date_fins, instruction) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        if($stmt = $database->prepare($sql)){
            // Lier les variables à la requête préparée en tant que paramètres
            $stmt->bind_param("iiissss", $pid, $docid, $mid, $tid, $date_prescr, $date_fins, $instruction);
            
            // Tenter d'exécuter la requête préparée
            if($stmt->execute()){
                // Renvoyer une réponse JSON de succès
                echo json_encode(['error' => false, 'message' => 'La prescription a été ajoutée avec succès!']);
            } else{
                echo json_encode(['error' => true, 'message' => 'Quelque chose a mal tourné. Veuillez réessayer plus tard.']);
            }
        } else {
            echo json_encode(['error' => true, 'message' => 'Impossible de préparer la requête.']);
        }
         
        // Fermer la déclaration
        $stmt->close();
    } else {
        echo json_encode(['error' => true, 'message' => 'Aucune donnée reçue.']);
    }

    // Fermer la connexion
    $database->close();
?>
