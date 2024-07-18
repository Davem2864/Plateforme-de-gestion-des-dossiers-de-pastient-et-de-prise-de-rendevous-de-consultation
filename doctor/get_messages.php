<?php
// Import database connection
include("../connection.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Fetch messages from both tables
$query = "
    (SELECT 'pt' AS sender, message, heure_envoi FROM message_pt ORDER BY heure_envoi ASC)
    UNION ALL
    (SELECT 'doc' AS sender, message, heure_envoi FROM message_doc ORDER BY heure_envoi ASC)
    ORDER BY heure_envoi ASC
";
$result = $database->query($query);

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => 'Database query failed: ' . $database->error]);
    exit;
}

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = [
        'sender' => $row['sender'],
        'message' => $row['message'],
        'heure_envoi' => $row['heure_envoi']
    ];
}

echo json_encode($messages);

$result->close();
$database->close();
?>
