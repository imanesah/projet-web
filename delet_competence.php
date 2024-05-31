<?php
// Inclure le fichier de connexion à la base de données
require("connectprojet.php");

// Vérifier si l'ID de la compétence a été passé en paramètre POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idCompetence']) && isset($_POST['idCollaborateur'])) {
        $idCompetence = $_POST['idCompetence'];
        $idCollaborateur = $_POST['idCollaborateur'];

        // Préparer la requête de suppression
        $sql = "DELETE FROM collaborateurs_competence WHERE idCompetence = :idCompetence AND idCollaborateur = :idCollaborateur";
        $stmt = $bd->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':idCompetence', $idCompetence, PDO::PARAM_INT);
        $stmt->bindParam(':idCollaborateur', $idCollaborateur, PDO::PARAM_INT);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Redirection vers la page des informations personnelles avec un message de succès
            header("Location: profil.php?success=1");
            exit();
        } else {
            // En cas d'échec, afficher un message d'erreur
            echo "Erreur lors de la suppression de la compétence.";
        }
    } else {
        echo "Paramètres manquants.";
    }
} else {
    echo "Requête invalide.";
}

// Fermer la connexion à la base de données
$bd = null;
?>
