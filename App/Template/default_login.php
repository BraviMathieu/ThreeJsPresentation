<?php
use App\Alert;
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion / Inscription</title>
    <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/login.css">
  </head>
  <body>
    <?= $content; ?>
    <script src="public/js/login.js"></script>
    <?= Alert::display(); ?>
  </body>
</html>
