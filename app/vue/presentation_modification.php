
<link rel="stylesheet" href="../../public/lib/deckjs/css/introduction.css">


<div class="col-lg-12">
  <h3><i class="fa fa-angle-right"></i> Modification de la présentation </h3>
  <form action="<?="presentation_modification?presentation_id=".$presentation_id?>" method="post"
  style="padding-bottom: 20px;">
      <textarea name= "code" id="code" name="code" style="height: 180px; width:700px;">
          <?=$contenuFichier?>
      </textarea>
      <input type="hidden" name="path" value="<?=$pathToPresentation?>"><br>
      <input id="ID_B0" class="btn btn-primary" type="submit" value="Modifier la présentation" name="envoyer">
  </form>
</div>
<div class="col-lg-12">
  <h3><i class="fa fa-angle-right"></i> Aperçu de la présentation </h3>
  <iframe src=<?=$pathToPresentation?> frameborder="0" class="deck-frame"></iframe>
  <br><br><br>
</div>

<!-- Deck Core and extensions -->
<script src="../../public/lib/jquery/jquery.min.js"></script>
<script src="../../public/lib/deckjs/main/core/deck.core.js"></script>
<script src="../../public/lib/deckjs/main/extensions/menu/deck.menu.js"></script>
<script src="../../public/lib/deckjs/main/extensions/goto/deck.goto.js"></script>
<script src="../../public/lib/deckjs/main/extensions/status/deck.status.js"></script>
<script src="../../public/lib/deckjs/main/extensions/navigation/deck.navigation.js"></script>
<script src="../../public/lib/deckjs/main/extensions/scale/deck.scale.js"></script>