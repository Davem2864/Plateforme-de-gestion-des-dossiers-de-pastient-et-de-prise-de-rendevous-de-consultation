<?php
include '../connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];

    // Validate inputs
    if (empty($currentPassword) || empty($newPassword)) {
        echo json_encode(['success' => false, 'error' => 'All fields are required.']);
        exit;
    }

    session_start();
    $userEmail = $_SESSION["user"];

    // Retrieve user info
    $stmt = $database->prepare("SELECT ppassword FROM patient WHERE pemail = ?");
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $hashedPassword = $user['ppassword'];

    if (!password_verify($currentPassword, $hashedPassword)) {
        echo json_encode(['success' => false, 'error' => 'Current password is incorrect.']);
        exit;
    }

    // Hash new password
    $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);

    // Update password
    $stmt = $database->prepare("UPDATE patient SET ppassword = ? WHERE pemail = ?");
    $stmt->bind_param("ss", $newPasswordHash, $userEmail);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to change password.']);
    }

    $stmt->close();
    $database->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
