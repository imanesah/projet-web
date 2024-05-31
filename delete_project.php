<?php
// Inclure le fichier de connexion à la base de données
require_once 'connecterBase.php';

// Vérifier si le nom du projet a été envoyé via la requête POST
if (isset($_POST['projectName'])) {
    // Récupérer le nom du projet à partir de la requête POST
    $projectName = $_POST['projectName'];

    // Requête pour vérifier s'il y a des collaborateurs associés à ce projet
    $sql_check_collaborators = "SELECT COUNT(*) AS count FROM collaborateurs_projet WHERE idProjet = (SELECT idProjet FROM projet WHERE NomProjet = '$projectName')";
    $result_check_collaborators = mysqli_query($connexion, $sql_check_collaborators);

    if ($result_check_collaborators) {
        $row = mysqli_fetch_assoc($result_check_collaborators);
        $collaboratorCount = $row['count'];

        if ($collaboratorCount > 0) {
            // S'il y a des collaborateurs associés à ce projet, renvoyer un message d'alerte
            echo "Pas possible,ce projet contient des collaborateurs ";
        } else {
            // S'il n'y a pas de collaborateurs associés à ce projet, procéder à la suppression
            $sql_delete_project = "DELETE FROM projet WHERE NomProjet = '$projectName'";
            $result_delete_project = mysqli_query($connexion, $sql_delete_project);

            if ($result_delete_project) {
                // Si la suppression s'est bien déroulée, renvoyer une réponse de succès
                echo "success";
            } else {
                // Si une erreur s'est produite lors de la suppression du projet, renvoyer un message d'erreur
                echo "Erreur lors de la suppression du projet de la base de données : " . mysqli_error($connexion);
            }
        }
    } else {
        // Si une erreur s'est produite lors de la vérification des collaborateurs associés au projet, renvoyer un message d'erreur
        echo "Erreur lors de la vérification des collaborateurs associés au projet : " . mysqli_error($connexion);
    }
} else {
    // Si le nom du projet n'a pas été envoyé via la requête POST, afficher un message d'erreur
    echo "Nom du projet non reçu.";
}
?>
