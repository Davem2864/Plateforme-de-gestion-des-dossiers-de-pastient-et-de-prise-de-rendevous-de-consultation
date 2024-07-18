<?php
include("../connection.php");

$response = [];

try {
    if ($_POST) {
        $mid = $_POST["nom"];
        $qte = $_POST["qte"];
        $prix = $_POST["prix"];
        
        // Get current date
        $date_app = date('Y-m-d');
        
        // Prepare an insert statement
        $sql = "INSERT INTO approvisionnement (mid, qte, prix, date_app) VALUES (?, ?, ?, ?)";
        
        if($stmt = $database->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("iids", $mid, $qte, $prix, $date_app);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Prepare an update statement for medoc
                $new_price = $prix + 2.5;
                $sql_update = "UPDATE medoc SET qte = qte + ?, prix = ? WHERE mid = ?";
                
                if($stmt_update = $database->prepare($sql_update)){
                    // Bind variables to the prepared statement as parameters
                    $stmt_update->bind_param("idi", $qte, $new_price, $mid);
                    
                    // Attempt to execute the prepared statement
                    if($stmt_update->execute()){
                        $response = ['success' => true, 'message' => 'Nouvel approvisionnement ajouté avec succès!'];
                    } else{
                        throw new Exception('Quelque chose a mal tourné lors de la mise à jour de medoc. Veuillez réessayer plus tard.');
                    }
                    
                    // Close update statement
                    $stmt_update->close();
                }
            } else{
                throw new Exception('Quelque chose a mal tourné lors de l\'insertion dans approvisionnement. Veuillez réessayer plus tard.');
            }
        }
         
        // Close insert statement
        $stmt->close();

    } else {
        throw new Exception('Requête non valide');
    }
} catch (Exception $e) {
    $response = ['success' => false, 'message' => $e->getMessage()];
}

// Close connection
$database->close();

echo json_encode($response);
?>
