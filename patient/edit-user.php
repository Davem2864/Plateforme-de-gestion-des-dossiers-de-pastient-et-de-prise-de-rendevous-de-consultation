<?php
    session_start();

    // Import database
    include("../connection.php");

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form values and check if they are set
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $nic = isset($_POST['nic']) ? $_POST['nic'] : '';
        $oldemail = isset($_POST["oldemail"]) ? $_POST["oldemail"] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $tele = isset($_POST['Tele']) ? $_POST['Tele'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
        $id = isset($_POST['id00']) ? $_POST['id00'] : '';

        // Check if passwords match
        if ($password == $cpassword) {
            // Prepare SQL statement
            $stmt = $database->prepare("SELECT patient.pid FROM patient INNER JOIN webuser ON patient.pemail = webuser.email WHERE webuser.email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $id2 = $result->fetch_assoc()["pid"];
            } else {
                $id2 = $id;
            }

            if ($id2 != $id) {
                $error = '1';
            } else {
                // Prepare SQL statements
                $stmt1 = $database->prepare("UPDATE patient SET pemail = ?, pname = ?, ppassword = ?, pnic = ?, ptel = ?, paddress = ? WHERE pid = ?");
                $stmt1->bind_param("ssssssi", $email, $name, $password, $nic, $tele, $address, $id);
                $stmt1->execute();

                $stmt2 = $database->prepare("UPDATE webuser SET email = ? WHERE email = ?");
                $stmt2->bind_param("ss", $email, $oldemail);
                $stmt2->execute();

                $error = '4';
            }
        } else {
            $error = '2';
        }
    } else {
        $error = '3';
    }

    // Redirect to settings page
    header("location: settings.php?action=edit&error=" . $error . "&id=" . $id);
?>
