<?php
use App\Session;
?>
<style>
    .bg-rouge {background-color: #6f2232 !important;}
</style>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-rouge">
  <a class="navbar-brand" href="#">ThreeJS Présentation</a>
  <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
  <!-- Navbar-->
  <ul class="navbar-nav ms-auto me-1">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggl dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user fa-fw"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="logout">Se déconnecter</a></li>
        </ul>
    </li>
  </ul>
</nav>
<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Core</div>
          <a class="nav-link" id="new-preso-panel">
            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
            Nouvelle présentation</a>
          <a class="nav-link" id="new-panorama-panel">
            <div class="sb-nav-link-icon"><i id="view-toggle-icon" class="fas fa-panorama"></i></div>
            Panorama</a>
          <a class="nav-link" id="import-objet-panel">
            <div class="sb-nav-link-icon"><i class="fas fa-file-arrow-up"></i></div>
            Importer un objet 3D</a>
          <a class="nav-link" id="export-preso-panel">
            <div class="sb-nav-link-icon"><i class="fas fa-cloud-arrow-down"></i></div>
            Exporter la présentation</a>
          <a class="nav-link" id="open-presentations-panel">
            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
            Mes présentations</a>
          <a class="nav-link" id="open-mesObj-panel">
            <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
            Mes objets 3D</a>
          <div class="sb-sidenav-menu-heading">Présentation</div>
          <a class="nav-link" id="save-presentation-panel">
            <div class="sb-nav-link-icon"><i class="fas fa-floppy-disk"></i></div>
            Sauvegarder
          </a>
          <div class="sb-sidenav-menu-heading">Mode nuit</div>
          <a class="nav-link" id="night-mode">
            <div class="sb-nav-link-icon"><i class="fas fa-sun"></i></div>
            Désactivé
          </a>
        </div>
      </div>
      <div class="sb-sidenav-footer">
        <div class="small">Connecté en tant que :</div>
        <?= Session::read('User.name') ?>
      </div>
    </nav>
  </div>
  <div class="mainfooter-light palette-night" id="navSlide">
    <div class="slide-thumb-holdercontainer">
      <div class="slide-thumb-holder"></div>
      <a class="btn btn-large bg-primary text-white" href="#" id="add-slide-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter une slide</a>
    </div>
  </div>
</div>
<div class="masked-container">
  <div class="main-viewport" id="visualisation">
    <div class="palette palette-clouds main-grey-area">
      <div class="row m-1">
        <div class="col-lg-12 text-center">
          <div role="toolbar">
            <div class="btn-group mr-2 mb-1">
              <button id="make-bold" class="btn btn-secondary" title="Gras" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-bold"></i></button>
              <button id="make-italic" class="btn btn-secondary" title="Italique" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-italic"></i></button>
              <button id="make-underline" class="btn btn-secondary" title="Souligné" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-underline"></i></button>
            </div>
            <div class="btn-group mr-2 mb-1">
              <button id="make-align-left" class="btn btn-secondary" title="Aligner à gauche" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-align-left"></i></button>
              <button id="make-align-center" class="btn btn-secondary" title="Centrer" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-align-center"></i></button>
              <button id="make-align-right" class="btn btn-secondary" title="Aligner à droite" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-align-right"></i></button>
            </div>

            <div class="btn-group mb-1" role="group">
              <button class="btn btn-secondary dropdown-toggle" title="Choisir un texte" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                      data-bs-toggle="tooltip" data-placement="bottom">
                  Titre 1
              </button>
              <ul id="typetitre" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a data-dk-dropdown-value="slidelementh1"><h1>Titre 1</h1></a></li>
                  <li><a data-dk-dropdown-value="slidelementh2"><h2>Titre 2</h2></a></li>
                  <li><a data-dk-dropdown-value="slidelementh3"><h3>Titre 3</h3></a></li>
                  <li><a data-dk-dropdown-value="P">Paragraphe</a></li>
              </ul>
            </div>
            <div class="btn-group mb-1">
              <button id="colorpicker-btn" title="Choisir une couleur" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-palette"></i></button>
              <button id="add-text-btn" title="Ajouter un texte" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-header"></i></button>
              <button id="change-font-btn" title="Changer la police d'écriture" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-font"></i></button>
              <button id="add-image-btn" title="Ajouter une image" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-images"></i></button>
              <button id="add-video-btn" title="Ajouter une vidéo" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-video"></i></button>
              <button id="add-tableau-btn" title="Ajouter un tableau" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-table"></i></button>
              <button id="add-graphique-btn" title="Ajouter un graphique" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-chart-pie"></i></button>
              <button id="add-object-btn" title="Ajouter une forme 3D" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-cube"></i></button>
              <button id="add-svg-btn" title="Ajouter un svg" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="bottom"><i class="fas fa-shapes"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- main footer shows slide thumbnails-->
      <div class="presentation-meta">
        <p id="presentation-metatitle" class="titre-presentation my-0 mx-auto text-white text-center" style="text-transform:none; font-size:160%;">
        </p>
      </div>
      <div class="slide-viewport-container">
        <div class="slide-viewport">
          <div class="impress-slide-container"></div>
        </div>
      </div>
    </div>
    <div class="palette palette-clouds panorama-grey-area">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="transform-controls-holder d-flex justify-content-around" id="panorama-navbar">
            <div class="d-flex flex-column">
              <label for="rotation-x">Rotation X</label>
              <input type="range" class="" id="rotation-x" value="0" min="0" max="180">
            </div>
            <div class="d-flex flex-column">
              <label for="rotation-y">Rotation Y</label>
              <input type="range" class="" id="rotation-y" value="0" min="0" max="180">
            </div>

            <div class="d-flex flex-column">
              <label for="scale">Échelle</label>
              <input type="range" class="" id="scale" value="1">
            </div>

            <div class="d-flex flex-column">
              <label for="depth">Profondeur</label>
              <input type="range" class="" id="depth" value="1" min="-3000" max="5000">
            </div>

          </div>
        </div>
      </div>
      <div class="panorama-viewport"></div>
    </div>
  </div>
</div>
<div class="placeholder"></div>

<!-- Ajouter Image Modal -->
<div class="modal fade" id="image-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter une image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="image-input">Coller l'URL de l'image </label>
            <input type="text" id="image-input" class="form-control">
        </div>
        <p> La prévisualisation va apparaitre en dessous.</p>
        <img id="preview-image" alt="" src="">
        <div class="mb-3">
            <label for="image-width">Largeur de l'image (en px): </label>
            <input type="text" id="image-width" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image-height">Hauteur de l'image (en px): </label>
            <input type="text" id="image-height" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn btn-primary" id="append-image-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter l'image</button>
      </div>
    </div>
  </div>
</div>

<!-- Ajouter Video Modal -->
<div class="modal fade" id="video-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter une vidéo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
              <label for="video-input">Coller l'URL de la vidéo</label>
              <input type="text" id="video-input" class="form-control">
          </div>

        <p> La prévisualisation va apparaitre en dessous.</p>
        <div class="div-preview-video"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn btn-primary text-white" id="append-video-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter la vidéo</button>
      </div>
    </div>
  </div>
</div>

<!-- Ajouter tableau Modal -->
<div class="modal fade" id="tableau-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter un tableau</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 text-center">
            <button id="tableau-ajout-ligne" type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i>&nbsp;Une ligne</button>
            <button id="tableau-ajout-colonne" type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i>&nbsp;Une colonne</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12 text-center">
            <button id="tableau-suppression-ligne" type="button" class="btn btn-outline-danger"><i class="fas fa-minus"></i>&nbsp;Derniere ligne
            </button>
            <button id="tableau-suppression-colonne" type="button" class="btn btn-outline-danger"><i class="fas fa-minus"></i>&nbsp;Derniere colonne
            </button>
          </div>
        </div>
        <div class="div-tableau-previsualisation my-2">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn btn-primary text-white" id="append-tableau-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter le tableau</button>
      </div>
    </div>
  </div>
</div>

<!-- Ajouter graphique Modal -->
<div class="modal fade" id="graphique-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter un graphique</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
              <div class="mb-3">
                <label for="preview-graphique-type">Type de graphique</label>
                <select class="form-select" name="preview-graphique-type" id="preview-graphique-type">
                  <option value="bar">Diagramme en bâtons</option>
                  <option value="pie">Diagramme circulaire</option>
                  <option value="doughnut">Diagramme en anneau</option>
                </select>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
              <div class="mb-3">
                <label for="preview-graphique-add-donnee-val">Valeur</label>
                <input type="number" class="form-control" id="preview-graphique-add-donnee-val" value="1">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
              <div class="mb-3">
                <label for="preview-graphique-add-donnee-color">Couleur</label>
                <input id="preview-graphique-add-donnee-color" type="text" class="form-control"/>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
              <div class="mb-3">
                <label for="preview-graphique-add-donnee-nom">Nom</label>
                <input id="preview-graphique-add-donnee-nom" type="text" class="form-control input-lg"/>
              </div>
          </div>
        </div>

        <div class="row my-1 text-center">
          <div class="col-lg-6">
            <button id="preview-grahpique-add-donnee" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Donnée</button>
          </div>
          <div class="col-lg-6">
            <button id="preview-grahpique-delete-donnee" class="btn btn-danger"><i class="fas fa-minus"></i>&nbsp;Dernière donnée</button>
          </div>
        </div>
        <div class="div-graphique-previsualisation">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn btn-primary text-white" id="append-graphique-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter le graphique</button>
      </div>
    </div>
  </div>
</div>

<!-- Selectionner Objet 3D Modal -->
<div class="modal fade" id="objet-selection-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sélectionner un objet 3D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-center" style="overflow:hidden; padding: 0 !important;">
        <div class="objet-thumbnail" data-nom="cube">
          <img src="public/images/Cube.PNG" style="width: 130px">
        </div>
        <div class="objet-thumbnail" data-nom="cone">
          <img src="public/images/Cone.PNG" style="width: 130px" alt="">
        </div>
        <div class="objet-thumbnail" data-nom="sphere">
          <img src="public/images/Sphere.PNG" style="width: 130px" alt="">
        </div>
        <div class="objet-thumbnail" data-nom="pyramid">
          <img src="public/images/Pyramid.PNG" style="width: 130px" alt="">
        </div>
        <div class="objet-thumbnail" data-nom="rectangle">
          <img src="public/images/Rectangle.PNG" style="width: 130px" alt="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn btn-primary" id="append-object-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter</button>
      </div>
    </div>
  </div>
</div>

<!-- Importer Objet 3D Modal -->
<div class="modal fade" id="import-objet-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter un objet 3D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>Pour importer votre propre objet 3D, vous devez téléverser les fichiers suivants :</p>
        <ul>
          <li>Un fichier <b>.obj</b> pour le modèle 3D</li>
          <li>Un fichier <b>.mtl</b> pour lier l'objet 3D à la texture</li>
          <li>Au moins un fichier <b>.jpg</b> pour la texture (vous pouvez en choisir plusieurs)</li>
        </ul>
        <div class="mb-3">
          <label for="objinput">Importer un fichier .obj</label>
          <input id="objinput" class="form-control-file" type="file" accept=".obj" >
        </div>

        <div class="mb-3">
          <label for="mtlinput">Importer un fichier .mtl</label>
          <input id="mtlinput" class="form-control-file" type="file" accept=".mtl" >
        </div>

        <div class="mb-3">
          <label for="imginput">Importer un fichier .jpg</label>
          <input id="imginput" class="form-control-file" type="file" accept=".jpg"  multiple>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn btn-primary" id="import-objet-3d">&nbsp;Ajouter</button>
      </div>
    </div>
  </div>
</div>


<!-- Prévisualisation Modal -->
<div class="modal fade" id="preview-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Génération de la prévisualisation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p id="previewmessage"> Veuillez attendre pendant que nous générons la prévisualisation... </p>
        <div id="progressmeter" class="meter blue">
                <span style="width: 100%"><span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn disabled" id="open-preview-btn"> Ouvrir la prévisualisation</button>
      </div>
    </div>
  </div>
</div>

<!-- Nouvelle présentation Modal -->
<div class="modal fade" id="new-presentation-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="new-preso-header">Nouvelle présentation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="title-input">Titre</label>
            <input type="text" id="title-input" class="form-control" value="Nouvelle présentation" maxlength="60">
        </div>
        <div class="mb-3">
            <label for="description-input">Description</label>
            <textarea id="description-input" class="form-control">Exemple de description de présentation</textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn bg-primary text-white" id="create-presentation"><i class="fas fa-save"></i>&nbsp;Sauvegarder</button>
      </div>
    </div>
  </div>
</div>

<!-- Mes présentations Modal -->
<div class="modal fade" id="saved-presentations-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mes présentations</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body" id="saved-presentations" style="overflow-y:auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!-- Mes objets 3D Modal -->
<div class="modal fade" id="saved-objects-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mes objets 3D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <select id="savedobjects" class="form-select mb-3"></select>
        <iframe id="previewobj" class="w-100 border-0"></iframe>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button class="btn btn-primary" id="append-myobject-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Exporter Code Modal -->
<div class="modal fade" id="export-code-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Exporter la présentation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>La présentation est en train d'être téléchargée.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!-- Selectionner une police Modal -->
<div class="modal fade" id="police-selection-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sélectionner une police</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-center" id="styleselections" style="overflow:hidden;">
        <div class="style-thumbnail" data-style="lato" style="width: 100px">
          <h3 class="styleh3 style1">Lato</h3>
        </div>
        <div class="style-thumbnail" data-style="sketch" style="width: 130px">
          <h3 class="styleh3 style1 sketch">Sketch</h3>
        </div>
        <div class="style-thumbnail" data-style="montserrat" style="width: 200px">
          <h3 class="styleh3 style1 montserrat">Montserrat</h3>
        </div>
        <div class="style-thumbnail" data-style="quicksand" style="width: 200px">
          <h3 class="styleh3 style1 quicksand">Quicksand</h3>
        </div>
        <div class="style-thumbnail" data-style="miltonian" style="width: 200px">
          <h3 class="styleh3 style1 miltonian">Miltonian</h3>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn btn-primary" id="apply-style-btn">&nbsp;Appliquer</button>
      </div>
    </div>
  </div>
</div>

<!-- Selectionner Svg Modal -->
<div class="modal fade" id="svg-selection-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sélectionner un svg</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-center" style="overflow:hidden;">
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="pentagon">
          <svg class="my-1" viewBox="0 0 200 200" preserveAspectRatio="none" width="100" height="100">
            <polygon
              points="156.427384220077,186.832815729997 43.5726157799226,186.832815729997 8.69857443566525,79.5015528100076 100,13.1671842700025 191.301425564335,79.5015528100076"
              id="pentagon"></polygon>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="circle">
          <svg class="my-1" preserveAspectRatio="none" viewBox="0 0 80 80" width="100" height="100">
            <circle cx="40" cy="40" r="40" id="circle"></circle>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="rectangle">
          <svg class="my-1" viewBox="0 0 50 50" preserveAspectRatio="none" width="100" height="100" id="rectangle">
            <rect width="50" height="50"></rect>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="triangle">
          <svg class="my-1" viewBox="0 0 50 50" preserveAspectRatio="none" width="100" height="100" id="triangle">
            <polygon points="25,0 50,50 0,50"></polygon>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="hexagone">
          <svg class="my-1" viewBox="0 0 726 726" preserveAspectRatio="none" width="100" height="100">
            <polygon points="723,314 543,625.769145 183,625.769145 3,314 183,2.230855 543,2.230855 723,314" id="hexagone"></polygon>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="etoile">
          <svg class="my-1" viewBox="0 0 180 180" preserveAspectRatio="none" width="100" height="100" id="etoile">
            <polygon points="90,0 30,170 180,50 0,50 150,170"></polygon>
          </svg>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button class="btn btn-primary" id="append-svg-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('#typetitre li a').forEach(function(element){
    element.addEventListener('click', function(){
      let dropdown = document.querySelector('#dropdownMenuButton1:first-child');
      dropdown.innerHTML = element.textContent;
      dropdown.value = element.textContent;
    })
  })
</script>