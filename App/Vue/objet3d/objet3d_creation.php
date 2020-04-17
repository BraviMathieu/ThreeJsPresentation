
<h1 class="mt-4"><i class="fa fa-angle-right"></i> <?=$title?></h1>
<div class="row">
  <div class="col-lg-12">
      <textarea name= "code" id="code" name="code" style="height: 180px; width:700px;">
      </textarea>

      <input class="btn btn-primary" type="submit" value="Créer la présentation" name="envoyer">
  </div>
  <div class="col-lg-12">
    <h2><i class="fa fa-angle-right"></i> Aperçu de l'objet 3D</h2>
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