<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM doctor WHERE docid='$id'";
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["docname"];
        $email = $row["docemail"];
        $nic = $row["docnic"];
        $tele = $row["doctel"];
        $spec_id = $row["specialties"];

        // Fetch the specialty name
        $spec_res = $database->query("SELECT sname FROM specialties WHERE id='$spec_id'");
        if ($spec_res->num_rows > 0) {
            $spec_row = $spec_res->fetch_assoc();
            $spec_name = $spec_row['sname'];
        } else {
            $spec_name = "Spécialité introuvable";
        }

        $spec_list_res = $database->query("SELECT id, sname FROM specialties");
        $specialties = [];
        while ($spec_list_row = $spec_list_res->fetch_assoc()) {
            $specialties[] = ['id' => $spec_list_row['id'], 'name' => $spec_list_row['sname']];
        }

        $response = [
            'success' => true,
            'data' => [
                'docid' => $id,
                'name' => $name,
                'email' => $email,
                'nic' => $nic,
                'tele' => $tele,
                'specialty' => $spec_name
            ],
            'specialties' => $specialties
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'Docteur introuvable']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID non fourni']);
}
?>
