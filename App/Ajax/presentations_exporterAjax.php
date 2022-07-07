<?php

const ROOT = "../..";
const CONFIG = ROOT . '/Config';
const APP = ROOT . '/App';
const WEBROOT = ROOT . '/public';

//Récupération de tous les fichiers a zipper et exporter
$tabFichiersToZip = [
    "/lib/impressjs/js/impress.js",
    "/lib/impressjs/css/impress-common.css",
    "/lib/bootstrap/css/bootstrap.min.css",
    "/css/presentation/custom.css",
    "/lib/chartjs/Chart.min.js",
    "/css/styles.css"
];

$tabData = json_decode(file_get_contents("php://input"), true);


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
    $zip->addFromString("presentation.html", $tabData['presentation_export']);
    $zip->close();

    echo('{"path":"' . basename($filename) . '"}');
}