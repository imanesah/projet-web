<?php
// Inclure le fichier de connexion à la base de données
require_once 'connecterBase.php';

require_once 'edit_Compet.php'

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration</title>
    <!-- Bootstrap CSS -->
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
       
        .compet-list li {
            cursor: pointer;
            padding: 10px;
            transition: background-color 0.3s ease; /* Transition fluide */
        }

        .compet-list li:hover {
            background-color: #f0f0f0; /* Couleur d'arrière-plan au survol */
        }

        .compet-list .delete-compet {
            color: red;
            cursor: pointer;
            margin-left: 5px;
        }

        .compet-list .delete-compet:hover {
            color: darkred; /* Couleur de la croix au survol */
        }

        .compet-details-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333; /* Couleur du titre */
        }

        .collaborator {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: #60c4f3; /* Couleur d'arrière-plan */
            transition: background-color 0.3s ease; /* Transition fluide */
        }

        .collaborator:hover {
            background-color: #cce5ff; /* Couleur d'arrière-plan au survol */
        }

        .collaborator span {
            display: block;
            margin-bottom: 5px;
            color: #333; /* Couleur du texte */
        }

        .collaborator-actions {
            font-size: 18px;
            cursor: pointer;
            margin-left: 5px;
            transition: color 0.3s ease; /* Transition fluide */
        }

        .collaborator-actions:hover {
            color: #007bff; /* Couleur des actions au survol */
        }

        .activity {
            background-color: #f0f0f0; /* Couleur de fond de la section d'activité */
            padding: 20px;
            border-radius: 10px; /* Coins arrondis */
            margin-top: 20px;
        }

        .activity p {
            margin-bottom: 10px;
            color: #333; /* Couleur du texte */
        }

        .activity p span {
            font-weight: bold;
            color: #007bff; /* Couleur des nombres */
        }

        #showActivityButton {
            position: fixed;
            top: 20px;
            right: 20px;
            display: none;
            z-index: 999; /* Empêche le bouton de se superposer sur d'autres éléments */
        }

        /* Media query pour le bouton d'affichage de l'activité */
        @media (max-width: 768px) {
            #showActivityButton {
                display: block;
            }
        }
        .compet-list {
    list-style: none;
    padding: 0;
    max-height: 200px; /* Hauteur maximale de la liste des projets */
    overflow-y: auto; /* Ajout du défilement vertical */
}
.time-elapsed{
    color:green;
}
.col-md-12{
    width: 50%;
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
                                    <li><a href="GestionCompte.php">Competence</a></li>
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

<div class=" container rounded-3 border border-2 border-dark my-5 bg-white" style="height:auto;">
        <div>
        <h1 class=" h1">Competences</h1> 
    <div class="row">
            <div class=" col-8">
        <input class=" py-3 form-control shadow" placeholder="saisir nouveau compétence" type="text" id="inputText"> 
            </div>
            <div class="col-2">
                <!-- <i onclick="addList()" class=" btn btn-dark rounded-pill fas fa-4x fa-plus-circle "></i> -->
                <button onclick="addList()" class=" mt-2 btn btn-dark"> Ajouter </button>
                
            </div>
        </div>
    </div>
        <hr>
    <div class="row rounded bg-white">
        <div class=" col-12"> 
        <ul class=" list-group" id="list"></ul>
        </div> 
    </div> 
    <div class="list-compt">
    <ul id="compet-list" class="list-group compet-list">
                    <!-- Projets seront ajoutés dynamiquement ici -->
                    <?php
                    // Requête pour sélectionner tous les noms et états de projets
                    $sql = "SELECT NomCompetence FROM competence";

                    // Exécuter la requête
                    $resultat = mysqli_query($connexion, $sql);

                    // Vérifier s'il y a des résultats
                    if (mysqli_num_rows($resultat) > 0) {
                        // Parcourir les résultats et afficher chaque nom de projet avec l'état et les boutons
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            // Afficher le nom de projet avec l'état et les boutons
                            echo '<li class="list-group-item" o>
                                    <span>' . $row["NomCompetence"] . '</span>
                                    <span class="edit-compet" onclick="editCompet(\'' . $row["NomCompetence"] . '\')">&#9998;</span>
                                    <span class="delete-compet" onclick="deleteCompet(\'' . $row["NomCompetence"] . '\')">&#x2716;</span>
                                </li>';
                        }
                    } else {
                        // Si aucun projet n'est trouvé dans la base de données
                        echo "<li class='list-group-item'>Aucun competence trouvé</li>";
                    }
                    ?>

                </ul>
    
    </div>
    

    <!-- jQuery (obligatoire pour Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS (optionnel) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        

        function addlistt(event) {
            if (event.keyCode === 13) { // Key code for "Enter" key
                addList();
            }
        }

      
// JavaScript pour ajouter un projet à la liste des projets
function addList() {
    let compet = document.getElementById("inputText").value;
    if (compet !== "") {
        // Vérifier si le projet existe déjà dans la base de données
       
        checkComptExistence(compet);
    }
}

// Fonction pour vérifier si le projet existe déjà dans la base de données
function checkComptExistence(compet) {
    // Effectuer une requête AJAX pour vérifier si le projet existe déjà
    $.ajax({
        type: 'POST',
        url: 'check_compet.php',
        data: { compet: compet },
        success: function(response) {
            // Vérifier la réponse du serveur
            if (response === "exists") {
                
                // Le projet existe déjà, afficher un message à l'utilisateur
                alert("la Compétence existe déjà dans la base de données.");
            } else {
                // Le projet n'existe pas, ajouter le projet à la liste des projets
                
                addCompToListUI(compet);

            }
        },
        error: function(xhr, status, error) {
            // Gérer les erreurs ici
            console.error(error);
        }
    });
}
// Fonction pour ajouter le projet à la liste des projets dans l'interface utilisateur
function addCompToListUI(compet) {
    // Ajouter le projet à la liste des projets dans l'interface utilisateur
    var competList = document.getElementById("compet-list");
    var newCompet = document.createElement("li");
    newCompet.className = "list-group-item";

    // Ajouter le nom du compet
    var competNameSpan = document.createElement("span");
    competNameSpan.textContent = compet;
    newCompet.appendChild(competNameSpan);

    

    // Ajouter l'icône d'édition
    var editIcon = document.createElement("span");
    editIcon.textContent = " \u270E";
    editIcon.className = "edit-compet";
    editIcon.onclick = function() {
        editCompet(compet); // Fonction à implémenter pour l'édition du projet
    };
    newCompet.appendChild(editIcon);

    // Ajouter l'icône de suppression
    var deleteIcon = document.createElement("span");
    deleteIcon.textContent = " \u2716";
    deleteIcon.className = "delete-compet";
    deleteIcon.onclick = function() {
        deleteCompet(compet);
    };
    newCompet.appendChild(deleteIcon);

    // Ajouter l'élément li à la liste des projets
    competList.appendChild(newCompet);

    // Effacer le champ de saisie après l'ajout du projet
    document.getElementById("inputText").value = "";

   

    // Envoyer le nom et l'état du projet à PHP pour l'ajouter à la base de données (via AJAX par exemple)
    addCompetToDatabase(compet);
}


// JavaScript pour envoyer le nom du projet à PHP pour l'ajouter à la base de données (via AJAX par exemple)
function addCompetToDatabase(compet) {
    $.ajax({
        url: 'add_compet.php', // Chemin vers le script PHP
        type: 'POST', // Méthode de requête
        data: { compet: compet }, // Données à envoyer (nom du projet)
        success: function(response) { // Fonction appelée en cas de succès
            // Manipuler la réponse si nécessaire
            console.log(response);
        },
        error: function(xhr, status, error) { // Fonction appelée en cas d'erreur
            console.error(error);
        }
    });
}

// JavaScript pour supprimer un projet de la liste des projets
function deleteCompet(compet) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce projet?")) {
        // Envoyer une demande de suppression au serveur
        deleteCompetFromDatabase(compet);
    }
}

// JavaScript pour envoyer le nom du projet à PHP pour le supprimer de la base de données (via AJAX)
function deleteCompetFromDatabase(compet) {
    $.ajax({
        url: 'delete_compet.php', // Chemin vers le script PHP
        type: 'POST', // Méthode de requête
        data: { compet: compet }, // Données à envoyer (nom du projet)
        success: function(response) { // Fonction appelée en cas de succès
            // Manipuler la réponse si nécessaire
            console.log(response);
            // Si la suppression s'est bien déroulée, supprimer le projet de la liste
            if (response === "success") {
                removeCompetFromList(compet);
            }
        },
        error: function(xhr, status, error) { // Fonction appelée en cas d'erreur
            console.error(error);
        }
    });
}
// Fonction pour supprimer le projet de la liste des projets dans l'interface utilisateur
function removeCompetFromList(compet) {
    // Trouver tous les éléments li correspondant au projet
    const competListItems = document.querySelectorAll(`#compet-list li`);
    competListItems.forEach(competListItem => {
        if (competListItem.textContent.includes(compet)) {
            // Supprimer l'élément li de la liste project-list
            competListItem.parentNode.removeChild(competListItem);

            // Mettre à jour le compteur des projets supprimés
            //deletedCompetCount++;
            
            // Marquer le projet comme édité
            markCompetAsEdited(compet);
            
            // Vérifier si le projet supprimé est celui dont les détails sont affichés
            const displayedCompetTitle = document.querySelector('.compet-details-title');
            if (displayedCompetTitle && displayedCompetTitle.textContent.includes(compet)) {
                // Cacher la div des détails du projet et des collaborateurs
             //   console.log(projectName);
                hideCompetDetails(compzt);
            }
        }
    });
}




       




  
// Fonction pour éditer un projet
function editCompet(compet) {
    // Pré-remplir les champs du formulaire de modification avec les détails actuels du projet
    document.getElementById('editCompetName').value = compet;

    // Ouvrir la boîte de dialogue modale d'édition
    $('#editCompetModal').modal('show');

    // Ajouter un gestionnaire d'événement pour le bouton "Enregistrer" dans la boîte de dialogue modale
    document.getElementById('saveChangesBtn').onclick = function() {
        // Récupérer les nouvelles valeurs des champs du formulaire
        var newCompetName = document.getElementById('editCompetName').value;
        
        // Envoyer les nouvelles informations du projet à la page PHP pour traitement
        $.ajax({
            url: 'edit_Compet.php',
            type: 'POST',
            data: {
                competName:compet, // Utiliser projectName ici
                newCompetName:newCompetName,
            },
            success: function(response) {
                // Afficher un message de succès à l'utilisateur
                alert(response);
                updateCompetInList(compet, newCompetName);
                 // Cacher le modal de modification du collaborateur
            $('#editCompettModal').modal('hide');
            },
            
            error: function(xhr, status, error) {
                // En cas d'erreur, afficher un message d'erreur à l'utilisateur
                console.error(error);
                alert("Une erreur s'est produite lors de la modification du projet.");
            }
        });
    };
}

// Fonction pour mettre à jour le texte d'une compétence dans la liste
function updateCompetInList(oldCompet, newCompet) {
    // Trouver tous les éléments li correspondant au projet
    const competListItems = document.querySelectorAll(`#compet-list li`);
    
    competListItems.forEach(competListItem => {
        if (competListItem.textContent.includes(oldCompet)) {
            // Mettre à jour le texte de l'élément li avec le nouveau nom de compétence
            competListItem.textContent = newCompet;

            // Supprimer les anciennes icônes d'édition et de suppression
            const oldEditIcon = competListItem.querySelector('.edit-compet');
            const oldDeleteIcon = competListItem.querySelector('.delete-compet');
            if (oldEditIcon) {
                oldEditIcon.parentNode.removeChild(oldEditIcon);
            }
            if (oldDeleteIcon) {
                oldDeleteIcon.parentNode.removeChild(oldDeleteIcon);
            }

            // Ajouter l'icône d'édition
            var editIcon = document.createElement("span");
            editIcon.textContent = " \u270E";
            editIcon.className = "edit-compet";
            editIcon.onclick = function() {
                editCompet(newCompet); // Appeler la fonction d'édition avec le nouveau nom de compétence
            };
            competListItem.appendChild(editIcon);

            // Ajouter l'icône de suppression
            var deleteIcon = document.createElement("span");
            deleteIcon.textContent = " \u2716";
            deleteIcon.className = "delete-compet";
            deleteIcon.onclick = function() {
                deleteCompet(newCompet); // Appeler la fonction de suppression avec le nouveau nom de compétence
            };
            competListItem.appendChild(deleteIcon);
        }
    });

    // Mettre à jour d'autres parties de l'interface utilisateur si nécessaire
}


    </script>

   



<!-- Boîte de dialogue modale d'édition de projet -->
<div id="editCompetModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editCompetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCompetModalLabel">Modifier la compétence</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form >
                    <div class="form-group">
                        <label for="editCompetName">Compétence :</label>
                        <input type="text" class="form-control" id="editCompetName" >
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="saveChangesBtn">Enregistrer</button>
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
</body>
</html>
