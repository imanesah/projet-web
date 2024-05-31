<?php
// supprimer_collaborateur.php

// Vérifie si l'identifiant a été envoyé en POST
if (isset($_POST['idCollaborateur'])) {
    // Récupère l'identifiant du collaborateur
    $idCollaborateur = $_POST['idCollaborateur'];

    // Connexion à la base de données (à remplacer par vos informations)
    require("connectprojet.php");

    // Requête SQL pour mettre à jour la colonne "ImageCollaborateur" avec une valeur vide
    $sql = "UPDATE collaborateur SET ImageCollaborateur = 'NULL' WHERE idCollaborateur = $idCollaborateur";

    // Exécution de la requête SQL
    if ($bd->query($sql) === TRUE) {
        echo "Le collaborateur a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du collaborateur : " . $bd->error;
    }

    // Fermeture de la connexion à la base de données
    $bd->close();
} else {
    echo "Identifiant du collaborateur non spécifié.";
}
?>
