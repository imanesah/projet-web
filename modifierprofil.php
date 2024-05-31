<?php
// modifier_collaborateur.php

// Vérifie si un fichier a été téléchargé
if (isset($_FILES['file'])) {
    // Récupère l'identifiant du collaborateur
    $idCollaborateur = $_POST['idCollaborateur'];

    // Récupère le nom du fichier téléchargé
    $fileName = $_FILES['file']['name'];
    // Récupère le chemin temporaire du fichier téléchargé
    $fileTmpName = $_FILES['file']['tmp_name'];
    // Récupère le type de fichier
    $fileType = $_FILES['file']['type'];

    // Vérifie si le fichier est une image
    if (strpos($fileType, 'image') !== false) {
        // Génère un nom unique pour le fichier avec une extension .jpg
        $newFileName = uniqid() . '.jpg';
        // Déplace le fichier téléchargé vers le répertoire souhaité avec le nouveau nom
        $destination = 'uploads/' . $newFileName; // Assurez-vous que le répertoire 'uploads/' existe et a les bonnes permissions

        if (move_uploaded_file($fileTmpName, $destination)) {
            // Connexion à la base de données (à remplacer par vos informations)
            require("connectprojet.php");

            // Requête SQL pour mettre à jour la colonne "ImageCollaborateur" dans la base de données
            $sql = "UPDATE collaborateur SET ImageCollaborateur = '$newFileName' WHERE idCollaborateur = $idCollaborateur";

            // Exécution de la requête SQL
            if ($bd->query($sql) === TRUE) {
                echo "Le collaborateur a été modifié avec succès.";
            } else {
                echo "Erreur lors de la modification du collaborateur : " . $bd->error;
            }

            // Fermeture de la connexion à la base de données
            $bd->close();
        } else {
            echo "Une erreur s'est produite lors du téléchargement du fichier.";
        }
    } else {
        echo "Le fichier téléchargé n'est pas une image.";
    }
} else {
    echo "Aucun fichier téléchargé.";
}
?>
