<?php
use App\Session;
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Création de présentation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="public/lib/pace/css/pace.css" rel="stylesheet">
    <link href="public/lib/toastr/css/toastr.min.css" rel="stylesheet">
    <link href="public/css/presentation/custom.css" rel="stylesheet">
    <link href="public/css/styles.css" rel="stylesheet">
    <link href="public/lib/spectrum/css/spectrum.css" rel="stylesheet">

    <!-- Webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Miltonian' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch' rel='stylesheet' type='text/css'>

    <!-- Jquery -->
    <script src="public/lib/jquery/jquery.min.js"></script>
  </head>
  <body class="sb-nav-fixed" style="overflow: hidden">
    <div id="layoutSidenav_content">
      <main>

      <?= $content; ?>

        <!--  JS -->
        <script src="public/lib/jquery-ui/js/jquery-ui.min.js"></script>
        <script src="public/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="public/lib/font-awesome/js/all.min.js"></script>

        <script src="public/lib/spectrum/js/spectrum.js"></script>
        <script src="public/lib/toastr/js/toastr.min.js"></script>
        <script src="public/lib/pace/js/pace.min.js"></script>
        <script src="public/lib/chartjs/Chart.min.js"></script>
        <script src="public/js/presentation/startup.js"></script>
        <script src="public/js/presentation/main.js"></script>
        <script src="public/js/presentation/knob.js"></script>
        <script src="public/js/presentation/transform2d.js"></script>
        <script src="public/js/presentation/keymaster.js"></script>
        <script src="public/js/presentation/templates/newpresotemplate.js"></script>

        <script src="public/lib/jszip/jszip.min.js"></script>
        <script>
          const user_id_ajax = "<?=Session::read('User.id')?>";
          const night_mode = "<?=$night_mode?>";
          const obj3dUrl = "<?=$_SERVER['HTTP_HOST']."/ThreeJS_Presentation/"?>";
          $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip({delay:50})
          });
        </script>
      </main>
    </div>
  </body>
</html>