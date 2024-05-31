<?php
// Connexion à la base de données
require("connectprojet.php");

// Vérification si le paramètre searchDescription est défini dans l'URL
if (isset($_GET['searchDescription'])) {
    // Récupération de la valeur du champ de recherche
    $searchDescription = $_GET['searchDescription'];

    try {
        // Requête pour récupérer les publications contenant le hashtag spécifié
        $sql = "
            SELECT publication.*, collaborateur.UserName, collaborateur.ImageCollaborateur,
            TIMESTAMPDIFF(SECOND, publication.DatePublication, NOW()) AS s,
            TIMESTAMPDIFF(MINUTE, publication.DatePublication, NOW()) AS m,
            TIMESTAMPDIFF(HOUR, publication.DatePublication, NOW()) AS h,
            TIMESTAMPDIFF(DAY, publication.DatePublication, NOW()) AS d
            FROM publication
            JOIN collaborateur ON publication.idCollaborateur = collaborateur.idCollaborateur
            WHERE hashtage1 LIKE :searchDescription OR hashtage2 LIKE :searchDescription OR hashtage3 LIKE :searchDescription
            ORDER BY publication.DatePublication DESC
        ";

        $stmt = $bd->prepare($sql);
        // Liaison du paramètre de recherche avec la requête préparée
        $stmt->bindParam(':searchDescription', $searchDescription, PDO::PARAM_STR);
        $stmt->execute();
        $publications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Affichage des publications correspondantes
       
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>


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
    <style > 
        .content {
            margin-left: 0px;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
        }
        .comment-icon {
    display: flex;
    align-items: center;
    margin-top: 10px;
    margin-left: 20px; /* Ajoute une marge gauche de 20px */
}
.comment-icon i {
    margin-right: 5px;
}

        .link-muted { 
            color: #aaa; 
        } 
        .link-muted:hover { 
            color: #1266f1; 
        }
        .publication-item {
            margin-bottom: 20px; /* Ajoute de l'espace entre les publications */
            padding-bottom: 20px; /* Ajoute un espacement en bas de chaque publication */
            border-bottom: 1px solid #ddd; /* Ajoute une ligne de séparation entre chaque publication */
            min-height: 100px; /* Hauteur minimale de chaque publication */
            margin-top: 20px;
        }
        .pub {
           
            margin-bottom: 20px;
            margin-top: 20px;
            height: auto;
            border: 1px solid black;
            border-radius: 20px;
            padding: 10px 5px;
            width: 900px;
            box-shadow: 10px 10px 10px black;
        }
        .con {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
       
        .bg-nouvelle {
            background-color: blue;
            color: white; /* Pour rendre le texte visible sur le fond bleu */
            border: 1px solid black;
            border-radius: 10px;
            width: 60px;
        }
        .bg-resolu {
            background-color: green;
            color: white; /* Pour rendre le texte visible sur le fond vert */
            border: 1px solid black;
            border-radius: 10px;
            width: 50px;
        }
        .bg-annule {
            background-color: red;
            color: white; /* Pour rendre le texte visible sur le fond rouge */
            border: 1px solid black;
            border-radius: 10px;
            width: 70px;
        }
        .bg-relance {
            background-color: orange;
            color: white; /* Pour rendre le texte visible sur le fond jaune */
            border: 1px solid black;
            border-radius: 10px;
            width: 60px;
        }
        .user-info {
    display: flex;
    align-items: center;
}
.hashtag {
    color: blue;
    margin-right:5px;
   
    }
.bt{
    margin-left:400px;
    margin-top:10px;
}
.modal-dialog {
    max-width: 900px; /* Définissez la largeur maximale souhaitée */
    width: 100%; /* Assurez-vous que le modal est toujours centré */
    top:20%;
}
.titre{
    color:black;
    font-weight: bold;
}
.text {
    display: flex;
    flex-direction: column;
    width: 100%;
    box-sizing: border-box;
}

    </style>
</head>

<body>

    <div class="cursor"></div>
    <div class="cursor2"></div>

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
        <div class="sticky-wrapper" >
            <!-- Main Menu Area -->
            <div class="menu-area" style=" height:90px;" >
                <div class="container">
                    <div class="row align-items-center justify-content-between" >
                        <div class="col-auto">
                            <div class="header-logo">
                                <a class="icon-masking" href="index.html"><span data-mask-src="assets/img/logo.svg" class="mask-icon"></span><img src="assets/img/logo.svg" alt="Webteck"></a>
                            </div>
                        </div>
                        <div class="col-auto" >
                            <nav class="main-menu d-none d-lg-inline-block" >
                                <ul>
                                    <li><a href="home.php">Home</a></li>
                                    <li><a href="profil.php">Profile</a></li>
                                    <li><a href="about.html">Annonces</a></li>
                                    <li><a href="about.html">formation</a></li>
                                    <li><a href="GestionCompte.php">Competence</a></li>
                                    
                                   
                                    
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
    
    
 



<div class="con ">


 <?php foreach ($publications as $publication) : ?>
 
<div class="pub"> <!-- Ajoutez la classe publication-item pour chaque div de publication -->
<div class="user-info" >
    <img class="rounded-circle shadow-1-strong me-3"
        src="<?php echo htmlspecialchars($publication['ImageCollaborateur']); ?>" alt="avatar" width="60"
        height="60" />
       
        <h6 class="fw-bold mb-1"><?php echo htmlspecialchars($publication['UserName']); ?></h6> 
        <p class=" mb-0 <?php
                  switch ($publication['EtatPublication']) {
                        case 'nouvelle':
                                     echo 'bg-nouvelle';
                                     break;
                         case 'résolu':
                                   echo 'bg-resolu';
                                    break;
                         case 'complété':
                                echo 'bg-annule';
                                 break;
                         case 'relancé':
                                    echo 'bg-relance';
                                    break;
                        default:
                              echo '';
                              break;
                         }
                        ?>" style="margin-left: 10px;">
                             <?php echo htmlspecialchars($publication['EtatPublication']); ?>
                        </p>
</div> 
    <div class="content">
        
        <div class="d-flex align-items-center mb-3">
        <?php
                            $time = "";
                            if ($publication['s'] < 60) {
                                $time = $publication['s'] . " second" . ($publication['s'] > 1 ? "s" : "") . " ago";
                            } elseif ($publication['m'] < 60) {
                                $time = $publication['m'] . " minute" . ($publication['m'] > 1 ? "s" : "") . " ago";
                            }  elseif ($publication['h'] < 24) {
                                $time = $publication['h'] . " hour" . ($publication['h'] > 1 ? "s" : "") . " ago";
                            } elseif ($publication['d'] < 31) {
                                $time = $publication['d'] . " day" . ($publication['d'] > 1 ? "s" : "") . " ago";
                            } else {
                                $months = floor($publication['d'] / 30);
                                if ($months < 12) {
                                    $time = $months . " month" . ($months > 1 ? "s" : "") . " ago";
                                } else {
                                    $years = floor($months / 12);
                                    $remainingMonths = $months % 12;
                                    $time = $years . " year" . ($years > 1 ? "s" : "") . ($remainingMonths > 0 ? " and " . $remainingMonths . " month" . ($remainingMonths > 1 ? "s" : "") : "") . " ago";
                                }
                            }
                            ?>
            <p class="mb-0">
            <?php echo htmlspecialchars($time); ?>
            </p>
            

            <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
          
        </div>
        
        <p class="text">
        
       
            <label class="titre"><?php echo htmlspecialchars($publication['TitrePublication']); ?></label>
     
            <?php echo htmlspecialchars($publication['DescriptionPublication']); ?>
        
             
        </p>
            <span class="hashtag">#<?php echo htmlspecialchars($publication['hashtage1']); ?></span>
             <span class="hashtag">#<?php echo htmlspecialchars($publication['hashtage2']); ?></span> 
             <span class="hashtag">#<?php echo htmlspecialchars($publication['hashtage3']); ?></span>
    </div>
             <div class="comment-icon" >
                <i class="fas fa-comment"></i>
                <span>Commentaire</span>
            </div>
</div>
<?php endforeach; ?>
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


       



</body>
</html>
