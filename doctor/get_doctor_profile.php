<?php
include '../connection.php';

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $doctorId = intval($_GET['id']);
    
    // Prepare the SQL query to get doctor details and specialty names
    $stmt = $database->prepare("
        SELECT 
            d.docid,
            d.docname,
            d.docemail,
            d.docnic,
            d.doctel,
            d.profile,
            GROUP_CONCAT(s.sname SEPARATOR ', ') AS specialties
        FROM 
            doctor d
        INNER JOIN 
            specialties s ON FIND_IN_SET(s.id, d.specialties) > 0
        WHERE 
            d.docid = ?
        GROUP BY 
            d.docid;
    ");
    
    // Bind the doctor ID parameter
    $stmt->bind_param("i", $doctorId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $doctor = $result->fetch_assoc();
        
        // Update profile image path if needed
        $doctor['profile'] = '../img/' . $doctor['profile'];

        echo json_encode(['success' => true, 'doctor' => $doctor]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Doctor not found.']);
    }
    
    $stmt->close();
    $database->close();
} else {
    echo json_encode(['success' => false, 'error' => 'ID not specified.']);
}
?>
