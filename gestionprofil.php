<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Latéral</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar li {
            padding: 10px;
            border-bottom: 1px solid #555;
        }
        .sidebar a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }
        .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #555;
        }
        .logo img {
            width: 70%;
            height: auto;
            margin-bottom: 10px;
        }
        .logo h1 {
            margin: 0;
            padding: 0;
            font-size: 20px;
            font-family: Algerian, sans-serif;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 40px); /* Ajustez pour la hauteur du menu latéral */
        }
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Espace entre les boutons */
        }
        .button-group .btn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #2bb3c0; /* Couleur du bouton "Créer un compte" */
        }
        .btn-secondary {
            background-color: #e16123; /* Couleur du bouton "Liste des collaborateurs" */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="logo3app.jpg" alt="Logo de l'application">
            <h1>Webleb</h1>
        </div>
        <ul>
            <li class="dec"><a href="interfacecollab.html"><i class="fas fa-home"></i> Accueil</a></li>
            <li class="dec"><a href="#"><i class="fas fa-bullhorn"></i> Les annonces</a></li>
            <li class="dec"><a href="#"><i class="fas fa-graduation-cap"></i> Les formations</a></li>
            <li class="dec"><a href="#"><i class="fas fa-comments"></i> Chat</a></li>
            <li class="dec"><a href="admin.php"><i class="fas fa-user"></i> Profil personnel</a></li>
            <li class="dec"><a href="gestionprofil.php"><i class="fas fa-users"></i> Profils des collaborateurs</a></li>
            <li class="dec"><a href="profil.php"><i class="fas fa-briefcase"></i> Les projets</a></li>
            <li class="dec"><a href="#"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
        </ul>
    </div>
    
    <div class="content">
        <div class="button-group">
        <a href="compte.php"> <button class="btn btn-primary">Créer un compte</button></a>
            <a href="listeprofil.php"> <button class="btn btn-secondary" >Liste des collaborateurs</button> </a>
        </div>
    </div>
</body>
</html>
