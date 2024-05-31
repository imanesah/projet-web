<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer un compte</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <style> .image {
    width: 360px;
    height: 280px;
     margin-top:90px;
}</style>
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
                                    <li><a href="about.html">Home</a></li>
                                    
                                    <li><a href="home.php">Annonces</a></li>
                                    <li><a href="about.html">formation</a></li>
                                    <li><a href="GestionCompet.php">Competence</a></li>
                                    <li><a href="about.html">projet</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">profils</a>
                                        <ul class="sub-menu">
                                        <li><a href="profiladmin.php">profile personelle</a></li>
                                            <li><a href="compte.php">nouveau collaborateur</a></li>
                                            <li><a href="listeprofil">liste des collaborateur</a></li>
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
</div>    
</div>
<div class="card card0 border-0">
  <div class="row d-flex">
        <div class="col-lg-6">
                <div class="card1 pb-5">
                    
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <img src="https://i.imgur.com/uNGdWHi.png" class="image" >
                    </div>
                </div>
        </div>
         <div class="col-lg-6">
            <br>
            <form method="post" action="create_account.php"> <!-- Action vers le script PHP -->
                   <div class="row px-3">
                        <label for="text"  class="mb-1">UserName</label>
                        <input type="text" class="form-control" id="UserName" name="UserName" required>
                    </div>
                    <div class="row px-3">
                          <label for="email"  class="mb-1">Email</label>
                          <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="row px-3">
                          <label for="password"  class="mb-1">Mot de passe</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                     </div>
                     <br>
                     <button type="submit" class="btn btn-primary" >Créer</button> <!-- Bouton de soumission -->
             </form>
         </div>
         </div>
         </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
