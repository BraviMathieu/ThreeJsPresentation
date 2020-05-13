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
      <link href="../../public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- CSS -->
      <link href="../../public/js/toastr/toastr.min.css" rel="stylesheet">
      <link href="../../public/lib/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
      <link href="../../public/css/presentation/freetrans.css" rel="stylesheet">
      <link href="../../public/lib/codemirror/codemirror.css" rel="stylesheet">
      <link href="../../public/css/presentation/matrices.css" rel="stylesheet">
      <link href="../../public/css/presentation/custom.css" rel="stylesheet">
      <link href="../../public/css/styles.css" rel="stylesheet">
      <link href="../../public/lib/pace/css/pace.css" rel="stylesheet">

      <!-- Webfonts -->
      <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Miltonian' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch' rel='stylesheet' type='text/css'>

      <link rel="stylesheet" href="http://yandex.st/highlightjs/7.3/styles/default.min.css">

      <!-- Editeur -->
      <link rel="stylesheet" href="../../public/lib/codemirror/codemirror.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/3024-day.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/3024-night.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/abcdef.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/ambiance.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/ayu-dark.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/ayu-mirage.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/base16-dark.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/bespin.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/base16-light.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/blackboard.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/cobalt.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/colorforth.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/dracula.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/duotone-dark.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/duotone-light.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/eclipse.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/elegant.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/erlang-dark.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/gruvbox-dark.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/hopscotch.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/icecoder.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/isotope.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/lesser-dark.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/liquibyte.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/lucario.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/material.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/material-darker.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/material-palenight.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/material-ocean.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/mbo.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/mdn-like.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/midnight.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/monokai.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/moxer.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/neat.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/neo.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/night.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/nord.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/oceanic-next.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/panda-syntax.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/paraiso-dark.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/paraiso-light.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/pastel-on-dark.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/railscasts.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/rubyblue.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/seti.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/shadowfox.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/solarized.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/the-matrix.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/tomorrow-night-bright.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/tomorrow-night-eighties.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/ttcn.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/twilight.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/vibrant-ink.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/xq-dark.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/xq-light.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/yeti.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/idea.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/darcula.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/yonce.css">
      <link rel="stylesheet" href="../../public/lib/codemirror/theme/zenburn.css">

      <script src="../../public/lib/codemirror/codemirror.js"></script>
      <script src="../../public/lib/codemirror/mode/javascript/javascript.js"></script>
      <script src="../../public/lib/codemirror/addon/selection/active-line.js"></script>
      <script src="../../public/lib/codemirror/addon/edit/matchbrackets.js"></script>

      <!-- Jquery -->
      <script src="../../public/lib/jquery/jquery.min.js"></script>
      <script src="../../public/lib/popper/popper.min.js"></script>


  </head>
  <body class="sb-nav-fixed" style="overflow: hidden">
    <div id="layoutSidenav_content">
      <main>

      <?= $content; ?>

        <!--  JS -->
        <script src="../../public/js/toastr/toastr.min.js"></script>
        <script src="../../public/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../public/lib/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="../../public/lib/jquery-ui/js/jquery-ui.min.js"></script>
        <script src="../../public/lib/pace/js/pace.min.js"></script>

        <script src="../../public/lib/chartjs/Chart.min.js"></script>
        <script src="../../public/js/presentation/matrix.js"></script>
        <script src="../../public/js/presentation/knob.js"></script>
        <script src="../../public/js/presentation/transform2d.js"></script>
        <script src="../../public/js/presentation/keymaster.js"></script>
        <script src="../../public/js/presentation/templates/newpresotemplate.js"></script>
        <script src="../../public/js/presentation/matrices.js"></script>
        <script src="../../public/lib/font-awesome/js/all.min.js"></script>

        <script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>
        <script>
          const user_id_ajax = "<?=Session::read('User.id')?>";
          const night_mode = "<?=$night_mode?>";
        </script>
        <script src="../../public/js/presentation/main.js"></script>
        <script src ="../../public/js/presentation/startup.js"></script>
      </main>
    </div>
  </body>
</html>