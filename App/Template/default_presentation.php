<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Création de présentation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="../../public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" type="image/ico" href="images/favicon.ico" />
    <link href="../../public/lib/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="../../public/lib/presentation/css/freetrans.css" rel="stylesheet">
    <link href="../../public/lib/codemirror/codemirror.css" rel="stylesheet">
    <link rel="stylesheet" href="subj.css">
    <link href="../../public/lib/presentation/css/matrices.css" rel="stylesheet">


    <!-- webfonts -->

    <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Miltonian' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch' rel='stylesheet' type='text/css'>

    <link href="../../public/lib/presentation/css/custom.css" rel="stylesheet">

    <link href="../../public/css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="http://yandex.st/highlightjs/7.3/styles/default.min.css">
    <script src="../../public/lib/jquery/jquery.min.js"></script>
    <script src="../../public/lib/popper/popper.min.js"></script>


</head>
<body class="sb-nav-fixed" style="overflow: hidden">
<div id="layoutSidenav_content">
    <main>

    <?= $content; ?>


    <!-- Load JS here for greater good =============================-->

    <script src="../../public/lib/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="../../public/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="../../public/lib/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

    <script src="../../public/lib/presentation/js/matrix.js"></script>
    <script src="../../public/lib/presentation/js/knob.js"></script>
    <script type="text/javascript" src="subj.js"></script>

    <script src="../../public/lib/presentation/js/transform2d.js"></script>
    <script src="../../public/lib/presentation/js/keymaster.js"></script>
    <script src="../../public/lib/presentation/js/templates/newpresotemplate.js"></script>
    <script src="../../public/lib/presentation/js/matrices.js"></script>
    <script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>
    <script src="lib/font-awesome/js/all.min.js"></script>


    <script src="../../public/lib/presentation/js/main.js"></script>
    <script src ="../../public/lib/presentation/js/startup.js"></script>
    </main>
</div>
</body>
</html>