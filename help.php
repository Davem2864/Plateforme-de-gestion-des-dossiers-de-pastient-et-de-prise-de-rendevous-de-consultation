<?php
// Inclure la connexion à la base de données
include 'connection.php';

session_start();

// Vérifiez si l'utilisateur est un administrateur connecté
if (!isset($_SESSION["user"]) || empty($_SESSION["user"]) || $_SESSION["usertype"] !== '') {
   
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération et validation du mot de passe
    $newPassword = $_POST['new_password'];

    if (empty($newPassword)) {
        $error = 'Password cannot be empty.';
    } else {
        // Hachage du mot de passe
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Préparation de la requête pour mettre à jour le mot de passe pour tous les patients
        $stmt = $database->prepare("UPDATE patient SET ppassword = ?");
        $stmt->bind_param("s", $hashedPassword);

        if ($stmt->execute()) {
            $success = 'Passwords updated successfully for all patients.';
        } else {
            $error = 'Failed to update passwords: ' . $stmt->error;
        }

        $stmt->close();
    }
}

$database->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient Passwords</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Update Patient Passwords</h1>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Passwords</button>
    </form>
</div>
</body>
</html>
