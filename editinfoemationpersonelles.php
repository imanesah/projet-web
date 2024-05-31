<?php
session_start();

require("connectprojet.php");

// Récupérez les données de session et de POST
$idCollaborateur = $_SESSION['idCollaborateur'];
$UserName = $_POST['UserName'];
$EmailCollaborateur = $_POST['EmailCollaborateur'];
$PhoneCollaborateur = $_POST['PhoneCollaborateur'];
$AdresseCollaborateur = $_POST['AdresseCollaborateur'];

// Utilisez une requête UPDATE pour mettre à jour les informations
$update = $bd->prepare("
    UPDATE collaborateur 
    SET UserName = ?, EmailCollaborateur = ?, PhoneCollaborateur = ?, AdresseCollaborateur = ? 
    WHERE idCollaborateur = ? ");

// Passez les paramètres dans le bon ordre
$par = array($UserName, $EmailCollaborateur, $PhoneCollaborateur, $AdresseCollaborateur, $idCollaborateur);

// Exécutez la requête préparée
$update->execute($par);

// Redirigez vers la page du profil après la mise à jour
header("Location: profil.php");
exit();
?>
