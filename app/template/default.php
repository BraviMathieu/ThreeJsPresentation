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

    <!-- Code mirror css-->
    <link rel="stylesheet" href="lib/codemirror/codemirror.css">
    <link rel="stylesheet" href="lib/codemirror/addon/scroll/simplescrollbars.css">

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

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>

  <script type="text/javascript">
      var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
          lineNumbers: true,
          gutters: ["CodeMirror-linenumbers"],
          scrollbarStyle: "simple"
      });

      $("#ID_B0").click(function() {
          html = document.getElementById("code").value = editor.getValue();
          var iframe = document.getElementById("iframe");
          iframe.src = 'data:text/html;charset=utf-8,' + encodeURIComponent(html);
      });
  </script>
  </body>
</html>
