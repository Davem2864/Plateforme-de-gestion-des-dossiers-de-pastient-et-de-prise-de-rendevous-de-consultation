<?php
session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
        header("location: ../login.php");
    }
} else {
    header("location: ../login.php");
}

if($_GET) {
    // Import database
    include("../connection.php");
    $id = $_GET["id"];
    $result001 = $database->query("select * from doctor where docid=$id;");
    if ($result001->num_rows > 0) {
        $email = ($result001->fetch_assoc())["docemail"];
        $database->query("delete from webuser where email='$email';");
        $database->query("delete from doctor where docemail='$email';");
    }
    header("location: doctor.php");
}
?>
