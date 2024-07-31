<?php
include '../connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
        echo json_encode(['success' => false, 'error' => 'User session not found.']);
        exit;
    }

    $userEmail = $_SESSION["user"];

    // Start a transaction
    $database->begin_transaction();

    try {
        // Retrieve user info from webuser table
        $stmt = $database->prepare("SELECT email, usertype FROM webuser WHERE email = ?");
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            throw new Exception('User not found in webuser table.');
        }

        $userData = $result->fetch_assoc();

        // Archive user
        $stmt = $database->prepare("INSERT INTO archive (email, user_type) VALUES (?, ?)");
        $stmt->bind_param("ss", $userData['email'], $userData['usertype']);
        if (!$stmt->execute()) {
            throw new Exception('Failed to archive user: ' . $stmt->error);
        }

        // Delete from webuser
        $stmt = $database->prepare("DELETE FROM webuser WHERE email = ?");
        $stmt->bind_param("s", $userEmail);
        if (!$stmt->execute()) {
            throw new Exception('Failed to delete user from webuser table: ' . $stmt->error);
        }

        // Update doctor status to inactive
        $stmt = $database->prepare("UPDATE doctor SET statut = 'inactif' WHERE docemail = ?");
        $stmt->bind_param("s", $userEmail);
        if (!$stmt->execute()) {
            throw new Exception('Failed to update doctor status: ' . $stmt->error);
        }
        // Commit the transaction
        $database->commit();
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        // Rollback the transaction on error
        $database->rollback();
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    } finally {
        $stmt->close();
        $database->close();
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
