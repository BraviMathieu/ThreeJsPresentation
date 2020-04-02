<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Présentation ThreeJS</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <script src="lib/font-awesome/js/all.min.js"></script>

    <script src="lib/jquery/jquery.min.js"></script>

    <!-- Code mirror css-->
    <link rel="stylesheet" href="lib/codemirror/codemirror.css">
    <link rel="stylesheet" href="lib/codemirror/addon/scroll/simplescrollbars.css">
    <link rel="stylesheet" href="../../public/lib/codemirror/theme/<?=$theme_editor->value?>.css">

    <!-- Code mirror js-->
    <script src="lib/codemirror/codemirror.js"></script>
    <script src="lib/codemirror/addon/scroll/simplescrollbars.js"></script>
    <script src="lib/codemirror/addon/selection/active-line.js"></script>
    <script src="lib/codemirror/addon/edit/matchbrackets.js"></script>

    <!-- Code mirror langages-->
    <script src="lib/codemirror/mode/xml/xml.js"></script>
    <script src="lib/codemirror/mode/javascript/javascript.js"></script>
    <script src="lib/codemirror/mode/css/css.js"></script>
    <script src="lib/codemirror/mode/htmlmixed/htmlmixed.js"></script>

  </head>
  <body class="sb-nav-fixed">

  <?= $content; ?>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  </body>
</html>
