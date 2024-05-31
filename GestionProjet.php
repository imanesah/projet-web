<?php
// Inclure le fichier de connexion à la base de données
require_once 'connecterBase.php';

require_once 'collabfct.php';
require_once 'edit_project.php';
require_once 'date.php';

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
       

       
        

        .project-list li {
            cursor: pointer;
            padding: 10px;
            transition: background-color 0.3s ease; /* Transition fluide */
        }

        .project-list li:hover {
            background-color: #f0f0f0; /* Couleur d'arrière-plan au survol */
        }

        .project-list .delete-project {
            color: red;
            cursor: pointer;
            margin-left: 5px;
        }

        .project-list .delete-project:hover {
            color: darkred; /* Couleur de la croix au survol */
        }

        .project-details-title {
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
            height:250px;
            padding: 20px;
            border-radius: 10px; /* Coins arrondis */
            margin-top: 50px;
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
        .project-list {
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

.list-group-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.project-info {
    flex-grow: 1;
}

.project-name {
    font-weight: bold;
}

.status {
    font-style: italic;
}

.start-date, .end-date {
    font-style: italic;
}

.delete-project {
    cursor: pointer;
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

    <div class="container-fluid" >
        <div class="row mt-5" >
            <div class="col-md-6" s>
                <h2>Liste des Projets</h2>
                <input type="text" id="search-project-input" class="form-control mb-3" placeholder="Rechercher un projet..." oninput="filterProjects()">
                <ul id="project-list" class="list-group project-list">
                    <!-- Projets seront ajoutés dynamiquement ici -->
                    <?php
                    // Requête pour sélectionner tous les noms et états de projets
                    $sql = "SELECT NomProjet, Statut,dateDebut,dateFin FROM projet";

                    // Exécuter la requête
                    $resultat = mysqli_query($connexion, $sql);

                    // Vérifier s'il y a des résultats
                    if (mysqli_num_rows($resultat) > 0) {
                        // Parcourir les résultats et afficher chaque nom de projet avec l'état et les boutons
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            // Déterminer la couleur en fonction de l'état du projet
                            $statusColor = $row["Statut"] === "terminé" ? "text-success" : "text-primary";
                            // Afficher le nom de projet avec l'état et les boutons
                            echo '<li class="list-group-item" onclick="hideActivity(); showProjectDetails(\'' . $row["NomProjet"] . '\')">
                            <div class="project-info"> 
                                <span class="project-name">' . $row["NomProjet"] . '</span> <br>
                                Statut:<span class="status ' . $statusColor . '"> ' . $row["Statut"] . '</span> <br>
                                <span class="project-dates"> Dates:
                                    <span class="start-date">' . $row["dateDebut"] . '</span> 
                                    - 
                                    <span class="end-date">' . $row["dateFin"] . '</span>
                                </span>
                            </div>
                            <span class="delete-project" onclick="deleteProject(\'' . $row["NomProjet"] . '\')">&#x2716;</span>
                        </li>';
                    
                    
                    
                                //    <span class="edit-project" onclick="editProject(\'' . $row["NomProjet"] . '\')">&#9998;</span>
                     }
                    } else {
                        // Si aucun projet n'est trouvé dans la base de données
                        echo "<li class='list-group-item'>Aucun projet trouvé</li>";
                    }
                    ?>

                </ul>
                <div class="input-group mt-3">
                <!-- <input type="text" id="project-name" class="form-control" placeholder="Nom du Projet" onkeydown="addProject(event)">-->
                    <div class="input-group-append">
                  <!-- Bouton pour ouvrir la modal -->
<button class="btn btn-primary" type="button" onclick="showAddProjectModal()">Ajouter Projet</button>


                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="collaborators">
                    <!-- Détails du projet et collaborateurs seront affichés dynamiquement ici -->
                </div>
                <div class="activity">
                    <h2>Activité récente (24h)</h2>
                    <p>Projets édités : <span id="edited-projects"></span></p>
                    <p>Projets ajoutés : <span id="added-projects"></span></p>
                    <p>Projets supprimés : <span id="deleted-projects"></span></p>
                  <!-- <p>Collaborateurs édités : <span id="edited-collaborators"></span></p>-->
                    <!--<p>Collaborateurs supprimés : <span id="deleted-collaborators"></span></p>
                    <p>Collaborateurs ajoutés : <span id="added-collaborators"></span></p>/-->
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <h3>Noms des Projets édités récemment.</h3>
            <p id="project-names" style="overflow-y: auto; max-height: 150px;"></p>
        </div>

        <!-- Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProjectModalLabel">Ajouter le Projet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="projectName">Nom du Projet :</label>
            <input type="text" class="form-control" id="projectName">
          </div>
            <div class="form-group">
            <label for="startDate">Date de Début :</label>
            <input type="date" class="form-control" id="start-date-input">
         </div>
        <div class="form-group">
            <label for="endDate">Date de Fin :</label>
            <input type="date" class="form-control" id="end-date-input">
        </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" onclick="addProjectToList();">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- Ajoutez ce bouton à l'intérieur de votre body -->
    <button onclick="showActivity()" id="showActivityButton" style="position: fixed; top: 20px; right: 20px; display: none;">Montrer activité</button>

    <!-- jQuery (obligatoire pour Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS (optionnel) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function showAddProjectModal() {
  $('#addProjectModal').modal('show');
}

function hideAddProjectModal() {
  $('#addProjectModal').modal('hide');
}
        // Durée de validité des activités récentes en millisecondes (par exemple, 24 heures)
        const activityValidityDuration = 24 * 60 * 60 * 1000; // 24 heures en millisecondes

        // Date et heure actuelles
        const currentTime = new Date().getTime();

        // Vérifier si les activités récentes ont expiré
        if (localStorage.getItem('activityExpiration') === null || currentTime > parseInt(localStorage.getItem('activityExpiration'))) {
            // Réinitialiser les compteurs et définir la nouvelle date d'expiration
            localStorage.setItem('editedProjectsCount', 0);
            localStorage.setItem('addedProjectsCount', 0);
           // localStorage.setItem('editedCollaboratorsCount', 0);
            localStorage.setItem('deletedCollaboratorsCount', 0);
            localStorage.setItem('addedCollaboratorsCount', 0);
            localStorage.setItem('deletedProjectsCount', 0);
            const newExpirationTime = currentTime + activityValidityDuration;
            localStorage.setItem('activityExpiration', newExpirationTime);
        }

        // Variables pour suivre le nombre de projets édités et ajoutés
        let editedProjectsCount = parseInt(localStorage.getItem('editedProjectsCount')) || 0;
        let addedProjectsCount = parseInt(localStorage.getItem('addedProjectsCount')) || 0;
        let deletedProjectsCount = parseInt(localStorage.getItem('deletedProjectsCount')) || 0;
        // Variables pour suivre le nombre de collaborateurs édités, supprimés et ajoutés
      //  let editedCollaboratorsCount = parseInt(localStorage.getItem('editedCollaboratorsCount')) || 0;
        let deletedCollaboratorsCount = parseInt(localStorage.getItem('deletedCollaboratorsCount')) || 0;
        let addedCollaboratorsCount = parseInt(localStorage.getItem('addedCollaboratorsCount')) || 0;

        // Fonction pour mettre à jour les statistiques des projets
        function updateProjectStatistics() {
            document.getElementById("edited-projects").textContent = editedProjectsCount;
            document.getElementById("added-projects").textContent = addedProjectsCount;
            document.getElementById("deleted-projects").textContent = deletedProjectsCount;
            localStorage.setItem('editedProjectsCount', editedProjectsCount);
            localStorage.setItem('addedProjectsCount', addedProjectsCount);
            localStorage.setItem('deletedProjectsCount', deletedProjectsCount);
        }

        // Fonction pour mettre à jour les statistiques des collaborateurs
        function updateCollaboratorStatistics() {
           // document.getElementById("edited-collaborators").textContent = editedCollaboratorsCount;
            document.getElementById("deleted-collaborators").textContent = deletedCollaboratorsCount;
            document.getElementById("added-collaborators").textContent = addedCollaboratorsCount;
          //  localStorage.setItem('editedCollaboratorsCount', editedCollaboratorsCount);
            localStorage.setItem('deletedCollaboratorsCount', deletedCollaboratorsCount);
            localStorage.setItem('addedCollaboratorsCount', addedCollaboratorsCount);
        }

      // Mise à jour des statistiques dès le chargement de la page
        updateProjectStatistics();
        updateCollaboratorStatistics();
    // Liste des projets édités
        let editedProjects = [];
        // Fonction pour marquer un projet comme édité et afficher la liste des projets édités
    function markProjectAsEdited(projectName) {
        if (!editedProjects.includes(projectName)) {
            editedProjects.push(projectName);
            editedProjectsCount++;
            updateProjectStatistics();
            
            // Mettre à jour l'affichage de la liste des projets édités en passant le nom du projet comme argument
            updateRecentlyEditedProjectsList(projectName);
        }
    }

    

 // Fonction pour mettre à jour le timestamp d'activité
 function updateActivityTimestamp() {
    const currentTime = new Date().getTime();
    localStorage.setItem('activityTimestamp', currentTime);
}
// Fonction pour calculer le temps écoulé depuis la dernière modification
function calculateTimeElapsed(currentTime) {
    const activityTimestamp = localStorage.getItem('activityTimestamp');
    
    if (!activityTimestamp) {
        
        return "inconnu"; // Si aucun timestamp n'est enregistré, renvoyer "inconnu"
    }

    const lastActivityTime = parseInt(activityTimestamp);
    const timeDifference = currentTime - lastActivityTime;

    // Calculer le temps écoulé en minutes
    const minutesElapsed = Math.floor(timeDifference / (1000 * 60));

    // Retourner le temps écoulé en fonction des minutes écoulées
    if (minutesElapsed === 0) {
        return "moins d'une minute";
    } else if (minutesElapsed === 1) {
        return "1 minute";
    } else {
        return `${minutesElapsed} minutes`;
    }
}

// Fonction pour mettre à jour l'affichage des noms des projets édités récemment
function updateRecentlyEditedProjectsList(projectName) {
    const projectNamesElement = document.getElementById("project-names");

    // Mettre à jour le timestamp d'activité
    updateActivityTimestamp();

    // Créer un élément de paragraphe pour afficher le nom du projet et le temps écoulé
    const projectElement = document.createElement("p");
    const currentTime = new Date().getTime();
    const timeElapsedElement = document.createElement("span");
    timeElapsedElement.className = "time-elapsed"; // Ajouter la classe "time-elapsed"
    projectElement.textContent = `${projectName} - `;
    projectElement.appendChild(timeElapsedElement);

    // Fonction pour mettre à jour le texte du temps écoulé
    function updateTimeElapsed() {
        const currentTime = new Date().getTime();
        const timeElapsed = calculateTimeElapsed(currentTime); // Calcul du temps écoulé
        timeElapsedElement.textContent = `il y a ${timeElapsed}`; // Mettre à jour le texte du temps écoulé
    }

    // Appeler updateTimeElapsed immédiatement pour afficher le temps écoulé actuel
    updateTimeElapsed();

    // Mettre à jour le temps écoulé chaque minute
    setInterval(updateTimeElapsed, 60000);

    // Ajouter l'élément de projet à la liste
    projectNamesElement.appendChild(projectElement);
}



function showActivity() {
    const modal = $('#activityModal');

    // Mettre à jour les compteurs dans le modal
    const editedProjectsCount = localStorage.getItem('editedProjectsCount') || 0;
    const addedProjectsCount = localStorage.getItem('addedProjectsCount') || 0;
    const deletedProjectsCount = localStorage.getItem('deletedProjectsCount') || 0;
   // const editedCollaboratorsCount = localStorage.getItem('editedCollaboratorsCount') || 0;
    const deletedCollaboratorsCount = localStorage.getItem('deletedCollaboratorsCount') || 0;
    const addedCollaboratorsCount = localStorage.getItem('addedCollaboratorsCount') || 0;

    modal.find('#edited-projects').text(editedProjectsCount);
    modal.find('#added-projects').text(addedProjectsCount);
    modal.find('#deleted-projects').text(deletedProjectsCount);
  //  modal.find('#edited-collaborators').text(editedCollaboratorsCount);
    modal.find('#deleted-collaborators').text(deletedCollaboratorsCount);
    modal.find('#added-collaborators').text(addedCollaboratorsCount);

    // Afficher le modal
    modal.modal('show');
}



    // Fonction pour cacher la div activity
    function hideActivity() {
        const activityDiv = document.querySelector('.activity');
        activityDiv.style.display = 'none';
        // Afficher le bouton pour montrer l'activité une fois que la div activity est cachée
        document.getElementById('showActivityButton').style.display = 'block';
    }


        function filterProjects() {
            var input = document.getElementById("search-project-input").value.toUpperCase();
            var projects = document.getElementById("project-list").getElementsByTagName("li");
            for (var i = 0; i < projects.length; i++) {
                var project = projects[i];
                var txtValue = project.textContent || project.innerText;
                if (txtValue.toUpperCase().indexOf(input) > -1) {
                    project.style.display = "";
                } else {
                    project.style.display = "none";
                }
            }
        }

        function addProject(event) {
            if (event.keyCode === 13) { // Key code for "Enter" key
                addProjectToList();
            }
        }

        function addProjectOnClick() {
            addProjectToList();
        }
// JavaScript pour ajouter un projet à la liste des projets
function addProjectToList() {
    var projectName = document.getElementById("projectName").value.trim(); // Utilisez "projectName" au lieu de "project-name"
    //var startDate = document.getElementById("startDate").value.trim(); // Utilisez "startDate" au lieu de "project-start-date"
    //var endDate = document.getElementById("endDate").value.trim(); // Utilisez "endDate" au lieu de "project-end-date"

    if (projectName !== "") {
        // Vérifier si le projet existe déjà dans la base de données
        checkProjectExistence(projectName);
    }
}


// Fonction pour vérifier si le projet existe déjà dans la base de données
function checkProjectExistence(projectName) {
    // Effectuer une requête AJAX pour vérifier si le projet existe déjà
    $.ajax({
        type: 'POST',
        url: 'check_project.php',
        data: { projectName: projectName },
        success: function(response) {
            // Vérifier la réponse du serveur
            if (response === "exists") {
                // Le projet existe déjà, afficher un message à l'utilisateur
                alert("Le projet existe déjà dans la base de données.");
            } else {
                // Le projet n'existe pas, ajouter le projet à la liste des projets
                
                addProjectToListUI(projectName);

            }
        },
        error: function(xhr, status, error) {
            // Gérer les erreurs ici
            console.error(error);
        }
    });
}
function addProjectToListUI(projectName) {
    // Récupérer les dates de début et de fin à partir des champs de saisie HTML
    var startDate = document.getElementById("start-date-input").value;
    var endDate = document.getElementById("end-date-input").value;

    var projectList = document.getElementById("project-list");
    var newProject = document.createElement("li");
    newProject.className = "list-group-item";
    
    // Créer un div pour contenir les informations du projet
    var projectInfoDiv = document.createElement("div");
    projectInfoDiv.className = "project-info";
    
    // Ajouter le nom du projet
    var projectNameSpan = document.createElement("span");
    projectNameSpan.className = "project-name";
    projectNameSpan.textContent = projectName;
    projectInfoDiv.appendChild(projectNameSpan);
  
    // Date actuelle
var currentDate = new Date();
var endDateInput = new Date(endDate);

// Vérifier si la date de fin est passée
if (endDateInput < currentDate) {
    // Si la date de fin est passée, le projet est terminé
    var projectStatus = "Terminé";
} else {
    // Sinon, le projet est en cours
    var projectStatus = "En cours";
}

// Ajouter "En cours" ou "Terminé" avec la classe pour la couleur
var statusTextSpan = document.createElement("span");
statusTextSpan.innerHTML = "<br>"; // Ajouter un saut de ligne
statusTextSpan.classList.add(projectStatus === "En cours" ? "text-primary" : "text-success");
projectInfoDiv.appendChild(statusTextSpan);

// Ajouter une classe pour refléter l'état du projet
statusTextSpan = document.createElement("span");
statusTextSpan.textContent = projectStatus;
statusTextSpan.classList.add(projectStatus === "En cours" ? "text-primary" : "text-success");
projectInfoDiv.appendChild(statusTextSpan);




    // Ajouter les dates du projet
    var datesSpan = document.createElement("span");
    datesSpan.className = "project-dates";
    datesSpan.innerHTML = "<br>Dates: ";
    var startDateSpan = document.createElement("span");
    startDateSpan.className = "start-date";
    startDateSpan.textContent = startDate;
    datesSpan.appendChild(startDateSpan);
    datesSpan.appendChild(document.createTextNode(" - "));
    var endDateSpan = document.createElement("span");
    endDateSpan.className = "end-date";
    endDateSpan.textContent = endDate;
    datesSpan.appendChild(endDateSpan);
    projectInfoDiv.appendChild(datesSpan);

    
    // Ajouter le div contenant les informations du projet au projet lui-même
    newProject.appendChild(projectInfoDiv);
    
    // Ajouter l'icône de suppression
    var deleteIcon = document.createElement("span");
    deleteIcon.textContent = " \u2716";
    deleteIcon.className = "delete-project";
    deleteIcon.onclick = function() {
        deleteProject(projectName);
    };
    newProject.appendChild(deleteIcon);
    
    // Ajouter un gestionnaire d'événement pour afficher les détails du projet au clic
    newProject.onclick = function() {
        showProjectDetails(projectName);
    };
    
    // Ajouter l'élément li à la liste des projets
    projectList.appendChild(newProject);
    
    // Marquer le projet comme édité (vous devez implémenter cette fonction)
    markProjectAsEdited(projectName);
    
    // Mise à jour des statistiques (vous devez implémenter cette fonction)
    addedProjectsCount++;
    updateProjectStatistics();
    hideAddProjectModal()
    // Envoyer le nom et l'état du projet à PHP pour l'ajouter à la base de données (via AJAX par exemple)
    addProjectToDatabase(projectName,startDate,endDate);
}



function addProjectToDatabase(projectName, startDate, endDate) {
    $.ajax({
        url: 'add_project.php', // Chemin vers le script PHP
        type: 'POST', // Méthode de requête
        data: { 
            projectName: projectName, // Nom du projet
            startDate: startDate,     // Date de début du projet
            endDate: endDate          // Date de fin du projet
        },
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
function deleteProject(projectName) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce projet?")) {
        // Envoyer une demande de suppression au serveur
        deleteProjectFromDatabase(projectName);
    }
}

// JavaScript pour envoyer le nom du projet à PHP pour le supprimer de la base de données (via AJAX)
function deleteProjectFromDatabase(projectName) {
    $.ajax({
        url: 'delete_project.php', // Chemin vers le script PHP
        type: 'POST', // Méthode de requête
        data: { projectName: projectName }, // Données à envoyer (nom du projet)
        success: function(response) { // Fonction appelée en cas de succès
            // Manipuler la réponse si nécessaire
            console.log(response);
               // Afficher la réponse dans une alerte
               alert(response);
            // Si la suppression s'est bien déroulée, supprimer le projet de la liste
            if (response === "success") {
                removeProjectFromList(projectName);
            }
        },
        error: function(xhr, status, error) { // Fonction appelée en cas d'erreur
            console.error(error);
        }
    });
}
// Fonction pour supprimer le projet de la liste des projets dans l'interface utilisateur
function removeProjectFromList(projectName) {
    // Trouver tous les éléments li correspondant au projet
    const projectListItems = document.querySelectorAll(`#project-list li`);
    projectListItems.forEach(projectListItem => {
        if (projectListItem.textContent.includes(projectName)) {
            // Supprimer l'élément li de la liste project-list
            projectListItem.parentNode.removeChild(projectListItem);

            // Mettre à jour le compteur des projets supprimés
            deletedProjectsCount++;
            updateProjectStatistics();
            
            // Marquer le projet comme édité
            markProjectAsEdited(projectName);
            
            // Vérifier si le projet supprimé est celui dont les détails sont affichés
            const displayedProjectTitle = document.querySelector('.project-details-title');
            if (displayedProjectTitle && displayedProjectTitle.textContent.includes(projectName)) {
                // Cacher la div des détails du projet et des collaborateurs
             //   console.log(projectName);
                hideProjectDetails(projectName);
            }
        }
    });
}

// Fonction pour cacher la div des détails du projet et des collaborateurs
function hideProjectDetails(projectName) {
    const projectDetailsDiv = document.querySelector('.collaborators');
    const projectTitleDiv = projectDetailsDiv.querySelector('.project-details-title');
    if (projectTitleDiv.textContent.includes(projectName)) {
        console.log(projectName)
        projectDetailsDiv.style.display = 'none'; // Masquer la div
       // projectDetailsDiv.innerHTML = ''; // Effacer le contenu de la div

    }
}







        function filterCollaborators() {
            var input = document.getElementById("search-collaborator-input").value.toUpperCase();
            var collaborators = document.querySelectorAll(".collaborator");
            collaborators.forEach(collaborator => {
                var name = collaborator.querySelector("span:first-child").textContent.toUpperCase();
                if (name.indexOf(input) > -1) {
                    collaborator.style.display = "";
                } else {
                    collaborator.style.display = "none";
                }
            });
        }

        function showProjectDetails(projectName) {
    // Appel AJAX pour récupérer les détails des collaborateurs
    const projectDetailsDiv = document.querySelector('.collaborators');
    // Pour rendre la div visible
    projectDetailsDiv.style.display = 'block'; // ou 'inline-block' selon le besoin

    $.ajax({
        url: 'collabfct.php',
        type: 'POST', // Utilisation de la méthode POST
        data: { projectName: projectName }, // Données envoyées au serveur
        success: function(data) {
             // Convertir la chaîne JSON en objet JavaScript
        data = JSON.parse(data);
        console.log(data); 
        console.log(typeof data);
            // Une fois les données récupérées, les afficher dans la div des collaborateurs
            const projectDetailsDiv = document.querySelector(".collaborators");
            projectDetailsDiv.innerHTML = `
                <h4 class="project-details-title mb-3">Détails du Projet: ${projectName}</h4>
                <!-- Barre de recherche de collaborateurs -->
                <input type="text" id="search-collaborator-input" class="form-control mb-3" placeholder="Rechercher un collaborateur..." oninput="filterCollaborators()">
                <!-- Liste des collaborateurs avec défilement -->
                <div class="collaborator-list" style="max-height: 200px; overflow-y: auto;">
                    <!-- Liste de collaborateurs sera ajoutée dynamiquement ici -->
                </div>`;

            // Sélectionner la liste des collaborateurs dans la div des collaborateurs
            const collaboratorListDiv = projectDetailsDiv.querySelector(".collaborator-list");

            if (data && data.length > 0) {
                data.forEach(collaborator => {
                    const collaboratorElement = document.createElement('div');
                    collaboratorElement.classList.add('collaborator');
                    collaboratorElement.innerHTML = `
                        <span>Nom: ${collaborator.UserName}</span><br>
                        <span>Email: ${collaborator.EmailCollaborateur}</span><br>
                        <span>Rôle: ${collaborator.NomRole}</span>
                      
                    `;
                    //  <span class="collaborator-actions" onclick="deleteCollaborator('${projectName}', ${collaborator.idCollaborateur})">&times;</span>
                    collaboratorListDiv.appendChild(collaboratorElement);
                });
            } else {
                collaboratorListDiv.innerHTML += `<p>Aucun collaborateur associé à ce projet.</p>`;
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            // En cas d'erreur, afficher un message approprié dans la div des collaborateurs
            const collaboratorListDiv = document.querySelector(".collaborator-list");
            collaboratorListDiv.innerHTML = `<p>Une erreur s'est produite lors de la récupération des collaborateurs.</p>`;
        }
    });
}




function deleteCollaborator(projectName, collaboratorId) {
    // Envoyer les données via AJAX à un fichier PHP pour suppression
    $.ajax({
        url: 'supprimer_collaborateur.php',
        type: 'POST',
        data: {
            projectName: projectName,
            collaboratorId: collaboratorId
        },
        
       
        success: function(response) {
            alert("Collaborateur supprimé avec succès !");
            // Rafraîchir les détails du projet affichés avec les nouvelles données
            showProjectDetails(projectName);

            // Marquer le projet comme édité
            markProjectAsEdited(projectName);

            // Mise à jour des statistiques
            deletedCollaboratorsCount++;
            updateCollaboratorStatistics();
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert("Une erreur s'est produite lors de la suppression du collaborateur.");
        }
    });
console.log(projectName);
console.log(collaboratorId);
}


        function editCollaborator(projectName, collaboratorId) {
            // Récupérer les informations du collaborateur
            const collaborator = projectCollaborators[projectName].find(collab => collab.id === collaboratorId);

            // Remplir le formulaire du modal avec les informations du collaborateur
            document.getElementById("edit-collaborator-id").value = collaborator.id;
            document.getElementById("edit-collaborator-first-name").value = collaborator.firstName;
            document.getElementById("edit-collaborator-last-name").value = collaborator.lastName;
            document.getElementById("edit-collaborator-role").value = collaborator.role;

            // Afficher le modal pour modifier le collaborateur
            $('#editCollaboratorModal').modal('show');
        }

        function saveCollaboratorChanges() {
            const projectId = document.querySelector(".project-details-title").textContent.split(":")[1].trim();
            const collaboratorId = parseInt(document.getElementById("edit-collaborator-id").value);
            const firstName = document.getElementById("edit-collaborator-first-name").value.trim();
            const lastName = document.getElementById("edit-collaborator-last-name").value.trim();
            const role = document.getElementById("edit-collaborator-role").value.trim();

            // Mettre à jour les informations du collaborateur
            const collaborators = projectCollaborators[projectId];
            const updatedCollaborators = collaborators.map(collaborator => {
                if (collaborator.id === collaboratorId) {
                    collaborator.firstName = firstName;
                    collaborator.lastName = lastName;
                    collaborator.role = role;
                }
                return collaborator;
            });
            projectCollaborators[projectId] = updatedCollaborators;

            // Rafraîchir les détails du projet affichés
            showProjectDetails(projectId);

            // Cacher le modal de modification du collaborateur
            $('#editCollaboratorModal').modal('hide');
            // Marquer le projet comme édité
            markProjectAsEdited(projectId);

            // Mise à jour des statistiques
            editedCollaboratorsCount++;
            updateCollaboratorStatistics();
        }

        function addCollaborator() {
    // Récupérer les données du formulaire
    const selectedOption = document.getElementById("collaborator-select").querySelector("option:checked");
    const collaboratorEmail = selectedOption.value;
    const collaboratorRole = document.getElementById("collaborator-role").value.trim();
   // Récupérer le texte brut à l'intérieur de l'élément .project-details-title
    const projectDetailsTitle = document.querySelector(".project-details-title").innerText;

     // Extraire le nom du projet en supprimant la partie "Détails du Projet: " de la chaîne
     const projectName = projectDetailsTitle.replace("Détails du Projet: ", "").trim();

    const collaboratorId = selectedOption.getAttribute("data-idCollaborateur");

    // Créer un objet contenant les données à envoyer
    const formData = {
        email: collaboratorEmail,
        role: collaboratorRole,
        projectName: projectName,
        collaboratorId: collaboratorId
    };
    console.log(formData);
    // Envoyer les données via AJAX à un fichier PHP pour traitement
    $.ajax({
        url: 'ajouter_collaborateur.php',
        type: 'POST',
        data: formData,
        success: function(response) {
            alert("Collaborateur ajouté avec succès !");
            
            // Rafraîchir les détails du projet affichés avec les nouvelles données
            showProjectDetails(projectName);

           
            // Marquer le projet comme édité
            markProjectAsEdited(projectName);

            // Mise à jour des statistiques
            addedCollaboratorsCount++;
            updateCollaboratorStatistics();
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert("Une erreur s'est produite lors de l'ajout du collaborateur.");
        }

    });
     // Cacher le modal d'ajout de collaborateur
            $('#addCollaboratorModal').modal('hide');

}



    function updateEmail() {
    const select = document.getElementById("collaborator-select");
    const selectedEmail = select.options[select.selectedIndex].value;
    document.getElementById("collaborator-email").value = selectedEmail;

}
// Fonction pour éditer un projet
function editProject(projectName, projectStatus) {
    // Pré-remplir les champs du formulaire de modification avec les détails actuels du projet
    document.getElementById('editProjectName').value = projectName;
    document.getElementById('editProjectStatus').value = projectStatus;

    // Ouvrir la boîte de dialogue modale d'édition
    $('#editProjectModal').modal('show');

    // Ajouter un gestionnaire d'événement pour le bouton "Enregistrer" dans la boîte de dialogue modale
    document.getElementById('saveChangesBtn').onclick = function() {
        // Récupérer les nouvelles valeurs des champs du formulaire
        var newProjectName = document.getElementById('editProjectName').value;
        var newProjectStatus = document.getElementById('editProjectStatus').value;

        // Envoyer les nouvelles informations du projet à la page PHP pour traitement
        $.ajax({
            url: 'edit_project.php',
            type: 'POST',
            data: {
                projectName: projectName, // Utiliser projectName ici
                newProjectName: newProjectName,
                newProjectStatus: newProjectStatus
            },
            success: function(response) {
                // Afficher un message de succès à l'utilisateur
                alert(response);
                // Actualiser la liste des projets ou effectuer d'autres actions après la modification
                // Rafraîchir les détails du projet affichés avec les nouvelles données
                showProjectDetails(newProjectName);
                // Marquer le projet comme édité
                markProjectAsEdited(newProjectName);
                // Mise à jour des statistiques
                updateProjectStatistics();
                 // Cacher le modal de modification du collaborateur
            $('#editProjectModal').modal('hide');
            },
            error: function(xhr, status, error) {
                // En cas d'erreur, afficher un message d'erreur à l'utilisateur
                console.error(error);
                alert("Une erreur s'est produite lors de la modification du projet.");
            }
        });
    };
}



    </script>

    <!-- Modal pour ajouter un collaborateur -->
  
<div class="modal fade" id="addCollaboratorModal" tabindex="-1" role="dialog" aria-labelledby="addCollaboratorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCollaboratorModalLabel">Ajouter un Collaborateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="collaborator-name">Nom complet:</label>
                    <?php
                    // Inclure le fichier de connexion à la base de données
                    require_once 'connecterBase.php';

                    // Requête SQL pour récupérer les noms des collaborateurs
                    $sql = "SELECT UserName, EmailCollaborateur,idCollaborateur FROM collaborateur";
                    $resultat = mysqli_query($connexion, $sql);

                    // Vérifier si la requête a renvoyé des résultats
                    if (mysqli_num_rows($resultat) > 0) {
                        echo '<select id="collaborator-select" class="form-control" onchange="updateEmail()">';
                        echo '<option value="" data-idCollaborateur="">Sélectionner un collaborateur</option>';
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            echo '<option value="' . $row['EmailCollaborateur'] . '" data-idCollaborateur="' . $row['idCollaborateur'] . '">' . $row['UserName'] . '</option>';

                        }
                        
                        echo '</select>';
                    } else {
                        echo '<p>Aucun collaborateur trouvé.</p>';
                    }
                    
                    ?>
                </div>
                <div class="form-group">
                    <label for="collaborator-email">Email:</label>
                    <input type="text" class="form-control" id="collaborator-email" required readonly>
                </div>
                <div class="form-group">
                    <label for="collaborator-role">Rôle:</label>
                    <input type="text" class="form-control" id="collaborator-role" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" onclick="addCollaborator()">Valider</button>
            </div>
        </div>
    </div>
</div>


    <!-- Modal pour modifier un collaborateur -->
    <div class="modal fade" id="editCollaboratorModal" tabindex="-1" role="dialog" aria-labelledby="editCollaboratorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCollaboratorModalLabel">Modifier un Collaborateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-collaborator-id">
                    <div class="form-group">
                        <label for="edit-collaborator-first-name">Prénom:</label>
                        <input type="text" class="form-control" id="edit-collaborator-first-name">
                    </div>
                    <div class="form-group">
                        <label for="edit-collaborator-last-name">Nom:</label>
                        <input type="text" class="form-control" id="edit-collaborator-last-name">
                    </div>
                    <div class="form-group">
                        <label for="edit-collaborator-role">Rôle:</label>
                        <input type="text" class="form-control" id="edit-collaborator-role">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="saveCollaboratorChanges()">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>

   <!-- Modal pour activity -->
<div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activityModalLabel">Activité récente(24h)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="activity">
                    <p>Projets édités : <span id="edited-projects"></span></p>
                    <p>Projets ajoutés : <span id="added-projects"></span></p>
                    <p>Projets supprimés : <span id="deleted-projects"></span></p>
                <!--    <p>Collaborateurs édités : <span id="edited-collaborators"></span></p>-->
                    <p>Collaborateurs supprimés : <span id="deleted-collaborators"></span></p>
                    <p>Collaborateurs ajoutés : <span id="added-collaborators"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Boîte de dialogue modale d'édition de projet -->
<div id="editProjectModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProjectModalLabel">Modifier le projet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="editProjectName">Nom du projet :</label>
                        <input type="text" class="form-control" id="editProjectName" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editProjectStatus">État du projet :</label>
                        <select class="form-control" id="editProjectStatus">
                            <option value="en cours">En cours</option>
                            <option value="terminé">Terminé</option>
                        </select>
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