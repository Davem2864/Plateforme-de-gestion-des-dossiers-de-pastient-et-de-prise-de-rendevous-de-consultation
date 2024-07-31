<?php
include '../connection.php'; // Connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $rapport_id = intval($_GET['id']);

    // Préparation de la requête SQL
    $query = "DELETE FROM rapportdoc WHERE rapport_id = ?";
    $stmt = $database->prepare($query);

    if ($stmt) {
        // Liaison du paramètre
        $stmt->bind_param("i", $rapport_id);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Échec de la suppression']);
        }

        // Fermeture de la requête préparée
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur de préparation de la requête']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Méthode de requête non valide ou ID de rapport manquant']);
}
?>
