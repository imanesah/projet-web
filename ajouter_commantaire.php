<?php
session_start();
require("connectprojet.php");

try {
    // Récupérer les données de la requête AJAX
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($data['ContenuCommantaire'], $data['idPublication'], $data['idCollaborateur'])) {
        throw new Exception('Des champs requis sont manquants');
    }

    $ContenuCommantaire = $data['ContenuCommantaire'];
    $idPublication = $data['idPublication'];
    $idCollaborateur = $data['idCollaborateur'];

    // Insérer le commentaire dans la base de données
    $sql = "INSERT INTO commentaire (ContenuCommantaire, idPublication, idCollaborateur, DateCommantaire) 
            VALUES (:ContenuCommantaire, :idPublication, :idCollaborateur, NOW())";

    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':ContenuCommantaire', $ContenuCommantaire);
    $stmt->bindParam(':idPublication', $idPublication);
    $stmt->bindParam(':idCollaborateur', $idCollaborateur);
    $stmt->execute();

    // Récupérer l'utilisateur qui a ajouté le commentaire
    $sqlUser = "SELECT UserName, ImageCollaborateur FROM collaborateur WHERE idCollaborateur = :idCollaborateur";
    $stmtUser = $bd->prepare($sqlUser);
    $stmtUser->bindParam(':idCollaborateur', $idCollaborateur);
    $stmtUser->execute();
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

    // Préparer les données de réponse
    $response = [
        'UserName' => $user['UserName'],
        'ImageCollaborateur' => $user['ImageCollaborateur'],
        'ContenuCommantaire' => $ContenuCommantaire,
        'DateCommantaire' => date('Y-m-d H:i:s') // Format de date
    ];

    // Envoyer la réponse en JSON
    echo json_encode($response);
} catch (Exception $e) {
    // En cas d'erreur, envoyer une réponse avec le message d'erreur
    echo json_encode(['error' => $e->getMessage()]);
}
?>
