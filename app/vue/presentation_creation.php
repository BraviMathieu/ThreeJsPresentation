
<link rel="stylesheet" href="../../public/lib/deckjs/css/introduction.css">

<h1 class="mt-4"><i class="fa fa-angle-right"></i> <?=$title?></h1>
<div class="row">

<div class="col-lg-12">
  <form action="<?="presentation_creation"?>" method="post"
  style="padding-bottom: 20px;">
        <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" class="form-control" id="titre" name="titre" required>
          <small>Un titre ne peut pas contenir les caractères suivants </small>
          <small>\ / : * ? " < > |</small>
        </div>
      <textarea name= "code" id="code" name="code" style="height: 180px; width:700px;">
          <?=$contenuFichier?>
      </textarea>
      <input type="hidden" name="path" value="<?=$pathToPresentation?>"><br>
      <input id="ID_B0" class="btn btn-primary" type="submit" value="Créer la présentation" name="envoyer">
  </form>
</div>
<div class="col-lg-12">
  <h2><i class="fa fa-angle-right"></i> Aperçu de la présentation </h2>
  <iframe src=<?=$pathToPresentation?> frameborder="0" class="deck-frame"></iframe>
  <br><br><br>
</div>
