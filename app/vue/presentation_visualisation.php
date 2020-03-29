<?php
use App\Alert;
use App\Form as FormAlias;


?>

<link rel="stylesheet" href="../../public/lib/deckjs/css/introduction.css">

<section id="main-content">
  <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Visualiation de présentation </h3>

    <iframe src=<?=$pathToPresentation?> frameborder="0" class="deck-frame"></iframe>
  </section>
</section>

<!-- Deck Core and extensions -->
<script src="../../public/lib/jquery/jquery.min.js"></script>
<script src="../../public/lib/deckjs/main/core/deck.core.js"></script>
<script src="../../public/lib/deckjs/main/extensions/menu/deck.menu.js"></script>
<script src="../../public/lib/deckjs/main/extensions/goto/deck.goto.js"></script>
<script src="../../public/lib/deckjs/main/extensions/status/deck.status.js"></script>
<script src="../../public/lib/deckjs/main/extensions/navigation/deck.navigation.js"></script>
