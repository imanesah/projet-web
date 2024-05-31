<?php
session_start(); // Démarrer la session

require("connectprojet.php");

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['idCollaborateur'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header("Location: PROJET_login.php");
    exit();
}

// Récupérer l'idCollaborateur à partir de la session
$idCollaborateur = $_SESSION['idCollaborateur'];

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $titre = $_POST['TitrePublication'];
    $description = $_POST['DiscriptionPublication'];
    $hashtage1 = $_POST['hatshtage1'];
    $hashtage2 = $_POST['hatshtage2'];
    $hashtage3 = $_POST['hatshtage3'];

    // Préparer la requête SQL pour insérer une nouvelle publication
    $sql = "INSERT INTO publication (TitrePublication, DescriptionPublication,DatePublication, hashtage1, hashtage2, hashtage3, EtatPublication, idCollaborateur) VALUES (:titre, :description,NOW(), :hashtage1, :hashtage2, :hashtage3, 'nouvelle', :idCollaborateur)";

    // Préparer et exécuter la requête
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':hashtage1', $hashtage1);
    $stmt->bindParam(':hashtage2', $hashtage2);
    $stmt->bindParam(':hashtage3', $hashtage3);
    $stmt->bindParam(':idCollaborateur', $idCollaborateur);

    if ($stmt->execute()) {
        // Rediriger l'utilisateur vers une page de succès ou afficher un message de succès
        header("Location: home.php");
        exit();
    } else {
        // En cas d'erreur lors de l'exécution de la requête, afficher un message d'erreur
        echo "Erreur lors de l'ajout de la publication.";
    }
}
?>
