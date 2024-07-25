<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();

if(isset($_SESSION["user"])) {
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }
}else{
    header("location: ../login.php");
}

include("../connection.php");

$sqlmain= "select * from patient where pemail=?";
$stmt = $database->prepare($sqlmain);
$stmt->bind_param("s",$useremail);
$stmt->execute();
$userrow = $stmt->get_result();
$userfetch=$userrow->fetch_assoc();
$userid= $userfetch["pid"];
$username=$userfetch["pname"];

if($_POST){
    if(isset($_POST["booknow"])){
        $apponum=$_POST["apponum"];
        $scheduleid=$_POST["scheduleid"];
        $date=$_POST["date"];
        $docname=$_POST["docname"];
        $docemail=$_POST["docemail"];
        $title=$_POST["title"];
        $scheduledate=$_POST["scheduledate"];
        $scheduletime=$_POST["scheduletime"];
        $sql2="insert into appointment(pid,apponum,scheduleid,appodate) values ($userid,$apponum,$scheduleid,'$date')";
        $result= $database->query($sql2);

        // Créer un nouvel objet PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur
            $mail->SMTPDebug = 2; // Activer le débogage SMTP
            $mail->isSMTP(); // Utiliser SMTP
            $mail->Host = 'smtp.gmail.com'; // Définir l'hôte du serveur SMTP
            $mail->SMTPAuth = true; // Activer l'authentification SMTP
            $mail->Username = ''; // Nom d'utilisateur SMTP (adresse e-mail)
            $mail->Password = ''; // Mot de passe SMTP
            $mail->SMTPSecure = 'tls'; // Activer le cryptage TLS
            $mail->Port = 587; // Port TCP auquel se connecter

            // Destinataires
            $mail->setFrom('adresse mail', 'nom lié à l\'adresse mail');

            // Contenu pour le patient
            $mail->addAddress($useremail, $username); // Ajouter le patient comme destinataire
            $mail-> isHTML(true);
            $mail->Subject = 'Confirmation de rendez-vous';
            $mail->Body    = "<img src='img\logo.jpeg' alt='Logo' style='display:block; margin-bottom:20px;'>
            <h2 style='color:#333;'>Confirmation de rendez-vous</h2>
            Bonjour $username,
            <br><br>Vous vous êtes inscrit à la session 
            <strong>$title</strong> dirigée par le docteur 
            <strong>$docname</strong>. 
            Votre numéro de rendez-vous est : <strong>$apponum</strong>. 
            La session est prévue pour le <strong>$scheduledate</strong> à 
            <strong>$scheduletime</strong>.
            <p>Les informations supplémentaires liées à votre rendez-vous sont les suivantes :</p>
            <ul>
                <li>Nom du docteur : <strong>$docname</strong></li>
                <li>Email du docteur : <strong>$docemail</strong></li>
                <li>Titre de la session : <strong>$title</strong></li>
                <li>Date de la session : <strong>$scheduledate</strong></li>
                <li>Heure de début : <strong>$scheduletime</strong></li>
                <li>Frais à payer : <strong>5$ ou son equvalent en francs congolais</strong></li>
            </ul>
            <br><br>Cordialement,<br>L'équipe de Dave Hospital";
            $mail->send();

            // Contenu pour le médecin
            $mail->clearAddresses(); // Effacer les adresses précédentes
            $mail->addAddress($docemail, $docname); // Ajouter le médecin comme destinataire
            $mail-> isHTML(true);
            $mail->Subject = 'Nouveau rendez-vous';
            $mail->Body    = "Bonjour Dr. $docname,
            <br><br>Le patient $username s'est inscrit à votre session 
            <strong>$title</strong>. 
            Le numéro de rendez-vous du patient est : <strong>$apponum</strong>. 
            La session est prévue pour le <strong>$scheduledate</strong> à 
            <strong>$scheduletime</strong>.
            <p>Les informations supplémentaires liées au rendez-vous sont les suivantes :</p>
            <ul>
                <li>Nom du patient : <strong>$username</strong></li>
                <li>Email du patient : <strong>$useremail</strong></li>
                <li>Titre de la session : <strong>$title</strong></li>
                <li>Date de la session : <strong>$scheduledate</strong></li>
                <li>Heure de début : <strong>$scheduletime</strong></li>
                <li>Frais à payer : <strong>5$ ou son equvalent en francs congolais</strong></li>
            </ul>
            <br><br>Cordialement,<br>L'équipe de Dave Hospital";
            $mail->send();

            echo 'Les messages ont été envoyés avec succès.';
        } catch (Exception $e) {
            echo "Les messages n'ont pas pu être envoyés. Erreur de messagerie : {$mail->ErrorInfo}";
        }

        header("location: appointment.php?action=booking-added&id=".$apponum."&titleget=none");
    }
}
ob_end_flush();
?>
