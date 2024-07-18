<?php
// Import database connection
include("../connection.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$docid = $input['docid'];
$message = $input['message'];
$heure_envoi = date('Y-m-d H:i:s');

// Prepare statement to prevent SQL Injection
$stmt = $database->prepare("INSERT INTO message_doc (docid, message, heure_envoi) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $docid, $message, $heure_envoi);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send message']);
}

$stmt->close();
$database->close();
?>
