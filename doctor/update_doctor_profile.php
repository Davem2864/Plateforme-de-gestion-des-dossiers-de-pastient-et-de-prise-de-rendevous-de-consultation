<?php
include '../connection.php';

header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate required fields
    if (!isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['nic'], $_POST['tel'], $_POST['specialties'])) {
        echo json_encode(['success' => false, 'error' => 'Missing required fields.']);
        exit;
    }

    $userId = intval($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $nic = htmlspecialchars($_POST['nic']);
    $tel = htmlspecialchars($_POST['tel']);
    $specialties = $_POST['specialties']; // Comma-separated string

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
        // Update the doctor table
        $stmt = $database->prepare("UPDATE doctor SET docname = ?, docemail = ?, docnic = ?, doctel = ?, specialties = ?, profile = ? WHERE docid = ?");
        if (!$stmt) {
            throw new Exception('Failed to prepare SQL statement for doctor update.');
        }
        $stmt->bind_param("ssssssi", $name, $email, $nic, $tel, $specialties, $profileImgPath, $userId);
        if (!$stmt->execute()) {
            throw new Exception('Failed to update doctor profile.');
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
