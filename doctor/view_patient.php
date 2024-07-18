<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM patient WHERE pid='$id'";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["pname"];
        $email = $row["pemail"];
        $nic = $row["pnic"];
        $dob = $row["pdob"];
        $tele = $row["ptel"];
        $address = $row["paddress"];

        $response = [
            'success' => true,
            'data' => [
                'pid' => $id,
                'name' => $name,
                'email' => $email,
                'nic' => $nic,
                'dob' => $dob,
                'tele' => $tele,
                'address' => $address
            ]
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'Patient introuvable']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID non fourni']);
}
?>
