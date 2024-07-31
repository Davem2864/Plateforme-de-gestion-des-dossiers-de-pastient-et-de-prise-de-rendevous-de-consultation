<?php
include '../connection.php';

header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;

    // Validate required fields
    if (!isset($data['id'], $data['name'], $data['email'], $data['address'], $data['nic'], $data['dob'], $data['tel'])) {
        echo json_encode(['success' => false, 'error' => 'Missing required fields.']);
        exit;
    }

    $userId = intval($data['id']);
    $name = htmlspecialchars($data['name']);
    $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
    $address = htmlspecialchars($data['address']);
    $nic = htmlspecialchars($data['nic']);
    $dob = htmlspecialchars($data['dob']);
    $tel = htmlspecialchars($data['tel']);

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
        $profileImgPath = isset($data['profileImg']) ? $data['profileImg'] : 'img/default-profile.jpg';
    }

    // Begin transaction
    $database->begin_transaction();

    try {
        // Get old email for webuser update
        $stmt_old_email = $database->prepare("SELECT pemail FROM patient WHERE pid = ?");
        if (!$stmt_old_email) {
            throw new Exception('Failed to prepare SQL statement for retrieving old email.');
        }
        $stmt_old_email->bind_param("i", $userId);
        $stmt_old_email->execute();
        $result_old_email = $stmt_old_email->get_result();
        $oldEmailRow = $result_old_email->fetch_assoc();
        $oldemail = $oldEmailRow['pemail'] ?? '';

        // Update the patient table
        $stmt_patient = $database->prepare("UPDATE patient SET pname = ?, pemail = ?, paddress = ?, pnic = ?, pdob = ?, ptel = ?, profile = ? WHERE pid = ?");
        if (!$stmt_patient) {
            throw new Exception('Failed to prepare SQL statement for patient update.');
        }
        $stmt_patient->bind_param("sssssssi", $name, $email, $address, $nic, $dob, $tel, $profileImgPath, $userId);
        if (!$stmt_patient->execute()) {
            throw new Exception('Failed to update patient profile.');
        }

        // Update the webuser table
        if (!empty($oldemail)) {
            $stmt_webuser = $database->prepare("UPDATE webuser SET email = ? WHERE email = ?");
            if (!$stmt_webuser) {
                throw new Exception('Failed to prepare SQL statement for webuser update.');
            }
            $stmt_webuser->bind_param("ss", $email, $oldemail);
            if (!$stmt_webuser->execute()) {
                throw new Exception('Failed to update webuser email.');
            }
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
    $stmt_patient->close();
    if (isset($stmt_webuser)) {
        $stmt_webuser->close();
    }
    $stmt_old_email->close();
    $database->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
