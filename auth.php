
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

    // Récupérer les données du formulaire
    $nomCompetence = $_POST['NomCompetence'];
    $level = $_POST['competenceLevel'];

    // Récupérer l'ID de la compétence en fonction du nom
    $stmt = $bd->prepare("SELECT idCompetence FROM competence WHERE NomCompetence = :nomCompetence");
    $stmt->bindParam(':nomCompetence', $nomCompetence, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        die("La compétence " . htmlspecialchars($_POST['NomCompetence']) . " n'existe pas.");
    }
    if ($result) {
        // Obtenir l'ID de la compétence
        $idCompetence = $result['idCompetence'];

        // Insérer dans la table 'collaborateur_competence'
        $insertStmt = $bd->prepare("
            INSERT INTO collaborateurs_competence (idCollaborateur, idCompetence, level)
            VALUES (:idCollaborateur, :idCompetence, :level)
        ");
     
        $insertStmt->bindParam(':idCollaborateur', $idCollaborateur, PDO::PARAM_INT);
        $insertStmt->bindParam(':idCompetence', $idCompetence, PDO::PARAM_INT);
        $insertStmt->bindParam(':level', $level, PDO::PARAM_STR);

        // Exécuter l'insertion
        $insertStmt->execute();

        // Redirection vers une page de succès ou de confirmation
        header("Location: profil.php"); // Modifier selon votre structure
        exit;
    } else {
        echo "Compétence non trouvée.";
    }

?>