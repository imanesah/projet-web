<?php


session_start(); // Démarrer la session



require("connectprojet.php");    

// Récupérer l'identifiant du collaborateur de la session
$idCollaborateur = $_SESSION['idCollaborateur'];
 
$req = "SELECT * FROM collaborateur WHERE idCollaborateur = :id";
$stmt = $bd->prepare($req);
$stmt->bindParam(':id', $idCollaborateur, PDO::PARAM_INT); // Lier le paramètre
$stmt->execute();
$collaborateur = $stmt->fetch(PDO::FETCH_ASSOC); // Récupérer le collaborateur connecté
// Récupérer le BLOB et le convertir en Base64



$reqProjet = "SELECT p.Description, r.nomRole, p.nomProjet
FROM collaborateurs_projet cp 
JOIN projet p ON cp.idprojet = p.idprojet 
JOIN Role r ON cp.idRole = r.idRole 
WHERE cp.idcollaborateur = :id";
$stmtProjet = $bd->prepare($reqProjet);
$stmtProjet->bindParam(':id', $idCollaborateur, PDO::PARAM_INT);
$stmtProjet->execute();

// Obtenir tous les projets du collaborateur
$projets = $stmtProjet->fetchAll(PDO::FETCH_ASSOC);
$reqCompetence = "SELECT *,c.nomcompetence, cc.level 
                  FROM collaborateurs_competence cc 
                  JOIN competence c ON cc.idcompetence = c.idcompetence 
                  WHERE cc.idcollaborateur = :id";
$stmtCompetence = $bd->prepare($reqCompetence);
$stmtCompetence->bindParam(':id', $idCollaborateur, PDO::PARAM_INT);
$stmtCompetence->execute();

// Récupérer toutes les compétences associées au collaborateur
$competences = $stmtCompetence->fetchAll(PDO::FETCH_ASSOC);
$reqCompetence1 = "SELECT *
                  FROM collaborateurs_competence cc 
                  
                  WHERE cc.idcollaborateur = :id";
$stmtCompetence1 = $bd->prepare($reqCompetence1);
$stmtCompetence1->bindParam(':id', $idCollaborateur, PDO::PARAM_INT);
$stmtCompetence1->execute();

// Récupérer toutes les compétences associées au collaborateur
$competenc = $stmtCompetence1->fetchAll(PDO::FETCH_ASSOC);
 
$com = "SELECT * 
              FROM competence "
              ;
$commp = $bd->prepare($com);

$commp->execute();
$nomcom = $commp->fetchAll(PDO::FETCH_ASSOC);


$reqRoles = "SELECT * FROM Role";
$stmtRoles = $bd->prepare($reqRoles);
$stmtRoles->execute();
$roles = $stmtRoles->fetchAll(PDO::FETCH_ASSOC);

$rqprojet = "SELECT * FROM projet";
$projet = $bd->prepare($rqprojet);
$projet->execute();
$nomprojet = $projet->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style type="text/css">
    body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
       
        
       
       
        .content {
            margin-left: 0px;
            padding: 20px;
            display:flex;
            flex-wrap:wrap;
         
        }
        .panel-content,
.panel-social {
    position: relative;
    border-radius: 0 0 50px 50px;
 
}

.panel-content {
    border-top: 1px solid #eee;
    padding: 61px 40px 53px;
    height: 415px;
}
.main-body{
    margin-left: 0px;
   
}
.card {
    position: relative;
    display: flex;
   
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    
    
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    height: auto;
}
.me-2 {
    margin-right: .5rem!important;
}

/* CSS pour styliser le bouton de suppression sans fond */
.delete-btn {
    background-color: transparent; /* Fond transparent */
    border: none; /* Pas de bordure */
    color: #333; /* Couleur de l'icône */
    cursor: pointer; /* Curseur en forme de main pour les boutons */
    padding: 0; /* Pas de padding */
    float: right; /* Positionner à droite */
}

/* Effet au survol */
.delete-btn:hover {
    color: red; /* Couleur de l'icône au survol */
}


save-changes-btn {
    background-color: black; /* même couleur que le menu latéral */
    color: #fff; /* texte blanc pour correspondre */
    border: none; /* pas de bordure */
    padding: 10px 20px; /* ajouter du rembourrage */
    border-radius: 4px; /* bords légèrement arrondis */
    cursor: pointer; /* curseur en forme de main pour les boutons */
}

/* Ajout de l'effet au survol */
.save-changes-btn:hover {
    background-color: purple; /* nouvelle couleur au survol */
}
/* Style pour le bouton 'Message' */
/* Couleur du menu latéral */


/* Style pour le bouton 'Message' */
.message-btn {
    background-color: #fcf8f8; /* fond noir */
    color: #333; /* texte de la même couleur que le menu */
    border: 2px solid #333; /* bordure de la même couleur que le menu */
    padding: 10px 20px; /* ajustement du rembourrage */
    border-radius: 4px; /* bordures arrondies */
    cursor: pointer; /* curseur indiquant qu'il est cliquable */
}

/* Effet au survol */
.message-btn:hover {
    background-color:red; /*  couleur du menu au survol */
    color: #fff; /* texte blanc au survol */
}



/* Bordure pour l'image de profil */
.profile-img {
    border: 4px solid #333; /* même couleur que le menu latéral */
    border-radius: 50%; /* forme circulaire */
    padding: 2px; /* espacement entre la bordure et l'image */
}

/* Définir l'image du profil comme classe 'profile-img' */
.img-rounded {
    border-radius: 50%; /* pour assurer que l'image reste ronde */
    padding: 1px; /* espacement entre la bordure et l'image */
}
.pjr{
    margin-top: 20px;
    height: 415px;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    width:352px;
   
}
.row{
    
    display:flex;
}
.row2{
    position:relative;
    bottom:20px;
    margin-left:370px;
    width:750px;
    

}
.new {
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    
}
.card {
    margin : auto;
    display: flex;
}

    </style>
</head>
<body>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Webteck - Technology & IT Solutions HTML Template - Digital Agency</title>
    <meta name="author" content="Themeholy">
    <meta name="description" content="Webteck - Technology & IT Solutions HTML Template">
    <meta name="keywords" content="Webteck - Technology & IT Solutions HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
   
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <div class="cursor"></div>
    <div class="cursor2"></div>


    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



    <!--********************************
   		Code Start From Here 
	******************************** -->




    <!--==============================
     Preloader
  ==============================-->
    <div id="preloader" class="preloader ">
        <button class="th-btn th-radius preloaderCls">Cancel Preloader </button>
        <div id="loader" class="th-preloader">
            <div class="animation-preloader">
                <div class="txt-loading">
                    <span preloader-text="W" class="characters">W</span>

                    <span preloader-text="E" class="characters">E</span>

                    <span preloader-text="B" class="characters">B</span>

                    <span preloader-text="T" class="characters">T</span>

                    <span preloader-text="E" class="characters">E</span>

                    <span preloader-text="C" class="characters">C</span>

                    <span preloader-text="K" class="characters">K</span>
                </div>
            </div>
        </div>
    </div> 
   <!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout2">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li><i class="fas fa-map-location"></i>54 NJ-12, Flemington, United States</li>
                                <li><i class="fas fa-phone"></i><a href="tel:+1539873657">+153-987-3657</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:info@webteck.com">info@webteck.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-social">
                            <span class="social-title">Follow Us On : </span>
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a class="icon-masking" href="index.html"><span data-mask-src="assets/img/logo.svg" class="mask-icon"></span><img src="assets/img/logo.svg" alt="Webteck"></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li><a href="home.php">Home</a></li>
                                    <li><a href="profil.phvp">Profil</a></li>
                                    <li><a href="about.html">Annonces</a></li>
                                    <li><a href="about.html">formation</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="about.html">log out</a></li>
                                   
                                </ul>
                            </nav>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="content">
  <div class="container">
    <div class="main-body">
    <form method="post" action="editinfoemationpersonelles.php">
      <div class="row">
         <div class="col-lg-4">
  
            <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo"". $collaborateur['ImageCollaborateur']; ?>" alt="Collaborateur" width="210">

                        <div class="mt-3">
                           <h4><?php echo"".$collaborateur['UserName']; ?></h4>
                           <p class="text-secondary mb-1"><?php echo"". $collaborateur['PosteCollaborateur']; ?></p>
       
                        </div>
                        <div class="mt-3">
                       
                        <button type="submit" class="th-btn th-radius preloaderCls" onclick="supprimerCollaborateur(<?php echo $collaborateur['idCollaborateur']; ?>)">supprimer </button>
                        <form id="form_modifier_<?php echo $collaborateur['idCollaborateur']; ?>" enctype="multipart/form-data">
    <input type="file" name="file" accept="image/*" id="file_<?php echo $collaborateur['idCollaborateur']; ?>" style="display: none;" onchange="modifierCollaborateur(<?php echo $collaborateur['idCollaborateur']; ?>)">
    <button type="button" class="th-btn th-radius preloaderCls" onclick="confirmerModification(<?php echo $collaborateur['idCollaborateur']; ?>);">Modifier</button>
</form>

                        </div>
                  </div>
                </div>
            </div>
         </div>
         
         <div class="col-lg-8">
             <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nom</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="UserName" value="<?php echo"". $collaborateur['UserName']; ?>">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <input type="text" class="form-control" name="EmailCollaborateur" value="<?php echo $collaborateur['EmailCollaborateur']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Téléphone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <input type="text" class="form-control" name="PhoneCollaborateur" value="<?php echo $collaborateur['PhoneCollaborateur']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Adresse</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="AdresseCollaborateur" value="<?php echo $collaborateur['AdresseCollaborateur']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            
                        <button type="submit" class="btn btn-primary px-4 save-changes-btn" >SAVE </button>
                            
                        </div>
                    </div>
                </div>
             </div>
         </div>

       </div>

</div>
    



<div class="row mt-4" >
<div class="col-md-4 ">

<div class="new" >

      <br>
      <h5 class="d-flex align-items-center mb-3"  style="margin-left: 15px;">
       Les projets</h5>
       <ul>
    <?php foreach ($projets as $projet) : ?>
        <li>
            <a href="#" class="project-link" style="color:black;" data-description="<?php echo htmlspecialchars($projet['Description']); ?>">
                <?php echo htmlspecialchars($projet['nomProjet']); ?>
            </a>
            <br>
            <span style="color:#ad67ea"><?php echo htmlspecialchars($projet['nomRole']); ?></span>
        </li>
    <?php endforeach; ?>
    <div id="project-description" style="display: none;">
        <h4>Description du Projet</h4>
        <p id="project-description-content"></p>
    </div>
</ul>
<script>
    // Récupérez tous les liens de projet
    var projectLinks = document.querySelectorAll('.project-link');

    // Ajoutez un écouteur d'événement à chaque lien
    projectLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le comportement de lien par défaut
            
            // Récupérez la description du projet à partir de l'attribut de données
            var description = this.getAttribute('data-description');

            // Mettez à jour le contenu de la div de description du projet
            document.getElementById('project-description-content').innerHTML = description;

            // Affichez la div de description du projet
            document.getElementById('project-description').style.display = 'block';
        });
    });

    // Ajoutez un écouteur d'événement global pour masquer la div de description
    document.addEventListener('click', function(event) {
        var projectDescriptionDiv = document.getElementById('project-description');
        
        // Vérifiez si le clic s'est produit en dehors de la div de description et des liens de projet
        if (!event.target.classList.contains('project-link') && !projectDescriptionDiv.contains(event.target)) {
            // Masquez la div de description du projet
            projectDescriptionDiv.style.display = 'none';
        }
    });
</script>

    <button type="button" class="th-btn th-radius preloaderCls" data-bs-toggle="modal" data-bs-target="#editprojet">
    ajouter Projet
</button>
    <form method="post" action="ajouterprojet.php">
<!-- Modal -->
<div class="modal fade" id="editprojet" tabindex="-1" aria-labelledby="editprojet" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editprojet">Ajouter Projet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire avec compétence et niveau -->
             <form id="competenceForm">
              <div  class="mb-3">
                     <label for="NomCompetence" class="form-label">Projts</label>
                     <select class="form-control" id="NomProjetSelect" name="NomProjet">
                  <option value="">-- Choisissez un Projet --</option>
                  <?php foreach ($nomprojet as $projet) : ?>
                                    <option value="<?php echo htmlspecialchars($projet['NomProjet']); ?>"><?php echo htmlspecialchars($projet['NomProjet']); ?></option>
                                <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                        <label for="role" class="form-label">ROLE</label>
                        <select class="form-control" id="nomRole" name="nomRole">
                                <option value="">-- Choisissez un rôle --</option>
                                <?php foreach ($roles as $role) : ?>
                                    <option value="<?php echo htmlspecialchars($role['nomRole']); ?>"><?php echo htmlspecialchars($role['nomRole']); ?></option>
                                <?php endforeach; ?>
                            </select>   </div>
                </form>
             </div>
             <div class="modal-footer">
                <!-- Bouton pour fermer le modal -->
                <button type="button" class="th-btn th-radius preloaderCls" data-bs-dismiss="modal">Fermer</button>
                <!-- Bouton pour sauvegarder les modifications -->
               
                <button type="submit" >OK</button>
             </div>
            </div>
        </div>
    </div>

</div>
</from>

</div>

<div class="col-md-8 ">
<div class="new" >
<br>
<h5 class="modal-title" style="margin-left:20px;">Competence Status</h5>

<ul>
    <?php foreach ($competences as $competence) : ?>
       
    
    <p><?php echo htmlspecialchars($competence['nomcompetence'] )?> :</p>
    <?php
    $niveau = $competence['level']; // Récupère le niveau de compétence
    $pourcentage = 0; // Valeur par défaut

    // Définir le pourcentage en fonction du niveau
    if ( $niveau === 'LOW') {
        $pourcentage = 25; // Si le niveau est null, 0%
    } elseif ($niveau === 'moyenne') {
        $pourcentage = 50; // Si le niveau est "moyenne", 50%
    } elseif ($niveau === 'bien') {
        $pourcentage = 75; // Si le niveau est "bien", 100%
    }elseif ($niveau === 'trés bien') {
        $pourcentage = 100; // Si le niveau est "bien", 100%
    }

    // Définir la couleur de la barre de progression en fonction du pourcentage
    $barColor = 'bg-secondary'; // Couleur par défaut (gris)
    if ($pourcentage === 25) {
        $barColor = 'bg-danger'; // Rouge pour 25%
    } elseif ($pourcentage === 50) {
        $barColor = 'bg-warning'; // Jaune pour 50%
    } elseif ($pourcentage === 75) {
        $barColor = 'bg-info'; // Bleu pour 75%
    } elseif ($pourcentage === 100) {
        $barColor = 'bg-success'; // Vert pour 100%
    }
    ?>
   
    <div class="progress mb-3" style="height: 5px;width:690px;">
        <div class="progress-bar <?php echo $barColor; ?>" role="progressbar" style="width: <?php echo $pourcentage; ?>%" aria-valuenow="<?php echo $pourcentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
        
    </div>
      <form method="post" action="delet_competence.php" style="display:inline;">
    <input type="hidden" name="idCompetence" value="<?php echo $competence['idCompetence']; ?>">
    <input type="hidden" name="idCollaborateur" value="<?php echo $collaborateur['idCollaborateur']; ?>">
   
     <button type="submit" class="delete-btn" title="Supprimer"  style="margin-right:10px;">
        <i class="fas fa-trash-alt"></i> <!-- Icône de suppression -->
    </button>
   </form>
       
   
   <?php endforeach; ?>
   
    </ul>
    <button type="button" class="th-btn th-radius preloaderCls" data-bs-toggle="modal" data-bs-target="#editCompetenceModal">
    Edit Compétence
</button>
<form method="post" action="auth.php">
<!-- Modal -->
<div class="modal fade" id="editCompetenceModal" tabindex="-1" aria-labelledby="editCompetenceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCompetenceModalLabel">Edit Compétence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire avec compétence et niveau -->
             <form id="competenceForm">
              <div  class="mb-3">
                     <label for="NomCompetence" class="form-label">Compétence</label>
                     <select class="form-control" id="competenceSelect" name="NomCompetence">
                  <option value="">-- Choisissez une compétence --</option>
                  <?php 
                  // Parcourt $nomcom pour générer les éléments <option>
                 foreach ($nomcom as $comp) { 
                echo "<option value='" . htmlspecialchars($comp['NomCompetence']) . "'>" . htmlspecialchars($comp['NomCompetence']) . "</option>";
                }
                  ?>
                </select>
              </div>

              <div class="mb-3">
                        <label for="competenceLevel" class="form-label">Niveau</label>
                        <select name="competenceLevel" ><option value="">-- Choisissez un niveau--</option><option value="LOW" >LOW</option> <br>
                        <option VALUE="moyenne" >moyenne</option><option VALUE="bien">bien</option><option VALUE="trés bien" >trés bien</option></select> 
             </div>
                </form>
             </div>
             <div class="modal-footer">
                <!-- Bouton pour fermer le modal -->
                <button type="button" class="th-btn th-radius preloaderCls" data-bs-dismiss="modal">Fermer</button>
                <!-- Bouton pour sauvegarder les modifications -->
               
                <button type="submit" >OK</button>
             </div>
            </div>
        </div>
    </div>

</div>
</from>
</div></div>



<!--test-->



<!-- JavaScript pour soumettre le formulaire -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
function submitForm() {
    // Récupérer les données du formulaire
    var formData = {
        competenceName: document.getElementById("competenceName").value,
        competenceLevel: document.getElementById("competenceLevel").value
    };

    console.log("Form data:", formData);

    // Ici, vous pouvez envoyer les données à un serveur via AJAX ou un autre moyen
    // Pour cet exemple, nous allons juste fermer le modal
    var modal = new bootstrap.Modal(document.getElementById("editCompetenceModal"));
    modal.hide();
}
</script>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

	
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <!-- Swiper Slider -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Circle Progress -->
    <script src="assets/js/circle-progress.js"></script>
    <!-- Range Slider -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Isotope Filter -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Tilt JS -->
    <script src="assets/js/tilt.jquery.min.js"></script>

    <!-- gsap -->
    <script src="assets/js/gsap.min.js"></script>
    <!-- ScrollTrigger -->
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/smooth-scroll.js"></script>

    <!-- Particles JS -->
    <script src="assets/js/particles.min.js"></script>

    <script src="assets/js/particles-config.js"></script>
    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>
    <script>
    function supprimerCollaborateur(idCollaborateur) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce collaborateur ?')) {
            $.ajax({
                url: 'supprimerprofil.php',
                type: 'POST',
                data: { idCollaborateur: idCollaborateur },
                success: function(response) {
                    alert(response); // Affiche la réponse du serveur
                    // Recharge la page ou met à jour la liste des collaborateurs
                    location.reload(); // Recharge la page
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Affiche l'erreur dans la console
                    alert('Une erreur s\'est produite lors de la suppression du collaborateur.');
                }
            });
        }
    }
    function confirmerModification(idCollaborateur) {
    if (confirm("Voulez-vous vraiment modifier le profil ?")) {
        document.getElementById('file_' + idCollaborateur).click();
    }
}

function modifierCollaborateur(idCollaborateur) {
    var formData = new FormData(document.getElementById('form_modifier_' + idCollaborateur));

    fetch('modifierprofil.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Assurez-vous que votre PHP retourne un JSON
    .then(data => {
        if (data.success) {
            alert("Profil mis à jour avec succès !");
            document.getElementById('image_' + idCollaborateur).src = data.newImagePath;
        } else {
            alert("Erreur lors de la mise à jour du profil : " + data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
  // Détecter le changement dans l'élément input de type file


</script>



</body>
</html>