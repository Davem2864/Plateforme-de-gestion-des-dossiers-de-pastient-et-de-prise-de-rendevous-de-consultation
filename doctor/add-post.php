<?php
// Connexion à la base de données
include("../connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $docid = $_POST['docid'];
    $content = $_POST['content'];
    $photo = '';

    // Vérifier s'il y a un fichier photo à télécharger
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifier si le fichier est une image réelle ou une fausse image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            // Vérifier la taille du fichier
            if ($_FILES["photo"]["size"] < 5000000) { // Limite à 5MB
                // Autoriser certains formats de fichier
                if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                        $photo = basename($_FILES["photo"]["name"]);
                    } else {
                        echo json_encode(array("status" => "error", "message" => "Désolé, une erreur est survenue lors du téléchargement de votre fichier."));
                        exit();
                    }
                } else {
                    echo json_encode(array("status" => "error", "message" => "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés."));
                    exit();
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "Désolé, votre fichier est trop volumineux."));
                exit();
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Le fichier n'est pas une image."));
            exit();
        }
    }

    $post_date = date('Y-m-d');
    $post_time = date('H:i:s');

    $stmt = $database->prepare("INSERT INTO doctor_post (docid, content, photo, post_date, post_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $docid, $content, $photo, $post_date, $post_time);

    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Post inséré avec succès"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Erreur lors de l'insertion du post"));
    }

    $stmt->close();
}

$database->close();
?>
