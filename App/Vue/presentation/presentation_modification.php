
<link rel="stylesheet" href="../../../public/lib/deckjs/css/introduction.css">

<h1 class="mt-4"><i class="fa fa-angle-right titre-fa"></i> <?=$title?></h1>

<div class="col-lg-12">
  <form action="<?="presentation_modification_ajout?presentation_id=".$presentation_id."&title=".$titre?>">
      <div class="form-group">
          <label for="nslide" class="col-2 col-form-label">ID de la slide</label>
          <input id="nslide" class="form-control" type="text">
      </div>

      <div class="form-group">
          <input id="ajouterslide" class="btn btn-primary" type="button" value="Accéder à cette slide" name="accéder">
          <input id="ajouterslide" class="btn btn-primary" type="button" value="Ajouter une slide après l'ID de slide indiqué" name="ajouter">
          <input id="enleverslide" class="btn btn-primary" type="button" value="Enlever la slide" name="enlever">
      </div>
  </form>
  <form action="<?="presentation_modification?presentation_id=".$presentation_id."&title=".$titre?>" method="post"
  style="padding-bottom: 20px;">
      <textarea name= "code" id="code" name="code" style="height: 180px; width:700px;">
          <?=$contenuFichier?>
      </textarea>
      <input type="hidden" name="path" value="<?=$pathToPresentation?>"><br>
      <input id="sauvegarde" class="btn btn-primary" type="button" value="Modifier la présentation" name="envoyer">
  </form>
</div>
<div class="col-lg-12">
  <h2><i class="fa fa-angle-right titre-fa"></i> Aperçu de la présentation </h2>
  <iframe id="iframe" src=<?=$pathToPresentation?> frameborder="0" class="deck-frame"></iframe>
  <br><br><br>
</div>

<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        gutters: ["CodeMirror-linenumbers"],
        scrollbarStyle: "simple",
        theme : "<?=$theme_editor->value?>"
    });
</script>

<script>
  $("#sauvegarde").click(function() {
      let data = { data : editor.getValue()};
      $.ajax({
          type: "POST",
          url: "<?="presentation_modification_ajax?presentation_id=".$presentation_id."&title=".$titre?>",
          data: data,
          success: function(retour)
          {
              $('#iframe').attr("src", $('#iframe').attr("src"));
          }
      });
  });
</script>