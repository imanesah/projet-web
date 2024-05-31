<?php
// Inclure le fichier de connexion à la base de données
require_once 'connecterBase.php';

// Vérifier si les données ont été envoyées via la requête POST
if (isset($_POST['projectName'], $_POST['startDate'], $_POST['endDate'])) {
    // Récupérer les données envoyées
    $projectName = $_POST['projectName'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    require_once 'date.php';
    // Insertion du nouveau projet dans la base de données
    $sql = "INSERT INTO projet (NomProjet, dateDebut, dateFin) VALUES ('$projectName', '$startDate', '$endDate')";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        // Si l'insertion s'est bien déroulée, renvoyer une réponse
        echo "Le projet a été ajouté avec succès à la base de données.";
    } else {
        // Si une erreur s'est produite lors de l'insertion, renvoyer un message d'erreur
        echo "Erreur lors de l'ajout du projet à la base de données : " . mysqli_error($connexion);
    }
} else {
    // Si les données n'ont pas été envoyées via la requête POST, affichez un message d'erreur approprié
    echo "Données manquantes.";
}
?>
