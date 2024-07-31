<?php
include '../connection.php';

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    
    $stmt = $database->prepare("SELECT pid, pemail, pname, ppassword, paddress, pnic, pdob, ptel, profile FROM patient WHERE pid = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $patient = $result->fetch_assoc();
        
        // Update this if needed to point to the correct directory
        $patient['profile'] = '../img/' . $patient['profile'];

        echo json_encode(['success' => true, 'patient' => $patient]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Patient not found.']);
    }
    
    $stmt->close();
    $database->close();
} else {
    echo json_encode(['success' => false, 'error' => 'ID not specified.']);
}
?>
