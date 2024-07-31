<?php
include '../connection.php';

header('Content-Type: application/json');

if (isset($_GET['plid'])) {
    $plid = intval($_GET['plid']);

    $query = "SELECT p.pname, d.docname, s.title, pl.plid, pl.pid, d.docid, s.scheduleid, pl.date_reception, pl.nature_plaintes, pl.description, pl.statut, pl.date_resolution, pl.commentaires
              FROM plaintes pl
              INNER JOIN patient p ON pl.pid = p.pid
              INNER JOIN doctor d ON pl.docid = d.docid
              INNER JOIN schedule s ON pl.scheduleid = s.scheduleid
              WHERE pl.plid = ?";

    if ($stmt = $database->prepare($query)) {
        $stmt->bind_param('i', $plid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $complaint = $result->fetch_assoc();
            echo json_encode(['success' => true, 'data' => $complaint]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Plainte non trouvée.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Échec de la préparation de la requête.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID de plainte non spécifié.']);
}

$database->close();
?>
