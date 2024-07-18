<?php
//import database
include("../connection.php");
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$pid = $input['pid'];
$message = $input['message'];
$heure_envoi = date('Y-m-d H:i:s');
// Prevent SQL Injection
$stmt = $database->prepare("INSERT INTO message_pt (pid, message, heure_envoi) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $pid, $message, $heure_envoi);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send message']);
}

$stmt->close();
$database->close();
?>

?>
