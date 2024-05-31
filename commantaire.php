<?php
require("connectprojet.php");

try {
    $id = $_GET['id'];
    $sql = "
        SELECT commentaire.*, 
            collaborateur.UserName,collaborateur.ImageCollaborateur
        FROM commentaire
        JOIN collaborateur ON commentaire.idCollaborateur = collaborateur.idCollaborateur
        WHERE commentaire.idPublication = ?
        ORDER BY commentaire.DateCommantaire DESC
    ";

    $stmt = $bd->prepare($sql);
    $stmt->execute([$id]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($comments);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
