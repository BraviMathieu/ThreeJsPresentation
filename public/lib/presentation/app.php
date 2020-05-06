<div id="impressionistviewport">
<?php
use App\Session;
?>
<style>
    .bg-vert{
        background-color: #6f2232 !important;
    }
</style>

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-vert">
        <a class="navbar-brand" href="#">Presentation ThreeJs</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
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
                        <a class="nav-link" href="/public/main_dashboard"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard</a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePrésentations" aria-expanded="false" aria-controls="collapsePrésentations"
                        ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Présentations
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                        <div class="collapse" id="collapsePrésentations" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="/public/presentation_creation"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    Création</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapsePrésentations" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="/public/presentation_creation_new"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    Création new</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseObjets" aria-expanded="false" aria-controls="collapseObjets"
                        ><div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                            Objets 3D
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                        <div class="collapse" id="collapseObjets" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="/public/objet3d_creation"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    Création</a>
                            </nav>
                        </div>

                        <a class="nav-link" href="/public/main_configuration"><div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                            Configuration</a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                        ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Static Navigation</a></nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                        ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                >Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                </div>
                            </nav>
                        </div>
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
            <a class="btn btn-primary btn-large" href="#" id="addslidebtn"><i class="fas fa-plus"></i>&nbsp;Ajouter une slide</a>
        </div>
    </div>
</div>








    <div class="maskedcontainer">

        <div class="mainviewport">
            <div class="palette palette-clouds maingreyarea">
                <!-- main footer shows slide thumbnails-->



                <!-- *************************-->
                <div class="btn-toolbar dockedtoolbar" >
                    <div class="btn-group" style="margin:0 auto">
                        <a class="btn btn-info menubtn" href="#" id="makebold"><i class="fas fa-bold"></i></a>
                        <a class="btn btn-info menubtn" href="#" id="makeitalic"><i class="fas fa-italic"></i></a>
                        <a class="btn btn-info menubtn" href="#" id="makeunderline"><i class="fas fa-underline"></i></a>
                        <a class="btn btn-info menubtn toolbarblockleft" href="#" id="makealignleft"><i class="fas fa-align-left"></i></a>
                        <a class="btn btn-info menubtn" href="#"><i class="fas fa-align-center"></i></a>
                        <a class="btn btn-info menubtn" href="#"><i class="fas fa-align-right"></i></a>
                        <div class="dk_container dk_container_custom span3 dk_shown dk_theme_info dropdownlist" id="dk_container_herolist" tabindex="1"><a class="dk_toggle dk_toggle_custom toolbarblockboth">
                                <span class="dk_label pulldownmenu">Titre 1</span>
                                <span class="select-icon select-icon-custom"></span></a>
                            <div class="dk_options dropdownpopup" style="top: 38px;">
                                <ul class="dk_options_inner">
                                    <li class=""><a class="dropdownitem" data-dk-dropdown-value="slidelementh1">Titre 1</a></li>
                                    <li class=""><a class="dropdownitem" data-dk-dropdown-value="slidelementh2">Titre 2</a></li>
                                    <li class=""><a class="dropdownitem" data-dk-dropdown-value="slidelementh3">Titre 3</a></li>
                                    <li class=""><a class="dropdownitem" data-dk-dropdown-value="P">Paragraphe</a></li>
                                    <li class=""><a class="dropdownitem" data-dk-dropdown-value="Pre">Pre</a></li>
                                </ul></div></div>
                        <a id="colorpickerbtn" class="btn btn-info" href="#"  data-toggle="modal" data-target="#colorpickerModal"><i class="fas fa-tint"></i></a>
                        <a class="btn btn-info toolbarblockleft" id="addtextbtn"  href="#"><i class="fas fa-font"></i></a>
                        <a class="btn btn-info" id="addimagebtn" href="#"><i class="fas fa-images"></i></i></a>
                        <a class="btn btn-info" id="addobject"    href="#"><i class="fas fa-cube"></i></a>

                        <!-- <a class="btn btn-primary toolbarblockboth" href="#"><i class="fui-eye-16"></i>&nbsp;Preview</a>
                         <a class="btn btn-warning" href="#"><i class="icon-ok-sign"></i>&nbsp;Save</a>-->

                    </div>
                </div>
                <div class="presentationmeta"><p id="presentationmetatitle" style="margin:0 auto; text-transform:none; font-size:130%; color:white"> </p> <a href="#" style="position:absolute; right:5px; top:3px" id="editpresonamebtn" class="btn btn-small btn-inline btn-primary"><i class="fas fa-edit"></i></a></div>
                <!--<a href="#" id="dude" class="btn btn-large btn-danger" data-trigger="click" data-toggle="popover" title="" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="A Title">Click to toggle popover</a>-->
                <!--<a href="#" class="btn" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover on top">Popover on top</a>-->
                <div class="slideviewportcontainer">
                    <div class="slideviewport">
                        <div class="impress-slide-container">

                        </div>
                        <span id="play">
                    <span class="rotate label label-disabled" id="spanrotate"><i class="fas fa-sync-alt"></i></span>
                            <!--<span class="scale label label-important"><i class="icon-resize-horizontal"></i></span>-->
                    <span class="skewx label label-disabled" id="spanskewx"><i class="fas fa-arrows-alt-h"></i></span>
                    <span class="skewy label label-disabled" id="spanskewy"><i class="fas fa-arrows-alt-v"></i></span>
                    <span class="deleteicon label label-important" id="spandelete"><i class="fui-cross-16"></i></span>

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
                <p> La prévisualisation va apparaitreen dessous.</p>
                <img id="previewimg">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" id="createpresentation"> <i class="icon-plus"></i>&nbsp;Sauvegarder</button>
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
                <button type="button" class="btn disabled" id="openpreviewbtn"> Ouvrir la prévisualisatio</button>
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

