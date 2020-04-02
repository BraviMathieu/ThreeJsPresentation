<div class="row">
    <div class="col-lg-12">
        <h1 class="mt-4"><i class="fa fa-angle-right"></i> <?=$title?></h1>
        <link rel="stylesheet" href="../../public/lib/codemirror/codemirror.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/3024-day.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/3024-night.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/abcdef.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/ambiance.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/ayu-dark.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/ayu-mirage.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/base16-dark.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/bespin.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/base16-light.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/blackboard.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/cobalt.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/colorforth.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/dracula.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/duotone-dark.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/duotone-light.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/eclipse.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/elegant.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/erlang-dark.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/gruvbox-dark.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/hopscotch.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/icecoder.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/isotope.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/lesser-dark.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/liquibyte.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/lucario.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/material.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/material-darker.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/material-palenight.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/material-ocean.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/mbo.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/mdn-like.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/midnight.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/monokai.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/moxer.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/neat.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/neo.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/night.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/nord.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/oceanic-next.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/panda-syntax.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/paraiso-dark.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/paraiso-light.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/pastel-on-dark.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/railscasts.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/rubyblue.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/seti.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/shadowfox.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/solarized.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/the-matrix.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/tomorrow-night-bright.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/tomorrow-night-eighties.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/ttcn.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/twilight.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/vibrant-ink.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/xq-dark.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/xq-light.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/yeti.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/idea.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/darcula.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/yonce.css">
        <link rel="stylesheet" href="../../public/lib/codemirror/theme/zenburn.css">

      <script src="../../public/lib/codemirror/codemirror.js"></script>
      <script src="../../public/lib/codemirror/mode/javascript/javascript.js"></script>
      <script src="../../public/lib/codemirror/addon/selection/active-line.js"></script>
      <script src="../../public/lib/codemirror/addon/edit/matchbrackets.js"></script>

      <article>
        <h2>Couleur de l'éditeur</h2>
        <form><textarea id="codetest" name="codetest">
function findSequence(goal) {
  function find(start, history) {
    if (start == goal)
      return history;
    else if (start > goal)
      return null;
    else
      return find(start + 5, "(" + history + " + 5)") ||
             find(start * 3, "(" + history + " * 3)");
  }
  return find(1, "1");
}</textarea></form>
<br>
        <form action="main_configuration" method="POST">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="select">Choisissez un thème:</label>
              <select name="theme" class="form-control" onchange="selectTheme()" id="select">
                <option value="default">default</option>
                <option value="3024-day">3024-day</option>
                <option value="3024-night">3024-night</option>
                <option value="abcdef">abcdef</option>
                <option value="ambiance">ambiance</option>
                <option value="ayu-dark">ayu-dark</option>
                <option value="ayu-mirage">ayu-mirage</option>
                <option value="base16-dark">base16-dark</option>
                <option value="base16-light">base16-light</option>
                <option value="bespin">bespin</option>
                <option value="blackboard">blackboard</option>
                <option value="cobalt">cobalt</option>
                <option value="colorforth">colorforth</option>
                <option value="darcula">darcula</option>
                <option value="dracula">dracula</option>
                <option value="duotone-dark">duotone-dark</option>
                <option value="duotone-light">duotone-light</option>
                <option value="eclipse">eclipse</option>
                <option value="elegant">elegant</option>
                <option value="erlang-dark">erlang-dark</option>
                <option value="gruvbox-dark">gruvbox-dark</option>
                <option value="hopscotch">hopscotch</option>
                <option value="icecoder">icecoder</option>
                <option value="idea">idea</option>
                <option value="isotope">isotope</option>
                <option value="lesser-dark">lesser-dark</option>
                <option value="liquibyte">liquibyte</option>
                <option value="lucario">lucario</option>
                <option value="material">material</option>
                <option value="material-darker">material-darker</option>
                <option value="material-palenight">material-palenight</option>
                <option value="material-ocean">material-ocean</option>
                <option value="mbo">mbo</option>
                <option value="mdn-like">mdn-like</option>
                <option value="midnight">midnight</option>
                <option value="monokai">monokai</option>
                <option value="moxer">moxer</option>
                <option value="neat">neat</option>
                <option value="neo">neo</option>
                <option value="night">night</option>
                <option value="nord">nord</option>
                <option value="oceanic-next">oceanic-next</option>
                <option value="panda-syntax">panda-syntax</option>
                <option value="paraiso-dark">paraiso-dark</option>
                <option value="paraiso-light">paraiso-light</option>
                <option value="pastel-on-dark">pastel-on-dark</option>
                <option value="railscasts">railscasts</option>
                <option value="rubyblue">rubyblue</option>
                <option value="seti">seti</option>
                <option value="shadowfox">shadowfox</option>
                <option value="solarized dark">solarized dark</option>
                <option value="solarized light">solarized light</option>
                <option value="the-matrix">the-matrix</option>
                <option value="tomorrow-night-bright">tomorrow-night-bright</option>
                <option value="tomorrow-night-eighties">tomorrow-night-eighties</option>
                <option value="ttcn">ttcn</option>
                <option value="twilight">twilight</option>
                <option value="vibrant-ink">vibrant-ink</option>
                <option value="xq-dark">xq-dark</option>
                <option value="xq-light">xq-light</option>
                <option value="yeti">yeti</option>
                <option value="yonce">yonce</option>
                <option value="zenburn">zenburn</option>
              </select>
            </div>
          </div>
          <input type="submit" class="btn btn-primary" value="Enregistrer" name="envoyer">
        </form>

        <script type="text/javascript" defer="defer">
            // A $( document ).ready() block.
            $( document ).ready(function() {
                currLoc = $(location).attr('href');
                currLoc += "#<?=$theme_editor->value?>";
                window.location.replace(currLoc)
            });
        </script>

        <script>
          var editor = CodeMirror.fromTextArea(document.getElementById("codetest"), {
                lineNumbers: true,
                styleActiveLine: true,
                matchBrackets: true
            });

            var input = document.getElementById("select");

            function selectTheme() {
                var theme = input.options[input.selectedIndex].textContent;
                editor.setOption("theme", theme);
                location.hash = "#" + theme;
            }

            var choice = (location.hash && location.hash.slice(1)) ||
                (document.location.search &&
                    decodeURIComponent(document.location.search.slice(1)));
            if (choice) {
                input.value = choice;
                editor.setOption("theme", choice);
            }
            CodeMirror.on(window, "hashchange", function() {
                var theme = location.hash.slice(1);
                if (theme) { input.value = theme; selectTheme(); }
            });
        </script>
      </article>
    </div>
</div>