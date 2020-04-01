
<link rel="stylesheet" href="lib/deckjs/css/introduction.css">

<div class="col-lg-12">
  <textarea id="code" name="code" style="height: 180px; width:700px;">

<!DOCTYPE html>
    <!--[if lt IE 7]> <html class="no-js ie6" lang="en"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8" lang="en"> <![endif]-->
    <!--[if gt IE 8]><!-->  <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Getting Started with deck.js</title>

  <meta name="description" content="A jQuery library for modern HTML presentations">
  <meta name="author" content="Caleb Troughton">
  <meta name="viewport" content="width=1024, user-scalable=no">

  <!-- Core and extension CSS files -->
  <link rel="stylesheet" media="screen" href="../../public/lib/deckjs/main/core/deck.core.css">
  <link rel="stylesheet" media="screen" href="../../public/lib/deckjs/main/extensions/goto/deck.goto.css">
  <link rel="stylesheet" media="screen" href="../../public/lib/deckjs/main/extensions/menu/deck.menu.css">
  <link rel="stylesheet" media="screen" href="../../public/lib/deckjs/main/extensions/navigation/deck.navigation.css">
  <link rel="stylesheet" media="screen" href="../../public/lib/deckjs/main/extensions/status/deck.status.css">
  <link rel="stylesheet" media="screen" href="../../public/lib/deckjs/main/extensions/scale/deck.scale.css">

  <!-- Style theme. More available in /themes/style/ or create your own. -->
  <link id="style-theme-link" rel="stylesheet" media="screen" href="../../public/lib/deckjs/themes/style/web-2.0.css">

  <!-- Transition theme. More available in /themes/transition/ or create your own. -->
  <link id="transition-theme-link" rel="stylesheet" media="screen" href="../../public/lib/deckjs/themes/transition/horizontal-slide.css">

  <!-- Basic black and white print styles -->
  <link rel="stylesheet" media="print" href="../../public/lib/deckjs/main/core/print.css">

  <script src="../../public/lib/modernizr.custom.js"></script>

</head>

<body>
<div class="deck-container">

  <!-- Begin slides -->
  <section class="slide" id="title-slide">
    <h1>Getting Started with deck.js</h1>
  </section>

  <section class="slide" id="how-to-overview">
    <h2>How to Make a Deck</h2>
    <ol>
      <li>
        <h3>Write Slides</h3>
        <p>Slide content is simple&nbsp;HTML.</p>
      </li>
      <li>
        <h3>Choose Themes</h3>
        <p>One for slide styles and one for deck&nbsp;transitions.</p>
      </li>
      <li>
        <h3>Include Extensions</h3>
        <p>Add extra functionality to your deck, or leave it stripped&nbsp;down.</p>
      </li>
    </ol>
  </section>

  <section class="slide" id="quick-start">
    <h2>Quick Start</h2>
    <p>When you <a href="https://github.com/imakewebthings/deck.js/archive/latest.zip">download</a> deck.js, it will include a file named <code>boilerplate.html</code>. You can immediately start editing slides in this page and viewing them in your web browser. Later on, when you are comfortable customizing the deck, you can edit the various pieces of the boilerplate or make your own to suit your needs.</p>
  </section>

  <section class="slide" id="markup">
    <h2>The Markup</h2>
    <p>Slides are just HTML elements with a class of <code>slide</code>.</p>
    <pre><code>&lt;section class=&quot;slide&quot;&gt;
  &lt;h2&gt;How to Make a Deck&lt;/h2&gt;
  &lt;ol&gt;
    &lt;li&gt;
      &lt;h3&gt;Write Slides&lt;/h3&gt;
      &lt;p&gt;Slide content is simple HTML.&lt;/p&gt;
    &lt;/li&gt;
    &lt;li&gt;
      &lt;h3&gt;Choose Themes&lt;/h3&gt;
      &lt;p&gt;One for slide styles and one for deck transitions.&lt;/p&gt;
    &lt;/li&gt;
    &hellip;
  &lt;/ol&gt;
&lt;/section&gt;</code></pre>
  </section>

  <section class="slide" id="themes">
    <h2>Style Themes</h2>
    <p>Customizes the colors, typography, and layout of slide&nbsp;content.</p>
    <pre><code>&lt;link rel=&quot;stylesheet&quot; href=&quot;/path/to/css/style-theme.css&quot;&gt;</code></pre>
    <h2>Transition Themes</h2>
    <p>Defines transitions between slides using CSS3 transitions.  Less capable browsers fall back to cutaways. But <strong>you</strong> aren&rsquo;t using <em>those</em> browsers to give your presentations, are&nbsp;you&hellip;</p>
    <pre><code>&lt;link rel=&quot;stylesheet&quot; href=&quot;/path/to/css/transition-theme.css&quot;&gt;</code></pre>
  </section>

  <section class="slide" id="extensions">
    <h2>Extensions</h2>
    <p>Core gives you basic slide functionality with left and right arrow navigation, but you may want more. Here are the ones included in this&nbsp;deck:</p>

    <ul>
      <li class="slide" id="extensions-goto">
        <strong>deck.goto</strong>: Adds a shortcut key to jump to any slide number.  Hit g, type in the slide number, and hit&nbsp;enter.
      </li>

      <li class="slide" id="extensions-menu">
        <strong>deck.menu</strong>: Adds a menu view, letting you see all slides in a grid. Hit m to toggle to menu view, continue navigating your deck, and hit m to return to normal view. Touch devices can double-tap the deck to switch between&nbsp;views.
      </li>

      <li class="slide" id="extensions-navigation">
        <strong>deck.navigation</strong>: Adds clickable left and right buttons for the less keyboard&nbsp;inclined.
      </li>

      <li class="slide" id="extensions-status">
        <strong>deck.status</strong>: Adds a page number indicator. (current/total)
      </li>

      <li class="slide" id="extensions-scale">
        <strong>deck.scale</strong>: Scales each slide to fit within the deck container using CSS Transforms for those browsers that support them.
      </li>
    </ul>

    <p class="slide" id="extension-folders">Each extension folder in the download package contains the necessary JavaScript, CSS, and HTML&nbsp;files. For a complete list of extension modules included in deck.js, check out the&nbsp;<a href="http://imakewebthings.github.com/deck.js/docs">documentation</a>.</p>
  </section>

  <section class="slide" id="nested">
    <h2>Nested Slides</h2>
    <p>That last slide had a few steps.  To create substeps in slides, just nest them:</p>
    <pre><code>&lt;section class=&quot;slide&quot;&gt;
  &lt;h2&gt;Extensions&lt;/h2&gt;
  &lt;p&gt;Core gives you basic slide functionality...&lt;/p&gt;
  &lt;ul&gt;
    &lt;li class=&quot;slide&quot;&gt;
      &lt;h3&gt;deck.goto&lt;/h3&gt;
      &lt;p&gt;Adds a shortcut key to jump to any slide number...&lt;/p&gt;
    &lt;/li&gt;
    &lt;li class=&quot;slide&quot;&gt;...&lt;/li&gt;
    &lt;li class=&quot;slide&quot;&gt;...&lt;/li&gt;
    &lt;li class=&quot;slide&quot;&gt;...&lt;/li&gt;
  &lt;/ul&gt;
&lt;/section&gt;</code></pre>
  </section>

  <section class="slide" id="elements-images">
    <h2>Other Elements: Images</h2>
    <img src="http://placekitten.com/600/375" alt="Kitties">
    <pre><code>&lt;img src=&quot;http://placekitten.com/600/375&quot; alt=&quot;Kitties&quot;&gt;</code></pre>
  </section>

  <section class="slide" id="elements-blockquotes">
    <h2>Other Elements: Blockquotes</h2>
    <blockquote cite="http://example.org">
      <p>Food is an important part of a balanced diet.</p>
      <p><cite>Fran Lebowitz</cite></p>
    </blockquote>
    <pre><code>&lt;blockquote cite=&quot;http://example.org&quot;&gt;
  &lt;p&gt;Food is an important part of a balanced diet.&lt;/p&gt;
  &lt;p&gt;&lt;cite&gt;Fran Lebowitz&lt;/cite&gt;&lt;/p&gt;
&lt;/blockquote&gt;</code></pre>
  </section>


  <section class="slide" id="elements-videos">
    <h2>Other Elements: Video Embeds</h2>
    <p>Embed videos from your favorite online video service or with an HTML5 video&nbsp;element.</p>

    <iframe src="http://player.vimeo.com/video/1063136?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0"></iframe>

    <pre><code>&lt;iframe src=&quot;http://player.vimeo.com/video/1063136?title=0&amp;amp;byline=0&amp;amp;portrait=0&quot; width=&quot;400&quot; height=&quot;225&quot; frameborder=&quot;0&quot;&gt;&lt;/iframe&gt;</code></pre>
  </section>

  <section class="slide" id="digging-deeper">
    <h2>Digging Deeper</h2>
    <p>If you want to learn about making your own themes, extending deck.js, and more, check out the&nbsp;<a href="../docs/">documentation</a>.</p>
  </section>

  <!-- deck.navigation snippet -->
  <div aria-role="navigation">
    <a href="#" class="deck-prev-link" title="Previous">&#8592;</a>
    <a href="#" class="deck-next-link" title="Next">&#8594;</a>
  </div>

  <!-- deck.status snippet -->
  <p class="deck-status" aria-role="status">
    <span class="deck-status-current"></span>
    /
    <span class="deck-status-total"></span>
  </p>

  <!-- deck.goto snippet -->
  <form action="." method="get" class="goto-form">
    <label for="goto-slide">Go to slide:</label>
    <input type="text" name="slidenum" id="goto-slide" list="goto-datalist">
    <datalist id="goto-datalist"></datalist>
    <input type="submit" value="Go">
  </form>
</div>


<!-- Initialize the deck -->
<script>
    $(function() {
        $.deck('.slide');
    });
</script>

</body>
</html>
</textarea>

  <br><br><button class="btn btn-primary" id="ID_B0" onclick="yourFunction">Afficher</button><br><br>
<iframe id="iframe" frameborder="0"  class="deck-frame"></iframe>
  <div id="iframe2" class="deck-frame" style="overflow: auto;"></div>
  <br><br>
</div>


<!-- Deck Core and extensions -->
<script src="../../public/lib/jquery/jquery.min.js"></script>
<script src="../../public/lib/deckjs/main/core/deck.core.js"></script>
<script src="../../public/lib/deckjs/main/extensions/menu/deck.menu.js"></script>
<script src="../../public/lib/deckjs/main/extensions/goto/deck.goto.js"></script>
<script src="../../public/lib/deckjs/main/extensions/status/deck.status.js"></script>
<script src="../../public/lib/deckjs/main/extensions/navigation/deck.navigation.js"></script>

