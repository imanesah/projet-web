<?php
// Inclure le fichier de connexion à la base de données
require_once 'connecterBase.php';

// Vérifier si le nom du projet a été envoyé via la requête POST
if (isset($_POST['compet'])) {
    // Récupérer le nom du projet à partir de la requête POST
    $compet = $_POST['compet'];

    // Insertion du nouveau projet dans la base de données
    $sql = "INSERT INTO competence (NomCompetence) VALUES ('$compet')";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        // Si l'insertion s'est bien déroulée, renvoyer une réponse
        echo "La competence a été ajouté avec succès à la base de données.";
    } else {
        // Si une erreur s'est produite lors de l'insertion, renvoyer un message d'erreur
        echo "Erreur lors de l'ajout de La competence à la base de données : " . mysqli_error($connexion);
    }
} else {
    // Si le nom du projet n'a pas été envoyé via la requête POST, affichez un message d'erreur approprié
    echo "Nom de La competence non reçu.";
}
?>
