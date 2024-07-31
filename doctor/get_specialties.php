<?php
// Include database connection
include '../connection.php';

// Initialize response array
$response = array();

// Prepare and execute query
$sql = "SELECT id, sname FROM specialties";
$result = $database->query($sql);

if ($result->num_rows > 0) {
    $specialties = array();

    // Fetch specialties
    while ($row = $result->fetch_assoc()) {
        $specialties[] = $row;
    }

    // Set success response
    $response['success'] = true;
    $response['specialties'] = $specialties;
} else {
    // No specialties found
    $response['success'] = false;
    $response['error'] = 'No specialties found';
}

// Close connection
$database->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
