<div id="impressionistviewport">
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
                    <a class="dropdown-item" href="main_configuration">Configuration</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout">Se déconnecter</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" id="newpresopanel"><div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                          Nouvelle présentation</a>
                      <a class="nav-link" id="newstylepanel" ><div class="sb-nav-link-icon"><i class="fas fa-pencil-alt"></i></div>
                        Selectionner une police</a>
                      <a class="nav-link" id="neworchestratepanel" ><div class="sb-nav-link-icon"><i class="fas fa-th"></i></div>
                        Panorama</a>
                      <a class="nav-link" id="exportpresopanel"><div class="sb-nav-link-icon"><i class="fas fa-cloud"></i></div>
                        Exporter présentation</a>
                      <a class="nav-link" id="openpresentationsbtn"><div class="sb-nav-link-icon"><i class="fas fa-save"></i></div>
                        Mes Présentations</a>

                      <div class="sb-sidenav-menu-heading">Présentation</div>

                      <a class="nav-link" id="exportcontentbtn" ><div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                        Voir</a>
                      <a class="nav-link" id="savepresentationbtn" ><div class="sb-nav-link-icon"><i class="fas fa-save"></i></div>
                        Sauvegarder</a>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Connecté en tant que :</div>
                    <?= Session::read('User.name') ?>
                </div>
            </nav>
        </div>

    <div class ="mainfooter palette-night">
        <div class = "slidethumbholdercontainer">
            <div class = "slidethumbholder">

            </div>
            <a class="btn btn-large bg-rouge text-white" href="#" id="addslidebtn"><i class="fas fa-plus"></i>&nbsp;Ajouter une slide</a>
        </div>
    </div>
</div>


    <div class="maskedcontainer">

    <div class="mainviewport">
    <div class="palette palette-clouds maingreyarea">

      <div class="row" style="margin:5px;">
        <div class="col-lg-12 text-center">
            <div role="toolbar" aria-label="Toolbar avec des buttons">
              <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" id="makebold" class="btn btn-secondary"><i class="fas fa-bold"></i></button>
                <button type="button" id="makeitalic" class="btn btn-secondary"><i class="fas fa-italic"></i></button>
                <button type="button" id="makeunderline" class="btn btn-secondary"><i class="fas fa-underline"></i></button>
              </div>
              <div class="btn-group mr-2" role="group" aria-label="Deuxieme groupe">
                <button type="button" id="makealignleft" class="btn btn-secondary"><i class="fas fa-align-left"></i></button>
                <button type="button" id="makealigncenter" class="btn btn-secondary"><i class="fas fa-align-center"></i></button>
                <button type="button" id="makealignright" class="btn btn-secondary"><i class="fas fa-align-right"></i></button>
              </div>
              <div class="btn-group" role="group" aria-label="Troisieme groupe">

                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Titre 1
                  <span class="caret"></span>
                </button>
                <div class="dropdown-menu" id="typetitre" aria-labelledby="btnGroupDrop1">
                  <li><a data-dk-dropdown-value="slidelementh1">Titre 1</a></li>
                  <li><a data-dk-dropdown-value="slidelementh2">Titre 2</a></li>
                  <li><a data-dk-dropdown-value="slidelementh3">Titre 3</a></li>
                  <li><a data-dk-dropdown-value="P">Paragraphe</a></li>
                </div>
              </div>
              <div class="btn-group" role="group" aria-label="Quatrieme groupe">
                <button type="button" id="colorpickerbtn" data-toggle="modal" data-target="#colorpickerModal" class="btn btn-secondary"><i class="fas fa-tint"></i></button>
                <button type="button" id="addtextbtn" class="btn btn-secondary"><i class="fas fa-font"></i></button>
                <button type="button" id="addimagebtn" class="btn btn-secondary"><i class="fas fa-images"></i></button>
                <button type="button" id="addobjectbtn" class="btn btn-secondary"><i class="fas fa-cube"></i></button>
              </div>
            </div>
        </div>
      </div>
      <!-- main footer shows slide thumbnails-->

              <div class="slideviewportcontainer">
                <div class="slideviewport">
                  <div class="impress-slide-container">

                  </div>
                  <span id="play">
                      <span class="rotate label label-disabled" id="spanrotate"><i class="fas fa-sync-alt"></i></span>
                      <!--<span class="scale label label-important"><i class="icon-resize-horizontal"></i></span>-->
                      <span class="skewx label label-disabled" id="spanskewx"><i class="fas fa-arrows-alt-h"></i></span>
                      <span class="skewy label label-disabled" id="spanskewy"><i class="fas fa-arrows-alt-v"></i></span>
                      <span class="deleteicon label label-important" id="spandelete"><i class="fas fa-trash-alt"></i></span>

             <!-- <span class="move">move</span>-->
                 </span>
              </div>
        </div>
    </div>
    <div class="palette palette-clouds orchgreyarea">
       <div class="transformcontrolsholder">
          <h3 class="transformlabel">Rotation Z</h3>
          <input class="knob" id="rotationknob" data-width="40" data-min="-360" data-max="360" data-fgColor="#1ABC9C" data-bgColor="#FFFFFF" data-linecap="round" data-displayPrevious="true" value="0">
          <h3 class="transformlabel">Rotation X</h3>
          <input class="knob" id="skewxknob" data-width="40" data-min="-360" data-max="360" data-fgColor="#1ABC9C" data-bgColor="#FFFFFF" data-linecap="round" data-displayPrevious="true" value="0">
          <h3 class="transformlabel">Rotation Y</h3>
          <input class="knob" id="skewyknob" data-width="40" data-min="-360" data-max="360" data-fgColor="#1ABC9C" data-bgColor="#FFFFFF" data-linecap="round" data-displayPrevious="true" value="0">
          <h3 class="transformlabel">Scale</h3>
          <input type="range" id="scalerange" class="ranges" min="1" max="6" value="1" />
          <h3 class="transformlabel">Depth</h3>
          <input type="range" id="depthrange" class="ranges" min="-3000" max="5000" value="1" />
     </div>
      <div class="orchestrationviewport">

      </div>
    </div>
  </div>
</div>

    
</div>
<div class="placeholder"></div>
</div>

    <!-- Ajouter Image Modal -->
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter une image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Coller l'URL de l'image </p>
            <input type="text" id="imageinput" class="image-input">
            <p> La prévisualisation va apparaitre en dessous.</p>
            <img id="previewimg">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn bg-rouge text-white" id="createpresentation">&nbsp;Sauvegarder</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Prévisualisation Modal -->
    <div class="modal fade" id="previewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Génération de la prévisualisation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn disabled" id="openpreviewbtn"> Ouvrir la prévisualisation</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Nouvelle présentation Modal -->
    <div class="modal fade" id="newpresentationmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nouvelle présentation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Titre</p>
            <input type="text" id="titreinput" class="image-input" value="Nouvelle présentation">
            <p>Description</p>
            <textarea id="descriptioninput" class="descriptioninput"> Exemple de description de présentation </textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary" id="createpresentation"> <i class="icon-plus"></i>&nbsp;Sauvegarder</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Mes présentations Modal -->
    <div class="modal fade" id="savedpresentationsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mes Présentations</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="savedpresentations" style="overflow:scroll;">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Exporter Code Modal -->
    <div class="modal fade" id="exportcodemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Exporter le code</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="exportcode">
            <pre style="height:300px; overflow:scroll;">
                <code class="html" id="exportedcode" >
                </code>
            </pre>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Selectionner une police Modal -->
    <div class="modal fade" id="styleselectionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Selectionner une police</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="styleselections" style="overflow:scroll;">
            <div class="stylethumbnail" data-style="lato" style="width: 100px">
              <h3 class="styleh3 style1">Lato</h3>
            </div>
            <div class="stylethumbnail" data-style="sketch" style="width: 130px">
              <h3 class="styleh3 style1 sketch">Sketch</h3>
            </div>
            <div class="stylethumbnail" data-style="montserrat" style="width: 200px">
              <h3 class="styleh3 style1 montserrat">Montserrat</h3>
            </div>
            <div class="stylethumbnail" data-style="quicksand" style="width: 200px">
              <h3 class="styleh3 style1 quicksand">Quicksand</h3>
            </div>
            <div class="stylethumbnail" data-style="miltonian" style="width: 200px">
              <h3 class="styleh3 style1 miltonian">Miltonian</h3>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary" id="applystylebtn">&nbsp;Appliquer</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="colorpickerModal" tabindex="-1" role="dialog"
         aria-labelledby="colorpickerModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Choisir une couleur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input id="cp15" type="text" class="form-control input-lg" value="hex(#FFFFFF)"/>
          </div>
        </div>
      </div>
    </div>

    <!-- Selectionner un objet Modal -->
    <div class="modal fade" id="objectselectionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selectionner un objet 3D</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="styleselections" style="overflow:scroll;">
                    <div class="objectthumbnail"  style="width: 130px">
                    <img src="lib/presentation/images/Cube.PNG" style="width: 130px">
                    </div>
                    <div class="objectthumbnail"  style="width: 130px">
                        <img  src="lib/presentation/images/Cone.PNG" style="width: 130px">
                    </div>
                    <div class="objectthumbnail"  style="width: 130px">
                        <img  src="lib/presentation/images/Sphere.PNG" style="width: 130px">
                    </div>
                    <div class="objectthumbnail"  style="width: 130px">
                        <img  src="lib/presentation/images/Pyramid.PNG" style="width: 130px">
                    </div>
                    <div class="objectthumbnail"  style="width: 130px">
                        <img  src="lib/presentation/images/Rectangle.PNG" style="width: 130px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn bg-rouge text-white" id="applyobjectbtn"><i class="fas fa-plus"></i>&nbsp;Ajouter</button>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $(function(){

            $("#typetitre li a").click(function(){
                $("#dropdownMenu1:first-child").text($(this).text());
                $("#dropdownMenu1:first-child").val($(this).text());
            });
        });
    });
</script>