<?php
// Connexion à la base de données
require_once 'connecterBase.php';

function getProjectCollaborators($projectName) {
    global $connexion; // Accès à la connexion déjà établie dans le fichier connecterBase.php
    $collaborators = array();

    // Requête SQL pour récupérer les détails des collaborateurs associés au projet donné
    $sql = "SELECT c.UserName, c.EmailCollaborateur, r.NomRole, cp.idCollaborateur
    FROM collaborateur c
    INNER JOIN collaborateurs_projet cp ON c.idCollaborateur = cp.idCollaborateur
    INNER JOIN projet p ON cp.idProjet = p.idProjet
    INNER JOIN role r ON cp.Role = r.id
    WHERE p.NomProjet = '$projectName'";

    $resultat = mysqli_query($connexion, $sql);

    if (mysqli_num_rows($resultat) > 0) {
     
        while ($row = mysqli_fetch_assoc($resultat)) {
            $collaborators[] = $row;
           
        }
    }
    if (!$resultat) {
        printf("Erreur : %s\n", mysqli_error($connexion));
        exit();
    }
    
 
    // Renvoyer les collaborateurs au format JSON
    echo json_encode($collaborators);
} 

// Vérifier si le paramètre projectName a été envoyé via la requête POST
if (isset($_POST['projectName'])) {
    // Récupérer le nom du projet depuis la requête POST
    $projectName = $_POST['projectName'];
    
    // Appeler la fonction getProjectCollaborators avec le nom du projet
    getProjectCollaborators($projectName);
} else {
    // Retourner une erreur si le nom du projet n'a pas été spécifié dans la requête
    //echo json_encode(array('error' => 'Le nom du projet n\'a pas été spécifié.'));
}
?>
