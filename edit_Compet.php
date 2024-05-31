<?php
// Inclure le fichier de connexion à la base de données
require_once 'connecterBase.php';

// Vérifier si les données nécessaires ont été envoyées via la requête POST
if (isset($_POST['competName']) && isset($_POST['newCompetName']) ) {
    // Récupérer les données du formulaire
    
    $competName = $_POST['competName'];
    $newCompetName = $_POST['newCompetName'];
    
    // Préparer la requête SQL pour mettre à jour le projet
    $sql = "UPDATE competence SET NomCompetence = '$newCompetName' WHERE NomCompetence = '$competName'";
    // Préparer et exécuter la déclaration SQL
    $success = mysqli_query($connexion, $sql);
   
    // Vérifier si la mise à jour s'est bien déroulée
    if ($success) {
        // Envoyer une réponse de succès
        echo "La competence : $newCompetName a changé d'état avec success "; 
        
    } else {
        // En cas d'erreur, renvoyer un message d'erreur
        echo "Erreur lors de la mise à jour du projet : " . mysqli_error($connexion);
    }
   

    // Fermer la déclaration et la connexion à la base de données
   // mysqli_close($connexion);
} else {
    // Si des données sont manquantes, renvoyer un message d'erreur
    //echo "Données manquantes pour la mise à jour du projet.";
}
?>
