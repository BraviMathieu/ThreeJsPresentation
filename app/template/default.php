<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Présentation ThreeJS</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Code mirror-->
    <link rel="stylesheet" href="lib/codemirror/codemirror.css">
    <link rel="stylesheet" href="https://codemirror.net/theme/eclipse.css">

    <script src="lib/font-awesome/js/all.min.js"></script>

    <!-- Code mirror-->
    <script src="lib/codemirror/codemirror.js"></script>
    <script src="lib/codemirror/mode/javascript/javascript.js"></script>
  </head>
  <body class="sb-nav-fixed">

  <?= $content; ?>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>

  <script type="text/javascript">
      var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
          mode: 'application/javascript',
          theme: "eclipse",
          lineNumbers: true,
          gutters: ["CodeMirror-linenumbers"]
      });

      document.getElementById("ID_B0").onclick = function(event) {
//         var html = document.getElementById("code").value = editor.getValue();
 //        var iframe = document.getElementById("iframe");
   //       iframe.src = 'data:text/html;charset=utf-8,' + encodeURIComponent(html);

          var html = document.getElementById("code").value = editor.getValue();
          html = $.parseHTML( html);
          $("#iframe2").append(html);

          html = document.getElementById("code").value = editor.getValue();
          var iframe = document.getElementById("iframe");
          iframe.src = 'data:text/html;charset=utf-8,' + encodeURIComponent(html);
      };




  </script>




  <script>
      $(function() {
          $.deck('.slide');
      });
  </script>


  </body>
</html>
