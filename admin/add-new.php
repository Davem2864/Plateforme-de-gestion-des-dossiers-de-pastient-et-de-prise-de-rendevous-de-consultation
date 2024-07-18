<?php
include("../connection.php");

$response = [];

if ($_POST) {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $spec = $_POST['spec'];
    $email = $_POST['email'];
    $tele = $_POST['Tele'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $stmt = $database->prepare("SELECT * FROM webuser WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $response = ['error' => true, 'message' => 'Compte déjà existant pour cette adresse e-mail.'];
        } else {
            $stmt1 = $database->prepare("INSERT INTO doctor (docemail, docname, docpassword, docnic, doctel, specialties) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt1->bind_param("sssssi", $email, $name, $password, $nic, $tele, $spec);
            $stmt1->execute();
            $stmt2 = $database->prepare("INSERT INTO webuser VALUES (?, 'd')");
            $stmt2->bind_param("s", $email);
            $stmt2->execute();
            $response = ['error' => false, 'message' => 'Nouvel enregistrement ajouté avec succès!'];
        }
    } else {
        $response = ['error' => true, 'message' => 'Erreur de confirmation du mot de passe. Veuillez reconfirmer votre mot de passe.'];
    }
} else {
    $response = ['error' => true, 'message' => 'Une erreur inconnue s\'est produite.'];
}

echo json_encode($response);
?>
