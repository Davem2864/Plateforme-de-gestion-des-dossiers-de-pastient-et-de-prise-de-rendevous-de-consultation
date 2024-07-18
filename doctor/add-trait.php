<?php
    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }
    }else{
        header("location: ../login.php");
    }

    include("../connection.php");
    $response = [];
    if($_POST){
        //import database
        include("../connection.php");
        $pid = $_POST["pid"];
        $docid = $_POST["docid"];
        $nom = $_POST["nom"];
        $desc = $_POST["desc"];
        $dosage = $_POST["dosage"];
        $frequence = $_POST["frequence"];
        $date_dbt = $_POST["date_dbt"];
        $date_fin = $_POST["date_fin"];
        $etat = $_POST["etat"];
        $effet = $_POST["effet"];

        // Prepare an insert statement
        $sql = "INSERT INTO traitement (pid, docid, nom, description, dosage, frequence, date_dbt, date_fin, etat, effet_sec) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = $database->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("iissssssss", $pid, $docid, $nom, $desc, $dosage, $frequence, $date_dbt, $date_fin, $etat, $effet);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Prepare data for JSON
                $data = array(
                    "pid" => $pid,
                    "docid" => $docid,
                    "nom" => $nom,
                    "desc" => $desc,
                    "dosage" => $dosage,
                    "frequence" => $frequence,
                    "date_dbt" => $date_dbt,
                    "date_fin" => $date_fin,
                    "etat" => $etat,
                    "effet" => $effet
                );

                $response = ['success' => true, 'error' => false, 'message' => 'Nouveau traitement ajouté avec succès!', 'data' => $data];
            } else{
                $response = ['error' => true, 'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.', 'data' => $data];
            }
        }

        // Close statement
        $stmt->close();
    } else {
        $response = ['error' => true, 'message' => 'Une erreur inconnue s\'est produite.', 'data' => $data];
    }

    // Set Content-Type header to application/json
    header('Content-Type: application/json');

    // Output the JSON data
    echo json_encode($response);

    // Close connection
    $database->close();
?>
