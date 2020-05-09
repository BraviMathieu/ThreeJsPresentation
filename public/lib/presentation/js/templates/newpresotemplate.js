var newpresotemplate = '<div id="newpreso">'+
						   '<h4 id="presotitle" class="settingsboxheader">Title</h4><input id="presotitleinput" type="text">'+
						   '<h4 id="presodescription" class="settingsboxheader">Description</h4><textarea id="presotitledescription"></textarea>'+
						   '<a class="btn btn-large btn-primary btn-inline previewbtn settingsCancelBtn" id="newpresocancel">&nbsp;Cancel</a>'+
          				   '<a class="btn btn-large btn-inline btn-info previewbtn">&nbsp;OK</a>'
          				'</div>'
var slidethumb = '<div id="slidethumb_^UID^" class="slidethumb thumbelement">'+
					 '<div class="thumbnailholder"></div>'+
					 '<canvas class="slidemask" id="slidethumb_^UID^" style="z-index:1000; width:100%; height:100%; background-color:#FFF; opacity:0.1; left:0px; top:0px; position:absolute"></canvas>'+
					'<a id="deletebtn" data-parent="slidethumb_^UID^" style="z-index:1001;" class="btn btn-danger btn-small deletebtn text-white"><i class="fas fa-trash-alt"></i></a>'+
				 '</div>';
var impress_slide = '<div class="impress-slide" id="impress_slide__slidenumber__">'+
						'<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h2" style="width:auto; height:60px; position:absolute; left:202px; top:50px; whitespace:no-wrap;" contentEditable="true"> Titre d\'exemple</div>'+
                    	'<div class="slidelement slidelementh3" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h3" style="position:absolute; width:auto; height:40px; left:268px; top:120px; whitespace:no-wrap;"> Paragraphe d\'exemple </div>'
                	'</div>';
var text_snippet = '<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h2" style="width:auto; height:60px; position:absolute; left:300px; top:50px; whitespace:no-wrap;" contentEditable="true"> Titre d\'exemple </div>';

var text_snippet_h1 = '<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h1" style=" font-size: 50px; width:auto; height:60px; position:absolute; left:300px; top:50px; whitespace:no-wrap;" contentEditable="true"> Titre H1 </div>';
var text_snippet_h2 = '<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h2" style=" font-size: 40px; width:auto; height:60px; position:absolute; left:300px; top:50px; whitespace:no-wrap;" contentEditable="true"> Titre H2 </div>';
var text_snippet_h3 = '<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="h3" style=" font-size: 30px; width:auto; height:60px; position:absolute; left:300px; top:50px; whitespace:no-wrap;" contentEditable="true"> Titre H3 </div>';
var text_snippet_p = '<div class="slidelement slidelementh1" id="slidelement_id" data-parent="impress_slide__slidenumber__" data-type="p" style=" font-size: 20px; width:auto; height:60px; position:absolute; left:300px; top:50px; whitespace:no-wrap;" contentEditable="true"> Paragraphe </div>';


var saved_presentations = '<div class="saved-presos">' +
 								'<div class="presothumbcontent">' +
 								'<h3 style="display:inline-block; color:#2980B9" contentEditable="true"> __presotitle__</h3>'+
 								'<p style="font-size: 120%" contentEditable="true">__presodescription__</p>'+
 								'</div>'+
 								'<div class="presothumb" >'+
         							'<a href="#"  data-id="__presoid__" class="btn btn-inline btn-primary openpresobtn" style="position:absolute; right: 10px; top: 10px"><i class="fas fa-eye"></i></i></a>' +
 									'<a href="#"  data-id="__presoid__" class="btn btn-inline btn-danger deletepresobtn" style="position:absolute; right: 60px; top: 10px"><i class="fas fa-trash-alt"></i></a></br>'+
 								'</div>' +
 							'</div>';



var tableau_previsualisation = "<table class=\"table table-responsive tableau-previsualisation\" align=\"center\"  style=\"width: auto;\">\n" +
															"  <tbody id=\"tableau-body\">\n" +
															"  <tr>\n" +
															"    <td contenteditable=\"true\">Case</td>\n" +
															"  </tr>\n" +
															"  <tr>\n" +
															"    <td contenteditable=\"true\">Case</td>\n" +
															"  </tr>\n" +
															"  </tbody>\n" +
															"</table>";


var video_template = "<iframe class=\"preview-video\" width=\"468\" height=\"315\" frameborder=\"0\" " +
	"														allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\">" +
	"											</iframe>";


var graphique_previsualisation= "<canvas id=\"preview-graphique\" width=\"400\" height=\"400\" style=\"background-color: white;\"></canvas>";