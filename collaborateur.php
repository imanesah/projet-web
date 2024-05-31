<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Latéral</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    

    <style>
        /* Styles généraux */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

/* Menu latéral */
.sidebar {
    width: 250px;
    background-color: #333;
    color: #fff;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    overflow-y: auto; /* Permet de faire défiler le menu si nécessaire */
}

/* Logo du menu latéral */
.logo {
    display: flex;
    flex-direction: column; /* Aligner verticalement */
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #555;
}

.logo img {
    width: 70%; /* Définissez la largeur de l'image */
    height: auto; /* Maintenir le ratio d'aspect */
    margin-bottom: 10px; /* Espacement entre l'image et le texte */
}

.logo h1 {
    margin: 0;
    font-size: 20px;
    font-family: Algerian, sans-serif;
}

/* Navigation dans le menu latéral */
.sidebar ul {
    list-style: none; /* Pas de puces */
    padding: 0;
    margin: 0;
}

.sidebar li {
    padding: 10px;
    border-bottom: 1px solid #555; /* Séparation entre les éléments */
}

.sidebar a {
    text-decoration: none; /* Pas de soulignement sur les liens */
    color: #fff;
    font-weight: bold;
    display: flex;
    align-items: center; /* Aligner les icônes et le texte */
}

.sidebar a i {
    margin-right: 10px; /* Espacement entre l'icône et le texte */
}

.dec:hover {
    color: #333; /* Couleur du texte au survol */
    background-color: #fff; /* Arrière-plan au survol */
}

/* Espace pour le contenu principal */
.content {
    margin-left: 250px; /* Laisser de l'espace pour le menu latéral */
    padding: 20px;
}


    </style>
</head>
<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="sidebar">
        <div class="logo">
            <img src="logo3app.jpg" alt="Logo de l'application">
            <h1>Collaboration</h1>
        </div>
        <ul>
            <li class="dec"><a class="dec" href="interfacecollab.html"><i class="fas fa-home"></i> Accueil</a></li>
            <li class="dec"><a class="dec" href="#"><i class="fas fa-bullhorn"></i> Les annonces</a></li>
            <li class="dec"><a class="dec" href="#"><i class="fas fa-graduation-cap"></i> Les formations</a></li>
           
            <li class="dec" ><a class="dec" href="#"><i class="fas fa-comments"></i> Chat</a></li>
            <li class="dec"><a  class="dec" href="profil.php"><i class="fas fa-user"></i> Profil</a></li>
            <li  class="dec"><a  class="dec" href="#"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
        </ul>
    </div>
    
    
</body>
</html>
