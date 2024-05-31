<?php
// Inclure le fichier de connexion et récupérer les collaborateurs
require 'connectprojet.php';

$query = $bd->prepare("SELECT * FROM collaborateur");
$query->execute();

$collaborateurs = $query->fetchAll(PDO::FETCH_ASSOC);




?>

<!doctype html>
<html lang="en">
<head>
  <title>Webleb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="menu.css"> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
 <style>
 /* Styles généraux */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

/* Menu latéral (barre latérale) */

/* Navigation dans la barre latérale */






/* Contenu principal */
.content {
    margin-left: 25px; /* Laisser de l'espace pour la barre latérale */
    padding: 20px; /* Ajout de remplissage */
}

.collaborator-line {
    display: flex; /* Utilisation de Flexbox pour aligner les éléments */
    align-items: center; /* Alignement vertical */
    padding: 1rem; /* Ajout de remplissage */
    border-bottom: 1px solid #e0e0e0; /* Bordure entre les collaborateurs */
    background-color: #fff; /* Arrière-plan blanc */
    margin-top: 2%;
    height: 100px;
    width: 900px;
    margin-left:10%;
}

.collaborator-photo {
    width: 60px; /* Taille de la photo */
    height: 60px;
   
    margin-right: 1rem; /* Espace entre photo et texte */
}

.collaborator-info {
    display: flex; /* Active Flexbox */
    align-items: center; /* Aligne verticalement */
    gap: 40px; /* Espacement entre les éléments */
}


.collaborator-actions {
    display: flex; /* Affiche les éléments sur une ligne */
    gap: 10px; /* Espacement entre les actions */
}

.collaborator-actions a {
    text-decoration: none; /* Pas de soulignement sur les liens */
    color: #555; /* Couleur des icônes */
    margin-right: 0%;
    margin-left:10%:
}

.collaborator-actions a:hover {
    color: #ff0000; /* Couleur des icônes au survol */
}

 </style>
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
                                   
                                    <li><a href="about.html">Annonces</a></li>
                                    <li><a href="about.html">formation</a></li>
                                    <li><a href="GestionCompet.php">Competence</a></li>
                                    <li><a href="about.html">projet</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#"> profils</a>
                                        <ul class="sub-menu">
                                            <li><a href="profiladmin.php">profile personelle</a></li>
                                            <li><a href="compte.php">nouveau collaborateur</a></li>
                                            <li><a href="listeprofil.php">liste des collaborateur</a></li>
                                            
                                        </ul>
                                    </li>
                                    
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
 
    <div class="container">
    <?php foreach ($collaborateurs as $collaborateur): ?>
        <div class="collaborator-line"> <!-- Chaque collaborateur dans une ligne -->
        <img src="<?php echo $collaborateur['ImageCollaborateur']; ?> " 
     alt="Collaborateur" 
     class="collaborator-photo" /> <!-- Photo du collaborateur -->
     
            <div class="collaborator-info"> <!-- Informations du collaborateur -->
                <h5><?php echo $collaborateur['UserName']; ?></h5> <!-- Nom du collaborateur -->
                <p> <?php echo $collaborateur['EmailCollaborateur']; ?></p> <!-- Email -->
                <p> <?php echo $collaborateur['PosteCollaborateur']; ?></p> <!-- Poste -->
                <div class="collaborator-actions"> <!-- Ajout des actions d'édition et de suppression -->
        
    </div>
            </div>
            
        </div>
    <?php endforeach; ?>
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

            </body>
            </html>