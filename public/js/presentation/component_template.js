var slidethumb = `
<div id="slidethumb_^UID^" class="slidethumb">
	<div class="thumbnailholder"></div>
	<canvas class="slidemask" id="slidethumb_^UID^" style="z-index:1000; width:100%; height:100%; background-color:#FFF; opacity:0.1; left:0; top:0; position:absolute"></canvas>
	<a data-parent="slidethumb_^UID^" style="z-index:1001;" class="btn btn-danger btn-small deletebtn text-white"><i class="fas fa-trash"></i></a>
</div>`;

var impress_slide = `
<div class="impress-slide" id="impress_slide__slidenumber__">
	<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h2" style="width:auto; height:auto; position:absolute; left:216px; top:50px; " contentEditable="true"> Titre d'exemple</div><div class="slidelement slidelementh3" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h3" style="position:absolute; width:auto; height:65px; left:236px; top:160px; "> Paragraphe d'exemple </div>
</div>`;

var text_snippet = `<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h2" style="width:auto; height:auto; position:absolute; left:300px; top:50px; " contentEditable="true"> Titre d'exemple </div>`;

var text_snippet_h1 = `<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h1" style=" font-size: 50px; width:auto; height:auto; position:absolute; left:300px; top:50px;" contentEditable="true"> Titre H1 </div>`;
var text_snippet_h2 = `<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h2" style=" font-size: 40px; width:auto; height:auto; position:absolute; left:300px; top:50px;" contentEditable="true"> Titre H2 </div>`;
var text_snippet_h3 = `<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h3" style=" font-size: 30px; width:auto; height:auto; position:absolute; left:300px; top:50px;" contentEditable="true"> Titre H3 </div>`;
var text_snippet_p = `<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="p" style=" font-size: 20px; width:auto; height:auto; position:absolute; left:300px; top:50px;" contentEditable="true"> Paragraphe </div>`;


var saved_presentations = `
<div class="saved-presos">
	<div class="presothumbcontent">
		<h3 style="display:inline-block; color:#2980B9" contentEditable="true">__presotitle__</h3>
		<p style="font-size: 120%" contentEditable="true">__presodescription__</p>
	</div>
	<div class="presothumb" >
		<a href="#"  data-id="__presoid__" class="btn btn-inline btn-primary openpresobtn" style="position:absolute; right: 10px; top: 10px">
			<i class="fas fa-eye"></i>
		</a>
		<a href="#"  data-id="__presoid__" class="btn btn-inline btn-danger deletepresobtn" style="position:absolute; right: 60px; top: 10px">
			<i class="fas fa-trash"></i>
		</a>
		</br>
	</div>
</div>`;



var tableau_previsualisation = `
<table class="table table-responsive tableau-previsualisation" align="center" style="width: auto;">
	<tbody id="tableau-body">
		<tr>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
		</tr>
		<tr>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
		</tr>
		<tr>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
			<td contenteditable="true">Case</td>
		</tr>
	</tbody>
</table>`;


var video_template = `<iframe class="preview-video" width="468" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>`;


var graphique_previsualisation = `<canvas id="preview-graphique" width="400" height="400" style="background-color: white;"></canvas>`;

var export_template = `<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=1024"/>
		<title>__slidetitle__</title>
		<link href="impress-common.css" rel="stylesheet" />
		<link href="bootstrap.css" rel="stylesheet"/>
		<link href="custom.css" rel="stylesheet"/>
		<link href="styles.css" rel="stylesheet">
	</head>
	<body class="impress-not-supported">
		<div class="fallback-message">
			<p>Your browser <b>doesn't support the features required</b> by impress.js, so you are presented with a simplified version of this presentation.</p>
			<p>For the best experience please use the latest <b>Chrome</b>, <b>Safari</b> or <b>Firefox</b> browser.</p>
		</div>
		<div id="impress">__contenuslide__</div>
		<div id="impress-toolbar"></div>
		<div class="hint">
			<p>Use a spacebar or arrow keys to navigate. <br/>Press 'P' to launch speaker console.</p>
		</div>
		<script>
			if("ontouchstart" in document.documentElement){
        document.querySelector(".hint").innerHTML = "<p>Swipe left or right to navigate</p>";
      }
    </script>
    <script src="impress.js"></script>
    <script src="chart.js"></script>
    <script>impress().init();</script>
	</body>
</html>`;