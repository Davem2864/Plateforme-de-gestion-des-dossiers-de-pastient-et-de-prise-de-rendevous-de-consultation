<?php
include("../connection.php");

if ($_POST) {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $oldemail = $_POST["oldemail"];
    $spec = $_POST['spec'];
    $email = $_POST['email'];
    $tele = $_POST['Tele'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $id = $_POST['id00'];
    
    if ($password == $cpassword) {
        $result = $database->query("SELECT doctor.docid FROM doctor INNER JOIN webuser ON doctor.docemail=webuser.email WHERE webuser.email='$email'");
        if ($result->num_rows == 1) {
            $id2 = $result->fetch_assoc()["docid"];
        } else {
            $id2 = $id;
        }
        
        if ($id2 != $id) {
            echo json_encode(['success' => false, 'message' => 'Email déjà utilisé par un autre docteur']);
        } else {
            $sql1 = "UPDATE doctor SET docemail='$email', docname='$name', docpassword='$password', docnic='$nic', doctel='$tele', specialties=$spec WHERE docid=$id";
            $database->query($sql1);
            
            $sql2 = "UPDATE webuser SET email='$email' WHERE email='$oldemail'";
            $database->query($sql2);

            echo json_encode(['success' => true]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Les mots de passe ne correspondent pas']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requête non valide']);
}
?>
