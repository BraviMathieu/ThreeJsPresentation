<?php
use App\Session;
?>
<style>
  .bg-rouge{
    background-color: #6f2232 !important;
  }
</style>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-rouge">
  <a class="navbar-brand" href="#">Presentation ThreeJs</a>
  <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
  <!-- Navbar-->
  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="logout">Se déconnecter</a>
      </div>
    </li>
  </ul>
</nav>
<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Core</div>
          <a class="nav-link" id="new-preso-panel"><div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
            Nouvelle présentation</a>
          <a class="nav-link" id="new-panorama-panel"><div class="sb-nav-link-icon"><i id="view-toggle-icon" class="fas fa-th"></i></div>
            Panorama</a>
          <a class="nav-link" id="import-objet-panel"><div class="sb-nav-link-icon"><i class="fas fa-file-download"></i></div>
            Importer un objet 3D</a>
          <a class="nav-link" id="export-preso-panel"><div class="sb-nav-link-icon"><i class="fas fa-cloud"></i></div>
            Exporter la présentation</a>
          <a class="nav-link" id="open-presentations-panel"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
            Mes présentations</a>
            <a class="nav-link" id="open-mesObj-panel"><div class="sb-nav-link-icon"><i class="fas fa-save"></i></div>
                Mes objets 3D</a>
        <div class="sb-sidenav-menu-heading">Présentation</div>
          <a class="nav-link" id="save-presentation-panel" ><div class="sb-nav-link-icon"><i class="fas fa-save"></i></div>
            Sauvegarder</a>
        <div class="sb-sidenav-menu-heading">Mode nuit</div>
          <a class="nav-link" id="night-mode"><div class="sb-nav-link-icon"><i class="fas fa-sun"></i></div>
            Désactivé</a>
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
            <div class="btn-group mr-2">
              <button id="make-bold"      class="btn btn-secondary" title="Gras"><i class="fas fa-bold"></i></button>
              <button id="make-italic"    class="btn btn-secondary" title="Italique"><i class="fas fa-italic"></i></button>
              <button id="make-underline" class="btn btn-secondary" title="Souligné"><i class="fas fa-underline"></i></button>
            </div>
            <div class="btn-group mr-2">
              <button id="make-align-left"   class="btn btn-secondary" title="Aligner à gauche"><i class="fas fa-align-left"></i></button>
              <button id="make-align-center" class="btn btn-secondary" title="Centrer"><i class="fas fa-align-center"></i></button>
              <button id="make-align-right"  class="btn btn-secondary" title="Aligner à droite"><i class="fas fa-align-right"></i></button>
            </div>
            <div class="btn-group" role="group">
              <button class="btn btn-secondary dropdown-toggle" title="Choisir un texte" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Titre 1
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu" id="typetitre">
                <li><a data-dk-dropdown-value="slidelementh1"><h1>Titre 1</h1></a></li>
                <li><a data-dk-dropdown-value="slidelementh2"><h2>Titre 2</h2></a></li>
                <li><a data-dk-dropdown-value="slidelementh3"><h3>Titre 3</h3></a></li>
                <li><a data-dk-dropdown-value="P">Paragraphe</a></li>
              </div>
            </div>
            <div class="btn-group">
              <button id="colorpicker-btn" title="Choisir une couleur" class="btn btn-secondary"><i class="fas fa-tint"></i></button>
              <button id="add-text-btn"    title="Ajouter un texte" class="btn btn-secondary"><i class="fas fa-font"></i></button>
              <button id="change-font-btn" title="Changer la police d'écriture" class="btn btn-secondary"><i class="fas fa-heading"></i></button>
              <button id="add-image-btn"   title="Ajouter une image" class="btn btn-secondary"><i class="fas fa-images"></i></button>
              <button id="add-video-btn"   title="Ajouter une vidéo" class="btn btn-secondary"><i class="fas fa-video"></i></button>
              <button id="add-tableau-btn" title="Ajouter un tableau" class="btn btn-secondary"><i class="fas fa-table"></i></button>
              <button id="add-graphique-btn"title="Ajouter un graphique" class="btn btn-secondary"><i class="fas fa-chart-pie"></i></button>
              <button id="add-object-btn"  title="Ajouter une forme 3D" class="btn btn-secondary"><i class="fas fa-cube"></i></button>
                <button id="add-svg-btn"  title="Ajouter un svg" class="btn btn-secondary"><i class="fas fa-object-ungroup"></i></button>
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
          <span id="play" style="position: ">
              <span class="rotate label label-disabled btn btn-primary" id="spanrotate"><i class="fas fa-sync-alt"></i></span>
              <!--<span class="skewx label label-disabled btn btn-primary" id="spanskewx"><i class="fas fa-arrows-alt-h"></i></span>
              <span class="skewy label label-disabled btn btn-primary" id="spanskewy"><i class="fas fa-arrows-alt-v"></i></span>-->
           </span>
            <br>
           <span class="delete-icon label label-important btn btn-danger" id="spandelete"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Supprimer l'élément</span>
        </div>
      </div>
    </div>
    <div class="palette palette-clouds panorama-grey-area">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="transform-controls-holder" id="panorama-navbar">
            <h3 class="transform-label">Rotation Z</h3>
            <input class="knob" id="rotation-knob" data-width="50" data-min="-360" data-max="360" data-fgColor="#6f2232 " data-bgColor="#FFFFFF" data-linecap="round" data-displayPrevious="true" value="0">
            <h3 class="transform-label">Rotation X</h3>
            <input class="knob" id="skew-x-knob" data-width="50" data-min="-360" data-max="360" data-fgColor="#6f2232 " data-bgColor="#FFFFFF" data-linecap="round" data-displayPrevious="true" value="0">
            <h3 class="transform-label">Rotation Y</h3>
            <input class="knob" id="skew-y-knob" data-width="50" data-min="-360" data-max="360" data-fgColor="#6f2232 " data-bgColor="#FFFFFF" data-linecap="round" data-displayPrevious="true" value="0">
            <h3 class="transform-label">Échelle</h3>
            <input type="range" id="scale-range" class="ranges" min="1" max="6" value="1" />
            <h3 class="transform-label">Profondeur</h3>
            <input type="range" id="depth-range" class="ranges" min="-3000" max="5000" value="1" />
          </div>
        </div>
      </div>
      <div class="panorama-viewport"></div>
    </div>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2>Coller l'URL de l'image </h2>
          <input type="text" id="image-input" class="form-control">
        <p> La prévisualisation va apparaitre en dessous.</p>
        <img id="preview-image">
        <h2>Taille de l'image:</h2>
        <label for="image-width">Largeur de l'image (en px): </label>
        <input type="text" id="image-width" class="form-control">
        <label for="image-height">Hauteur de l'image (en px): </label>
        <input type="text" id="image-height" class="form-control">
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Coller l'URL de la vidéo </p>
        <input type="text" id="video-input" class="form-control">
        <p> La prévisualisation va apparaitre en dessous.</p>
        <div class="div-preview-video"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
            <button id="tableau-suppression-ligne" type="button" class="btn btn-outline-danger"><i class="fas fa-minus"></i>&nbsp;Derniere ligne</button>
            <button id="tableau-suppression-colonne" type="button" class="btn btn-outline-danger"><i class="fas fa-minus"></i>&nbsp;Derniere colonne</button>
          </div>
        </div>
        <div class="div-tableau-previsualisation my-2">
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <label for="preview-graphique-type">Type de graphique</label>
            <select class="form-control" name="preview-graphique-type" id="preview-graphique-type">
              <option value="bar">Diagramme en bâtons</option>
              <option value="pie">Diagramme circulaire</option>
              <option value="doughnut">Diagramme en anneau</option>
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12">
            <label for="preview-graphique-add-donnee-val">Valeur</label>
            <input type="number" class="form-control" id="preview-graphique-add-donnee-val" value="1">
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 text-center">
            <label for="preview-graphique-add-donnee-color">Couleur</label>
            <input id="preview-graphique-add-donnee-color" type="text" class="form-control" />
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <label for="preview-graphique-add-nom">Nom</label>
            <input id="preview-graphique-add-donnee-nom" type="text" class="form-control input-lg"/>
          </div>
        </div>

        <div class="row my-1 text-center">
          <div class="col-lg-6">
            <button id="preview-grahpique-add-donnee"class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Donnée</button>
          </div>
          <div class="col-lg-6">
            <button id="preview-grahpique-delete-donnee"class="btn btn-danger"><i class="fas fa-minus"></i>&nbsp;Dernière donnée</button>
          </div>
        </div>
        <div class="div-graphique-previsualisation">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" style="overflow:hidden; padding: 0 !important;">
        <div class="objet-thumbnail" data-nom="cube">
          <img src="public/images/Cube.PNG" style="width: 130px" >
        </div>
        <div class="objet-thumbnail" data-nom="cone">
          <img src="public/images/Cone.PNG" style="width: 130px" >
        </div>
        <div class="objet-thumbnail" data-nom="sphere">
          <img src="public/images/Sphere.PNG" style="width: 130px">
        </div>
        <div class="objet-thumbnail" data-nom="pyramid">
          <img src="public/images/Pyramid.PNG" style="width: 130px">
        </div>
        <div class="objet-thumbnail" data-nom="rectangle">
          <img src="public/images/Rectangle.PNG" style="width: 130px">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Importer un fichier .obj et .mtl </p>
        <input type="file" accept=".obj"  id="objinput">
        <input type="file" accept=".mtl"  id="mtlinput">
        <input type="file" accept=".jpg"  id="imginput" multiple>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="previewmessage"> Veuillez attendre pendant que nous générons la prévisualisation... </p>
        <div id="progressmeter" class="meter blue">
                <span style="width: 100%"><span>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Titre</p>
        <input type="text" id="title-input" class="form-control" value="Nouvelle présentation" maxlength="60">
        <p>Description</p>
        <textarea id="description-input" class="form-control">Exemple de description de présentation</textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button class="btn bg-primary text-white" id="create-presentation"> <i class="fas fa-save"></i>&nbsp;Sauvegarder</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="saved-presentations" style="overflow:scroll;">
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <select id="savedobjects">
            </select>
            <iframe id="previewobj"></iframe>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button class="btn btn-primary" id="append-myobject-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>La présentation est en train d'être téléchargée.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" style="overflow:hidden;">
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="pentagon">
          <svg class ="my-1" viewBox="0 0 200 200"  preserveAspectRatio="none" width="100" height="100">
            <polygon points="156.427384220077,186.832815729997 43.5726157799226,186.832815729997 8.69857443566525,79.5015528100076 100,13.1671842700025 191.301425564335,79.5015528100076" id="pentagon"></polygon>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="circle">
          <svg class ="my-1" preserveAspectRatio="none" viewBox="0 0 80 80" width="100" height="100" >
            <circle cx="40" cy="40" r="40" id="circle"></circle>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="rectangle">
          <svg class ="my-1" viewBox="0 0 50 50" preserveAspectRatio="none" width="100" height="100" id="rectangle">
            <rect width="50" height="50"></rect>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="triangle">
          <svg class ="my-1" viewBox="0 0 50 50" preserveAspectRatio="none" width="100" height="100"id="triangle">
            <polygon points="25,0 50,50 0,50"></polygon>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="hexagone">
          <svg class ="my-1" viewBox="0 0 726 726" preserveAspectRatio="none" width="100" height="100">
            <polygon points="723,314 543,625.769145 183,625.769145 3,314 183,2.230855 543,2.230855 723,314" id="hexagone"></polygon>
          </svg>
        </div>
        <div class="svg-thumbnail text-center" style="width: 200px" data-nom="etoile">
          <svg class ="my-1" viewBox="0 0 180 180" preserveAspectRatio="none" width="100" height="100" id="etoile" >
            <polygon points="90,0 30,170 180,50 0,50 150,170"></polygon>
          </svg>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button class="btn btn-primary" id="append-svg-btn"><i class="fas fa-plus"></i>&nbsp;Ajouter</button>
      </div>
    </div>
  </div>
</div>

<!-- Configuration Modal -->
<div class="modal fade" id="configuration-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%; left: -25%">
      <div class="modal-header">
        <h5 class="modal-title">Configuration</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
              <article>
                <h2>Couleur de l'éditeur</h2>
                <form><textarea id="codetest" name="codetest">
        function findSequence(goal) {
          function find(start, history) {
            if (start == goal)
              return history;
            else if (start > goal)
              return null;
            else
              return find(start + 5, "(" + history + " + 5)") ||
                     find(start * 3, "(" + history + " * 3)");
          }
          return find(1, "1");
        }</textarea></form>
        <br>
                <form action="presentation_creation" method="POST">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="select">Choisissez un thème:</label>
                      <select name="theme" class="form-control" onchange="selectTheme()" id="select">
                        <option value="default">default</option>
                        <option value="3024-day">3024-day</option>
                        <option value="3024-night">3024-night</option>
                        <option value="abcdef">abcdef</option>
                        <option value="ambiance">ambiance</option>
                        <option value="ayu-dark">ayu-dark</option>
                        <option value="ayu-mirage">ayu-mirage</option>
                        <option value="base16-dark">base16-dark</option>
                        <option value="base16-light">base16-light</option>
                        <option value="bespin">bespin</option>
                        <option value="blackboard">blackboard</option>
                        <option value="cobalt">cobalt</option>
                        <option value="colorforth">colorforth</option>
                        <option value="darcula">darcula</option>
                        <option value="dracula">dracula</option>
                        <option value="duotone-dark">duotone-dark</option>
                        <option value="duotone-light">duotone-light</option>
                        <option value="eclipse">eclipse</option>
                        <option value="elegant">elegant</option>
                        <option value="erlang-dark">erlang-dark</option>
                        <option value="gruvbox-dark">gruvbox-dark</option>
                        <option value="hopscotch">hopscotch</option>
                        <option value="icecoder">icecoder</option>
                        <option value="idea">idea</option>
                        <option value="isotope">isotope</option>
                        <option value="lesser-dark">lesser-dark</option>
                        <option value="liquibyte">liquibyte</option>
                        <option value="lucario">lucario</option>
                        <option value="material">material</option>
                        <option value="material-darker">material-darker</option>
                        <option value="material-palenight">material-palenight</option>
                        <option value="material-ocean">material-ocean</option>
                        <option value="mbo">mbo</option>
                        <option value="mdn-like">mdn-like</option>
                        <option value="midnight">midnight</option>
                        <option value="monokai">monokai</option>
                        <option value="moxer">moxer</option>
                        <option value="neat">neat</option>
                        <option value="neo">neo</option>
                        <option value="night">night</option>
                        <option value="nord">nord</option>
                        <option value="oceanic-next">oceanic-next</option>
                        <option value="panda-syntax">panda-syntax</option>
                        <option value="paraiso-dark">paraiso-dark</option>
                        <option value="paraiso-light">paraiso-light</option>
                        <option value="pastel-on-dark">pastel-on-dark</option>
                        <option value="railscasts">railscasts</option>
                        <option value="rubyblue">rubyblue</option>
                        <option value="seti">seti</option>
                        <option value="shadowfox">shadowfox</option>
                        <option value="solarized dark">solarized dark</option>
                        <option value="solarized light">solarized light</option>
                        <option value="the-matrix">the-matrix</option>
                        <option value="tomorrow-night-bright">tomorrow-night-bright</option>
                        <option value="tomorrow-night-eighties">tomorrow-night-eighties</option>
                        <option value="ttcn">ttcn</option>
                        <option value="twilight">twilight</option>
                        <option value="vibrant-ink">vibrant-ink</option>
                        <option value="xq-dark">xq-dark</option>
                        <option value="xq-light">xq-light</option>
                        <option value="yeti">yeti</option>
                        <option value="yonce">yonce</option>
                        <option value="zenburn">zenburn</option>
                      </select>
                    </div>
                  </div>
                  <div>ATTENTION : la modification de la configuration va rafraîchir la page. Veuillez sauvegarder votre
                  présentation avant d'enregistrer.</div>
                  <br>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Enregistrer" name="envoyer">
                  </div>
                </form>
              </article>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#typetitre li a").click(function(){
      let dropdown =  $("#dropdownMenu1:first-child");
      dropdown.text($(this).text());
      dropdown.val($(this).text());
    });
  });
</script>