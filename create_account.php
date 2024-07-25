<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create Account</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
$_SESSION["user"]="";
$_SESSION["usertype"]="";

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$_SESSION["date"]=$date;

include("connection.php");

if($_POST){
    $result= $database->query("select * from webuser");

    $fname=$_SESSION['personal']['fname'];
    $lname=$_SESSION['personal']['lname'];
    $name=$fname." ".$lname;
    $address=$_SESSION['personal']['address'];
    $nic=$_SESSION['personal']['nic'];
    $dob=$_SESSION['personal']['dob'];
    $email=$_POST['newemail'];
    $tele=$_POST['tele'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];

    if ($newpassword==$cpassword){
        $sqlmain= "select * from webuser where email=?;";
        $stmt = $database->prepare($sqlmain);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }else{
            $database->query("insert into patient(pemail,pname,ppassword, paddress, pnic,pdob,ptel) values('$email','$name','$newpassword','$address','$nic','$dob','$tele');");
            $id_patient = $database->insert_id;
            $database->query("insert into dossier(pid,date_c,date_maj) values('$id_patient',NOW(),NOW())");
            $database->query("insert into webuser values('$email','p')");

            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;

            // Créer un nouvel objet PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Paramètres du serveur
                $mail->SMTPDebug = 2; // Activer le débogage SMTP
                $mail->isSMTP(); // Utiliser SMTP
                $mail->Host = 'smtp.gmail.com'; // Définir l'hôte du serveur SMTP
                $mail->SMTPAuth = true; // Activer l'authentification SMTP
                $mail->Username = '----------------------------'; // Nom d'utilisateur SMTP (adresse e-mail)
                $mail->Password = '----------------------------'; // Mot de passe SMTP
                $mail->SMTPSecure = 'tls'; // Activer le cryptage TLS
                $mail->Port = 587; // Port TCP auquel se connecter

                // Destinataires
                $mail->setFrom('adresse mail', 'nom lié à l\'adress');
                $mail->addAddress($email, $fname . ' ' . $lname); // Ajouter un destinataire

                // Contenu
                $mail->isHTML(true); // Définir le format de l'e-mail en HTML
                $mail->Subject = 'Bienvenue chez Dave Hospital';
                $mail->Body    = "Bonjour $fname $lname,<br><br>Bienvenue chez Dave Hospital! Nous sommes ravis de vous avoir parmi nous. Si vous avez des questions ou besoin d'aide, n'hésitez pas à nous contacter.<br><br>Cordialement,<br>L'équipe de Dave Hospital";

                $mail->send();
                echo 'Le message a été envoyé avec succès.';
            } catch (Exception $e) {
                echo "Le message n'a pas pu être envoyé. Erreur de messagerie : {$mail->ErrorInfo}";
            }

            header('Location: patient/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>';
    }
}else{
    $error='<label for="promter" class="form-label"></label>';
}
?>
<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Let's Get Started</h1>
                                <h1 class="h4 text-gray-900 mb-4">It's Okey, Now Create User Account.</h1>
                            </div>
                            <form class="user" action="" method="POST" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" name="newemail" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Email Adress" required >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="tel" name="tele" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="newpassword" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Password">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="cpassword" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <input type="submit" value="signup" class="btn btn-primary btn-user btn-block">
                                <hr>
                                <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>