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
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">