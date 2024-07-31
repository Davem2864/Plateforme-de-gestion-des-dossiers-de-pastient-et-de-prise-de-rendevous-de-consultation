<?php
include '../connection.php';

header('Content-Type: application/json');

session_start();
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    echo json_encode(['success' => false, 'error' => 'User session not found.']);
    exit;
}

$userEmail = $_SESSION['user'];

// Prepare and execute the query to fetch admin details
$stmt = $database->prepare("SELECT aemail, profile, statut FROM admin WHERE aemail = ?");
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
    echo json_encode(['success' => true, 'admin' => $admin]);
} else {
    echo json_encode(['success' => false, 'error' => 'Admin not found.']);
}

$stmt->close();
$database->close();
?>
