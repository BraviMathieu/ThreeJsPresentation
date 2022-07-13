<?php
use App\Session;
use App\Alert;
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ThreeJS Présentation - Création de présentation</title>
    <link rel="icon" href="./favicon.ico"/>

    <!-- Bootstrap -->
    <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="public/lib/pace/css/pace.css" rel="stylesheet">
    <link href="public/css/presentation/custom.css" rel="stylesheet">
    <link href="public/css/styles.css" rel="stylesheet">

    <!--ColorPicker-->
    <link href="public/lib/pickr/nano.min.css" rel="stylesheet">

    <!-- Webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Miltonian' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch' rel='stylesheet'>
  </head>
  <body class="sb-nav-fixed" style="overflow: hidden">
    <div id="layoutSidenav_content">
      <main>
        <?= $content; ?>

        <!--  JS -->
        <script src="public/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="public/lib/bootstrap_toast/bootstrap_toast.js"></script>

        <script src="public/lib/font-awesome/js/all.min.js"></script>
        <script src="//daybrush.com/moveable/release/latest/dist/moveable.min.js"></script>
        <script src="public/lib/sortable/sortable.min.js"></script>

        <script src="public/js/presentation/startup.js"></script>
        <script src="public/js/presentation/main.js"></script>
        <script src="public/js/presentation/component_template.js"></script>

        <script src="public/lib/pace/js/pace.min.js"></script>
        <script src="public/lib/chartjs/Chart.min.js"></script>
        <script src="public/lib/pickr/pickr.min.js"></script>

        <script>
          const user_id_ajax = "<?=Session::read('User.id')?>";
          const night_mode = "<?=$night_mode?>";
          const obj3dUrl = "<?=$_SERVER['HTTP_HOST'] . "/ThreeJS_Presentation/"?>";

          // Init tooltips
          let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
          let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
          });
        </script>
      </main>
    </div>
  <?= Alert::display(); ?>
  </body>
</html>