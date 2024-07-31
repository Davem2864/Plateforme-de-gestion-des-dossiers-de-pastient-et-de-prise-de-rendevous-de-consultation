<?php
include '../connection.php';

header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate required fields
    if (!isset($_POST['email'], $_POST['status'])) {
        echo json_encode(['success' => false, 'error' => 'Missing required fields.']);
        exit;
    }

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $status = htmlspecialchars($_POST['status']);

    // Handle file upload
    if (isset($_FILES['profileImg']) && $_FILES['profileImg']['error'] == UPLOAD_ERR_OK) {
        $profileImg = $_FILES['profileImg'];
        $uploadDir = '../img/';
        $uploadFile = $uploadDir . basename($profileImg['name']);

        // Validate file type and size
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($profileImg['type'], $allowedTypes)) {
            echo json_encode(['success' => false, 'error' => 'Invalid file type.']);
            exit;
        }
        if ($profileImg['size'] > 2 * 1024 * 1024) { // 2 MB limit
            echo json_encode(['success' => false, 'error' => 'File size exceeds limit.']);
            exit;
        }

        // Move uploaded file
        if (move_uploaded_file($profileImg['tmp_name'], $uploadFile)) {
            $profileImgPath = '../img/' . basename($profileImg['name']); // Relative path
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to upload profile image.']);
            exit;
        }
    } else {
        // No file uploaded; use the existing image path
        $profileImgPath = isset($_POST['profileImg']) ? $_POST['profileImg'] : '../img/profile.jpeg';
    }

    // Begin transaction
    $database->begin_transaction();

    try {
        // Update the admin table
        $stmt = $database->prepare("UPDATE admin SET aemail = ?, statut = ?, profile = ? WHERE aemail = ?");
        if (!$stmt) {
            throw new Exception('Failed to prepare SQL statement for admin update.');
        }
        $stmt->bind_param("ssss", $email, $status, $profileImgPath, $email); // Updated query
        if (!$stmt->execute()) {
            throw new Exception('Failed to update admin profile.');
        }

        // Commit the transaction
        $database->commit();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        // Rollback the transaction if any of the updates fail
        $database->rollback();
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }

    // Close statements and database connection
    $stmt->close();
    $database->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
