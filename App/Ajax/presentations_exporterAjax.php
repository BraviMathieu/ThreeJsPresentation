<?php

define('ROOT', "../..");
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');
define('WEBROOT', ROOT . '/public');

//Récupération de tous les fichiers a zipper et exporter
$tabFichiersToZip = [
    "/lib/impressjs/js/impress.js",
    "/lib/impressjs/css/impress-common.css",
    "/lib/bootstrap/css/bootstrap.min.css",
    "/css/presentation/custom.css",
    "/lib/chartjs/Chart.min.js",
    "/css/styles.css"
];

$zip = new ZipArchive();
$filename = tempnam(sys_get_temp_dir(), "threejs-presentation_");

if ($zip->open($filename, ZipArchive::OVERWRITE) !== true) {
    echo('{"message":"Impossible d\'ouvrir le fichier ' . $filename . '"}');
} else {
    foreach ($tabFichiersToZip as $cheminFichier) {
        if (file_exists(WEBROOT . $cheminFichier)) {
            $zip->addFile(WEBROOT . $cheminFichier, basename($cheminFichier));
        }
    }
    $zip->addFromString("presentation.html", $_POST['presentation_export']);
    $zip->close();


    echo('{"message":"' . $filename . '"}');
}