<?php

// Démarrer la session pour obtenir l'ID du collaborateur
session_start();

// Charger la connexion à la base de données
require("connectprojet.php");

// Récupérer l'identifiant du collaborateur à partir de la session
$idCollaborateur = $_SESSION['idCollaborateur'];
if (!isset($_SESSION['idCollaborateur'])) {
    die("ID collaborateur non défini. Veuillez vous reconnecter.");
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $NomProjet = $_POST['NomProjet'];
    $NomRole = $_POST['nomRole'];

    // Récupérer l'ID du rôle en fonction du nom
    $stmt = $bd->prepare("SELECT idRole FROM role WHERE NomRole = :NomRole");
    $stmt->bindParam(':NomRole', $NomRole, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupérer l'ID du projet en fonction du nom
    $stmt1 = $bd->prepare("SELECT idProjet FROM projet WHERE NomProjet = :NomProjet");
    $stmt1->bindParam(':NomProjet', $NomProjet, PDO::PARAM_STR);
    $stmt1->execute();
    $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    
    if ($result && $result1) {
        // Obtenir l'ID du rôle et du projet
        $idRole = $result['idRole'];
        $idProjet = $result1['idProjet'];

        // Insérer dans la table 'collaborateurs_projet'
        $insertStmt = $bd->prepare("
            INSERT INTO collaborateurs_projet (idCollaborateur, idProjet, idRole)
            VALUES (:idCollaborateur, :idProjet, :idRole)
        ");
     
        $insertStmt->bindParam(':idCollaborateur', $idCollaborateur, PDO::PARAM_INT);
        $insertStmt->bindParam(':idProjet', $idProjet, PDO::PARAM_INT);
        $insertStmt->bindParam(':idRole', $idRole, PDO::PARAM_INT);

        // Exécuter l'insertion
        $insertStmt->execute();

        // Redirection vers une page de succès ou de confirmation
        header("Location: profil.php"); // Modifier selon votre structure
        exit;
    } else {
        echo "Projet ou rôle non trouvé.";
    }
}
?>
