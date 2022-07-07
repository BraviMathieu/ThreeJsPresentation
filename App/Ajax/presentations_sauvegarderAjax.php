<?php

const ROOT = "../..";
const CONFIG = ROOT . '/Config';
const APP = ROOT . '/App';

require_once CONFIG . "/config.php";
require_once "../Classe/Database/Bootstrap.php";

$tabData = json_decode(file_get_contents("php://input"), true);
$user_id = $tabData['user_id'];
$new_presentation = $tabData['new_presentation'];

$id = $new_presentation['id'];
$titre = $new_presentation['title'];
$desc = $new_presentation['description'];
$contents = $new_presentation['contents'];
$thumbcontents = $new_presentation['thumbcontents'];

$presentation = Presentation::where('id', $id)
    ->first();

if ($presentation == null) {
    $presentation = new Presentation();
    $presentation->title = $titre;
    $presentation->description = $desc;
    $presentation->contents = $contents;
    $presentation->thumbcontents = $thumbcontents;
    $presentation->user_id = $user_id;
    $presentation->save();
} else {
    $presentation->title = $titre;
    $presentation->description = $desc;
    $presentation->contents = $contents;
    $presentation->thumbcontents = $thumbcontents;
    $presentation->user_id = $user_id;
    $presentation->save();
}
echo $presentation->id;