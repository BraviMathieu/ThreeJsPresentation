
Presentation = function()
{
	this.menuopen = false;
	this.currentview = "mainarea";
	this.selectedElement;
	this.clonedElement;
	this.selectedSlide;
	this.orchestrationcoords = [];
	this.selectedOrchElement;
	this.lastslideleftpos = 0;
	this.saveKey = "impressionist_decks";
	this.lastSaved = "impressionist_lastsaved";
	this.currentPresentation;
	this.mypresentations = [];
	this.mode = "create";
	this.theme = "montserrat";

	this.dropdownopen = false;
	this.selectedforedit = false;

	this.isBold = false;
	this.isItalic = false;
	this.isUnderlined = false;
	this.isAlignedLeft = false;
	this.isAlignedCenter = false;
	this.isAlignedRight = false;

	 this.vxmax = 6000;
	//Viewport x min
	this.vxmin = -6000;
	//Viewport y max
	this.vymax = 6000;
	//Viewport y min
	this.vymin = -6000;
	//Window x max
	this.wxmax = 960;
	//Window x min
	this.wxmin = 0;
	//Window y max
	this.wymax = 630;
	//Window y min
	this.wymin = 0;

}
Presentation.prototype =
{
	initialize  : function()
	{
		me = this;
		me.continueInit();
	},
	continueInit : function()
	{
			me.setupColorpicker();
			me.setupMenuItemEvents();
			me.enableSort();
			me.setupPopover();
			me.setupDials();	
			me.setupKeyboardShortcuts();	
			me.hideTransformControl();
			presentations = me.getSavedPresentations();
			me.renderPresentations( presentations );
			me.openLastSavedPresentation();
			me.switchView("right");
		
	},
	openLastSavedPresentation : function()
	{
		presentation = JSON.parse(me.getItem(me.lastSaved));
		console.log("lastsaved", presentation);
		if(!presentation)
		{
			savedpresos = JSON.parse(me.getItem(me.saveKey));

			if(savedpresos && savedpresos.length > 0)
				$("#savedpresentationsmodal").modal("show");
			else
				me.openNewPresentationWindow();
		}
		else
		{
			me.currentPresentation = presentation;
			console.log("Retrieved id: ", me.currentPresentation);
			me.theme = presentation.theme;
			me.openPresentationForEdit( me.currentPresentation.id );
			me.applyStyle();
		}
	},
	openNewPresentationWindow : function()
	{
		$("#newpresentationmodal").modal();
	},
	renderPresentations : function ( presentations )
	{	
		me.mypresentations = presentations;
		$("#savedpresentations").html("<h3 style='display:inline-block; color:#2980B9; font-size:120%'> Vous n'avez aucune présentation sauvegardées. </h3>");
		if(presentations.length > 0)
		{
			$("#savedpresentations").html("");
		}
		for(var i=0; i<presentations.length; i++)
		{
			presentation = presentations[i];
			templ = saved_presentations;
			templ = templ.split("__presotitle__").join(presentation.title);
			templ = templ.split("__presodescription__").join(presentation.description);
			templ = templ.split("__presoid__").join(presentation.id);
			$("#savedpresentations").append(templ);
		}
		$(".savedpresos").on("mouseover", function()
		{
			$(this).find(".presothumb").removeClass("idle");

		}).on("mouseout", function()
		{
			$(this).find(".presothumb").addClass("idle");
		});
		$(".deletepresobtn").on("click", function()
		{
			if(confirm("Êtes-vous sûr de vouloir supprimer cette présentation ?"))
				me.deleteSavedPresentation( $(this).attr("data-id") );
		})
	},
	hideTransformControl : function()
	{
		$("#play").css("display", "none");
	},
	setupKeyboardShortcuts : function()
	{
		key('⌘+c, ctrl+c', function(event, handler)
		{
				console.log(handler.shortcut, handler.scope);
				me.cloneElement();
		});
		key('⌘+v, ctrl+v', function(event, handler)
		{
				console.log(handler.shortcut, handler.scope);
				me.appendClonedElement();
		});
		key.setScope("issues");
	},
	cloneElement : function()
	{
		if(me.selectedElement)
		{
			clone = me.selectedElement.clone();
			clone.attr("id", "slideelement_"+me.generateUID());
			clone.css("left", me.selectedElement.position().left + 20+"px");
			clone.css("top", me.selectedElement.position().top + 20+"px");
			me.clonedElement = clone;
		}
	},
	appendClonedElement : function()
	{
		console.log(me.clonedElement, "clonedelement");
		me.selectedSlide.append(me.clonedElement);
		me.enableDrag();
	},
	setupMenuItemEvents : function()
	{
		$("#makebold").on("click", function(e)
		{
			e.stopPropagation();
			if(!me.isBold && me.selectedElement)
			{
				me.selectedElement.css("fontWeight", "bold");
				me.selectedElement.attr("data-isbold", true);
				$(this).addClass("active");
				me.isBold = true;
			}
			else if(me.isBold && me.selectedElement)
			{
				me.selectedElement.css("fontWeight", "normal");
				me.selectedElement.attr("data-isbold", false);
				$(this).removeClass("active");
				me.isBold = false;
			}
		});
		$("#makeitalic").on("click", function(e)
		{
			e.stopPropagation();
			$(this).removeClass("active");
			if(!me.isItalic && me.selectedElement)
			{
				me.selectedElement.css("fontStyle", "italic");
				me.selectedElement.attr("data-isitalic", true);
				$(this).addClass("active");
				me.isItalic = true;
			}
			else if(me.isItalic && me.selectedElement)
			{
				me.selectedElement.css("fontStyle", "normal");
				me.selectedElement.attr("data-isitalic", false);
				$(this).removeClass("active");
				me.isItalic = false;
			}
		});
		$("#makeunderline").on("click", function(e)
		{
			e.stopPropagation();
			$(this).removeClass("active");
			if(!me.isUnderlined && me.selectedElement)
			{
				me.selectedElement.css("text-decoration", "underline");
				me.selectedElement.attr("data-isunderline", true);
				$(this).addClass("active");
				me.isUnderlined = true;
			}
			else if(me.isUnderlined && me.selectedElement)
			{
				me.selectedElement.css("text-decoration", "none");
				me.selectedElement.attr("data-isunderline", false);
				$(this).removeClass("active");
				me.isUnderlined = false;
			}
		});
		$("#makealignleft").on("click", function(e)
		{
			e.stopPropagation();
			$(this).removeClass("active");
			if(!me.isAlignedLeft && me.selectedElement)
			{
				me.selectedElement.css("text-align", "left");
				me.selectedElement.attr("data-isalignleft", true);
				me.selectedElement.attr("data-isaligncenter", false);
				me.selectedElement.attr("data-isalignright", false);
				$(this).addClass("active");
				$("#makealigncenter").removeClass("active");
				$("#makealignright").removeClass("active");
				me.isAlignedLeft = true;
				me.isAlignedCenter = false;
				me.isAlignedRight = false;
			}
			else if(me.isAlignedLeft && me.selectedElement)
			{
				me.selectedElement.css("text-align", "left");
				me.selectedElement.attr("data-isalignleft", false);
				me.selectedElement.attr("data-isaligncenter", false);
				me.selectedElement.attr("data-isalignright", false);
				$(this).removeClass("active");
				$("#makealigncenter").removeClass("active");
				$("#makealignright").removeClass("active");
				me.isAlignedLeft = false;
				me.isAlignedCenter = false;
				me.isAlignedRight = false;
			}
		});
		$("#makealigncenter").on("click", function(e)
		{
			e.stopPropagation();
			$(this).removeClass("active");
			if(!me.isAlignedCenter && me.selectedElement)
			{
				me.selectedElement.css("text-align", "center");
				me.selectedElement.attr("data-isalignleft", false);
				me.selectedElement.attr("data-isaligncenter", true);
				me.selectedElement.attr("data-isalignright", false);
				$("#makealignleft").removeClass("active");
				$(this).addClass("active");
				$("#makealignright").removeClass("active");
				me.isAlignedLeft = false;
				me.isAlignedCenter = true;
				me.isAlignedRight = false;
			}
			else if(me.isAlignedCenter && me.selectedElement)
			{
				me.selectedElement.css("text-align", "left");
				me.selectedElement.attr("data-isalignleft", false);
				me.selectedElement.attr("data-isaligncenter", false);
				me.selectedElement.attr("data-isalignright", false);
				$("#makealignleft").removeClass("active");
				$(this).removeClass("active");
				$("#makealignright").removeClass("active");
				me.isAlignedLeft = false;
				me.isAlignedCenter = false;
				me.isAlignedRight = false;
			}
		});
		$("#makealignright").on("click", function(e)
		{
			e.stopPropagation();
			$(this).removeClass("active");
			if(!me.isAlignedRight && me.selectedElement)
			{
				me.selectedElement.css("text-align", "right");
				me.selectedElement.attr("data-isalignleft", false);
				me.selectedElement.attr("data-isaligncenter", false);
				me.selectedElement.attr("data-isalignright", true);
				$("#makealignleft").removeClass("active");
				$("#makealigncenter").removeClass("active");
				$(this).addClass("active");
				me.isAlignedLeft = false;
				me.isAlignedCenter = false;
				me.isAlignedRight = true;
			}
			else if(me.isAlignedRight && me.selectedElement)
			{
				me.selectedElement.css("text-align", "left");
				me.selectedElement.attr("data-isalignleft", false);
				me.selectedElement.attr("data-isaligncenter", false);
				me.selectedElement.attr("data-isalignright", false);
				$("#makealignleft").removeClass("active");
				$("#makealigncenter").removeClass("active");
				$(this).removeClass("active");
				me.isAlignedLeft = false;
				me.isAlignedCenter = false;
				me.isAlignedRight = false;
			}
		});

	},
	enableSort : function()
	{
		$(".slidethumbholder").sortable( { update : function( event, ui)
			{
				console.log("sort updated", event, ui);
				me.assignSlideNumbers();
				me.reArrangeImpressSlides();
			}} );
		//$(".slidethumbholder").disableSelection();
	},
	reArrangeImpressSlides : function()
	{
		children = $(".slidethumbholder").children();
		var clonedElements = [];
		for(var i=0; i<children.length; i++)
		{
			child = children[i];
			console.log("Rearrange child", child.id);
			id = (child.id).split("_")[1];
			el = $("#impress_slide_"+id);
			clonedElements.push( el );
		}
		$(".impress-slide-container").html("");
		for(var j=0; j< clonedElements.length; j++)
		{
			console.log("el", clonedElements[j]);
			$(".impress-slide-container").append(clonedElements[j]);
		}
		me.enableDrag();
	},
	setupDials : function()
	{
		$("#rotationknob").knob({change : function(v)
		{
			me.rotateElement(v);
		}});
		$("#skewxknob").knob({change : function(v)
		{
			me.rotateElementX(v);
		}});
		$("#skewyknob").knob({change : function(v)
		{
			me.rotateElementY(v);
		}});
		$("#scalerange").on("change", function(e)
		{
			console.log("moving scale", $(this).val());
			me.selectedOrchElement.attr("data-scale", $(this).val());
			let id = me.selectedOrchElement.attr("id").split("_")[1];
			$("#slidethumb_"+id).attr("data-scale", $(this).val());
		});
		$("#depthrange").on("change", function(e)
		{
			me.selectedOrchElement.attr("data-z", $(this).val());
			let id = me.selectedOrchElement.attr("id").split("_")[1];
			$("#slidethumb_"+id).attr("data-z", $(this).val());
		});
		$(".transformlabel").css("vertical-align", "top")

	},
	rotateElement : function(value)
	{
		//me.selectedOrchElement.css("transform-origin", "0 0");
		
		rotx = me.selectedOrchElement.attr("data-rotate-x");
		roty = me.selectedOrchElement.attr("data-rotate-y");
		let s = "";
		if(rotx != undefined)
			s += "rotateX("+rotx+"deg)";
		if(roty != undefined)
			s += "rotateY("+roty+"deg)";

		let str = s + " rotate("+value+"deg)";
		me.selectedOrchElement.css("transform", str);
		me.selectedOrchElement.attr("data-rotate", value);

		let id = me.selectedOrchElement.attr("id").split("_")[1];

		$("#slidethumb_"+id).attr("data-rotate-x", rotx);
		$("#slidethumb_"+id).attr("data-rotate-y", roty);
		$("#slidethumb_"+id).attr("data-rotate", value);

		$("#slidethumb_"+id).attr("data-transform-string", str);
	},
	rotateElementX : function(value)
	{
		roty = me.selectedOrchElement.attr("data-rotate-y");
		let s = "";
		if(roty != undefined)
			s += "rotateY("+roty+"deg)";

		let str = s + " rotateX("+value+"deg)";
		me.selectedOrchElement.css("transform", str);
		me.selectedOrchElement.attr("data-rotate", value);
		me.selectedOrchElement.attr("data-rotate-x", value);

		let id = me.selectedOrchElement.attr("id").split("_")[1];

		$("#slidethumb_"+id).attr("data-rotate-x", value);
		$("#slidethumb_"+id).attr("data-rotate-y", roty);
		$("#slidethumb_"+id).attr("data-rotate", rot);
		$("#slidethumb_"+id).attr("data-transform-string", str);
	},
	rotateElementY : function(value)
	{
		rotx = me.selectedOrchElement.attr("data-rotate-x");
		let s = "";
		if(rotx != undefined)
			s += "rotateX("+rotx+"deg)";

		let str = s + " rotateY("+value+"deg)";
		me.selectedOrchElement.css("transform", str);
		me.selectedOrchElement.attr("data-rotate", value);
		me.selectedOrchElement.attr("data-rotate-y", value);

		let id = me.selectedOrchElement.attr("id").split("_")[1];

		$("#slidethumb_"+id).attr("data-rotate-x", rotx);
		$("#slidethumb_"+id).attr("data-rotate-y", value);
		$("#slidethumb_"+id).attr("data-rotate", rot);
		$("#slidethumb_"+id).attr("data-transform-string", str);
	},
	setupPopover : function()
	{
		$(".slidelement").popover({html:"hello world",placement:"bottom", trigger:"click"});
	},
	enableDrag : function()
	{
		$(".slidelement").draggable().on("dblclick", function(e)
		{
			e.stopPropagation();
			$(this).draggable({disabled : false});
			$("#play").css("display", "none");
			$(this).removeClass("movecursor");

		}).on("click", function (e)
		{
			e.stopPropagation();
			$(this).draggable({disabled : true});
			$(".slidelement").removeClass("elementselected");
			me.selectElement( $(this));
			me.selectedforedit = true;
			me.setMenuControlValues($(this));
			me.positionTransformControl()
		}).on("mousedown mouseover", function()
		{
			$(this).addClass("movecursor")
		}).on("mouseup", function()
		{
			console.log("mouse upping", me.selectedSlide );
			me.generateScaledSlide( me.selectedSlide );
		})
	},
	positionTransformControl : function()
	{
		let _transform = me.selectedElement.css("-webkit-transform");
		$("#play").css("-webkit-transform", _transform);
		$("#play").css("display", "block");
		$("#play").width ( me.selectedElement.width());
		$("#play").css("left",   me.selectedElement.position().left+"px");
		$("#play").css("top", 	 me.selectedElement.position().top+"px");

		$("#spandelete").on("click", function(e)
		{
			e.stopPropagation();
			me.selectedElement.remove();
			$("#play").css("display", "none");
		})
	},
	setMenuControlValues : function(el)
	{
		var isbold 					= ( el.attr("data-isbold") == "true");
		var isitalic 				= ( el.attr("data-isitalic")  == "true");
		var isunderline 		= ( el.attr("data-isunderline")  == "true");
		var isalignleft 		= ( el.attr("data-isalignleft")  == "true");
		var isaligncenter 	= ( el.attr("data-isaligncenter")  == "true");
		var isalignright 		= ( el.attr("data-isalignright")  == "true");

		if(isbold)
			$("#makebold").addClass("active");
		else
			$("#makebold").removeClass("active");


		if(isitalic)
			$("#makeitalic").addClass("active");
		else
			$("#makeitalic").removeClass("active");


		if(isunderline)
			$("#makeunderline").addClass("active");
		else
			$("#makeunderline").removeClass("active");


		if(isalignleft)
			$("#makealignleft").addClass("active");
		else
			$("#makealignleft").removeClass("active");


		if(isaligncenter)
			$("#makealigncenter").addClass("active");
		else
			$("#makealigncenter").removeClass("active");


		if(isalignright)
			$("#makealignright").addClass("active");
		else
			$("#makealignright").removeClass("active");

	},
	resetMenuControlValues : function()
	{
		$(".menubtn").removeClass("active");
	},
	selectElement : function(el)
	{
		me.selectedElement = el;
	},
	setupColorpicker : function()
	{
		$('#cp15').colorpicker().on('colorpickerChange', function (e){
			var io = e.colorpicker.element.find('.color-io');
			if(e.value === io.val() || !e.color || !e.color.isValid()){
				return;
			}
			io.val(e.color.string());
			let couleur = $("#cp15").val();
			me.colorSelectedElement(couleur);
			});
	},
	addSettingsPanel : function()
	{
		$(".settingsbox").html(newpresotemplate);
		this.removelisteners();
		this.attachListeners();
	},
	manageGlobalClick : function()
	{
		$(".slidelement").draggable({disabled : false});
		$("#play").css("display", "none");
		me.generateScaledSlide(me.selectedSlide);
		me.selectedforedit = false;
		me.resetMenuControlValues();
	},
	colorSelectedElement : function(color)
	{
		if(me.selectedElement)
			me.selectedElement.css("color", color);
	},
	addSlide : function()
	{
		let thumb = slidethumb;
		let uid = me.generateUID();
		thumb = thumb.split("slidethumb_^UID^").join("slidethumb_"+uid);
		$(".slidethumbholder").append( thumb );
		$("#slidethumb_"+uid).animate({opacity:1}, 200);


		$("#slidethumb_"+uid).attr("data-left", me.lastslideleftpos+"px");
		$("#slidethumb_"+uid).attr("data-top", "0px");
		$(".deletebtn").on("click", function()
		{
			let p = $("#"+ $(this).attr("data-parent"));
			let slideid = $(this).attr("data-parent").split("_")[1];
			p.animate({opacity:0}, 200, function()
			{
				$(this).remove();
				$("#impress_slide_"+slideid).remove();
				me.assignSlideNumbers();
			})
		});
		$(".slidemask").on("click", function(e)
		{
			e.stopPropagation();
			let id = (e.target.id).split("_")[1];
			me.selectSlide( "#impress_slide_"+id );
			$(".slidethumb").removeClass("currentselection");
			$("#slidethumb_"+id).addClass("currentselection");
			me.hideTransformControl();
			me.switchView("right");
		});
		me.lastslideleftpos += 200;
		me.assignSlideNumbers();
		me.addImpressSlide( uid );
		me.switchView( "right" );
		$("#presentationmetatitle").html($("#titleinput").val());

	},
	addImpressSlide : function(id)
	{
		let islide = impress_slide;
		islide = islide.split("__slidenumber__").join("_"+id);
		islide = islide.split("slidelement_id").join("slidelement_"+me.generateUID());
		$(".impress-slide-container").append( islide );
		$("#impress_slide_"+id).addClass("impress-slide-element");
		me.removeAllStyles($("#impress_slide_"+id));
		me.applyStyle();
		me.selectSlide("#impress_slide_"+id);
		me.enableDrag();
		me.generateScaledSlide("#impress_slide_"+id);
	},
	addImpressSlideItem : function (el)
	{
		console.log("adding the new item....");
		let typeText = $("#dropdownMenu1").val();
		let item ="";

		switch (typeText){
			case 'Titre 1':
				item = text_snippet_h1;
				break;
			case 'Titre 2':
				item = text_snippet_h2;
				break;
			case 'Titre 3':
				item = text_snippet_h3;
				break;
			case 'Paragraphe':
				item = text_snippet_p;
				break;
			default:
				item = text_snippet;
				break;
		}

		item = item.split("slidelement_id").join("slidelement_"+me.generateUID());
		$(el).append(item);
		me.enableDrag();
		me.generateScaledSlide(me.selectedSlide);
	},
	generateScaledSlide : function(el)
	{
		let newel = $(el).clone();
		let id = newel.attr("id").split("_")[2];
		let children = $("#slidethumb_"+id).children();

		newel.attr("id", "clonethumb_"+id);
		newel.attr("data-clone", true);
		newel.css("-webkit-transform", "scale(0.18, 0.18)");
		newel.removeClass("impress-slide-element");
		newel.css("left", "-110px");
		newel.css("top", "-75px");

		for(var i=0; i<children.length; i++)
		{
			child = children[i];
			if($(child).attr("data-clone") == "true")
			{
				$(child).remove();
			}
		}

		$("#slidethumb_"+id).append( newel );
	},
	selectSlide : function(id)
	{
		let children = $(".impress-slide-container").children();

		for(var i=0; i< children.length; i++)
		{
			child = children[i];
			childid = "#"+child.id;
			if(childid == id)
			{
				$(childid).css("z-index", 1);
				me.selectedSlide = $(childid);
			}
			else
			{
				console.log("did not find", childid);
				$(childid).css("z-index", -200 + (-(Math.round(Math.random()*1000))));
			}
		}
	},
	assignSlideNumbers : function()
	{
		let children = $(".slidethumbholder").children();
		let count = 0;

		for(let i = 0; i< children.length; i++)
		{
			child = $(children[i]);
			count = i;

			$("#"+child[0].id).find(".slidedisplay").html("Slide "+(++count))
		}
	},
	generateUID: function ()
	{
		return Math.round(Math.random()*10000);
	},
	animateSettingsPanel : function (direction)
	{
		if(direction == "left")
		{
			$(".settingsbox").animate({"left": "-500px", "opacity": 0}, { duration: 300, easing: "linear" });
			me.menuopen = false;
		}
		if(direction == "right")
		{
			$(".settingsbox").animate({"left": "230px", "opacity":1}, {duration: 300, easing: "linear" });
			me.menuopen = true;
		}
	},
	assembleOrchestrationTiles : function()
	{
		$(".orchestrationviewport").html("");
		let orchestrationElements = [];

		let children = $(".slidethumbholder").children();
		let l = 10;

		for(let i=0 ; i<children.length; i++)
		{
			child = children[i];
			clone = $(child).clone();
			clone.removeClass("slidethumb");
			clone.addClass("orchthumb");
			clone.attr("id", "orchestrationelement_"+$(child).attr("id").split("_")[1]);
			clone.css("opacity", 1);
			clone.css("position", "absolute");
			clone.css("transform", clone.attr("data-transform-string"));

			clone.find(".deletebtn").remove();
			clone.draggable().on("mouseup", function()
			{
					$(this).attr("data-left",$(this).css("left"));
					$(this).attr("data-top",$(this).css("top"));
					console.log("accessing ", $(this).attr("id"));
					id = $(this).attr("id").split("_")[1];

					$("#slidethumb_"+id).attr("data-left",$(this).css("left"));
					$("#slidethumb_"+id).attr("data-top",$(this).css("top"));

			});
			clone.on("click", function()
			{
				$(".orchthumb").removeClass("currentselection");
				$(this).addClass("currentselection");
				me.selectedOrchElement = $(this);

				rot = me.selectedOrchElement.attr("data-rotate");
				rotx = me.selectedOrchElement.attr("data-rotate-x");
				roty = me.selectedOrchElement.attr("data-rotate-y");
				scale = me.selectedOrchElement.attr("data-scale");
				depth = me.selectedOrchElement.attr("data-z");

				$("#rotationknob").val(rot || 0).trigger("change");
				$("#skewxknob").val(rotx || 0).trigger("change");
				$("#skewyknob").val(roty || 0).trigger("change");
				$("#scalerange").val( scale || 1 );
				$("#depthrange").val( depth || 1000 );
			});
			$(".orchestrationviewport").append(clone);
			orchestrationElements.push( clone );

			l += 200;
		}
		me.repositionOrchestrationElements(orchestrationElements);
	},
	repositionOrchestrationElements : function( arr )
	{
		let children = $(".slidethumbholder").children();
		console.log("Current slide count", children.length, "Orchestration el count", arr.length);
		for(let i=0 ; i < arr.length; i++)
		{
			console.log("Props", $(children[i]).attr("data-left"), $(children[i]).attr("data-top"));
			arr[i].css("left", $(children[i]).attr("data-left"));
			arr[i].css("top", $(children[i]).attr("data-top"));
		}
	},
	switchView : function( direction )
	{
		if(direction == "left")
		{
			$(".maingreyarea").css("display", "none");
			$(".orchgreyarea").css("display", "block");
			$("#viewtoggleicon").removeClass("icon-th-large");
			$("#viewtoggleicon").addClass("fui-cross-24");
			me.currentview = "orchestration";
			me.assembleOrchestrationTiles();
		}
		else
		{
			$(".maingreyarea").css("display", "block");
			$(".orchgreyarea").css("display", "none");
			$("#viewtoggleicon").removeClass("fui-cross-24");
			$("#viewtoggleicon").addClass("icon-th-large");
			me.currentview = "mainarea";
			me.persistOrchestrationCoordinates();
		}
	},
	persistOrchestrationCoordinates : function()
	{
		let children = $(".orchestrationviewport").children();
		me.orchestrationcoords = [];
		for(let i=0; i<children.length; i++)
		{
			child = $(children[i]);
			l = child.attr("data-left");
			t = child.attr("data-top");
			console.log("Child", i, l, t);
			me.orchestrationcoords.push( {left: l, top: t});
		}
	},
	onViewToggled : function ()
	{
		if(me.currentview == "mainarea")
			me.switchView( "left");
		else
			me.switchView( "right");
	},
	changeTextFormat : function(classname)
	{
		if(me.selectedforedit)
		{
			me.removeTextFormatting();
			me.selectedElement.addClass(classname);
		}
	},
	removeTextFormatting : function()
	{
		me.selectedElement.removeClass("slidelementh1");
		me.selectedElement.removeClass("slidelementh3");
	},
	openCodeExportWindow : function()
	{
		me.generateExportMarkup();
		$('pre code').each(function(i, e) {hljs.highlightBlock(e)});
		$("#exportcodemodal").modal("show");
	},
	attachListeners : function()
	{
		$("html").on("click", me.manageGlobalClick);
		$(".settingsCancelBtn").on("click", me.onSettingsCancelClicked);
		$("#newpresopanel").on("click", me.onMenuItemClicked);
		$("#neworchestratepanel").on("click", me.onViewToggled);
		$(".slidelement").on("click", me.triggetElementEdit);
		$(".slidelement").on("mouseup", me.createEditor);
		$("#newstylepanel").on("click", me.openStyleSelector);
		$("#exportpresopanel").on("click", me.openCodeExportWindow);
		$("#editpresonamebtn").on("click", function(e)
		{
			$("#newpresentationmodal").modal("show");
			$("#newpresoheader").html("Enregistrer la présentation sous...");
			$("#titleinput").val( me.currentPresentation.title);
			$("textarea#descriptioninput").val( me.currentPresentation.description);
			me.mode = "save";
		});
		$(".previewpresobtn").on("click", function()
		{
			console.log("data parent id", $(this).attr("data-id"));
			me.fetchAndPreview($(this).attr("data-id"))
		});
		$(".openpresobtn").on("click", function()
		{
			me.mode = "save";
			me.openPresentationForEdit($(this).attr("data-id"));
		});
		$("#createpresentation").on("click", function()
		{
			if(me.mode == "create")
				me.createNewPresentation();
			else
				me.savePresentation();
		});
		$("#savepresentationbtn").on("click", function()
		{
			if(me.currentPresentation)
			{
				$("#titleinput").val( me.currentPresentation.title);
				$("textarea#descriptioninput").val( me.currentPresentation.description);
			}
			me.mode = "save";
			me.savePresentation();
		});
		$("#openpreviewbtn").on("click", function(e)
		{
			window.open("http://harish.io/impressionist/viewer.php", "_blank");
			$("#previewmodal").modal("hide");
		});
		$(".dropdownitem").on("click", function(e)
		{
			me.changeTextFormat($(e.target).attr("data-dk-dropdown-value"));
			$(".dropdownpopup").css("display", "block");
			$(".pulldownmenu").html($(e.target).html());
			me.dropdownopen = true;
			me.hideTransformControl();
		});
		$("#addtextbtn").on("click", function ()
		{
			me.addImpressSlideItem(me.selectedSlide);
		});
		$("#addimagebtn").on("click", function()
		{
			$("#imagemodal").modal("show");
		});
		$("#addvideobtn").on("click", function()
		{
			$("#videomodal").modal("show");
		});
		$("#addobjectbtn").on("click", function()
		{
			$("#objectselectionmodal").modal("show");
		});
		$("#imageinput").on("blur keyup", function()
		{
			let image = $(this).val();
			$("#previewimg").attr("src", image);
		});
		$("#videoinput").on("blur keyup", function()
		{
			let video = $(this).val();
			video = video.replace("watch?v=","embed/");
			$("#previewvideo").attr("src", video);
		});
		$("#addslidebtn").on("click", function()
		{
			me.addSlide();
		});
		$("#appendimagebtn").on("click", function()
		{
			let image = $("#previewimg").attr("src");
			me.addImageToSlide(image);
			$("#imagemodal").modal("hide");
		});
		$("#appendvideobtn").on("click", function()
		{
			let video = $("#previewvideo").attr("src");
			video = video.replace("watch?v=","embed/");
			me.addVideoToSlide(video);
			$("#videomodal").modal("hide");
		});
		$("#openpresentationsbtn").on("click", function()
		{
			$(".previewpresobtn").on("click", function()
			{
				console.log("data parent id", $(this).attr("data-id"));
				me.fetchAndPreview($(this).attr("data-id"))
			});
			$(".openpresobtn").on("click", function()
			{
				console.log("Edit presentation");
				me.mode = "save";
				me.openPresentationForEdit($(this).attr("data-id"));
			});
			$("#savedpresentationsmodal").modal("show");
		});
		$("#exportcontentbtn").on("click", function()
		{
			me.generateExportMarkup(true);

		
		});
		$(".stylethumbnail").on("click", function()
		{
			$(".stylethumbnail").css("border-bottom", "1px dotted #DDD");
			$(this).css("border-bottom", "2px solid #6f2232");
			me.theme = $(this).attr("data-style");
		});
		$("#applystylebtn").on("click", function()
		{
			me.applyStyle();
			$("#styleselectionmodal").modal("hide");
		});

		$(".objectthumbnail").on("click", function()
		{
			$(".objectthumbnail").css("border-bottom", "1px dotted #DDD");
			$(this).css("border-bottom", "2px solid #1ABC9C");
			objet =  $(this).attr('data-nom');
		})
		$("#applyobjectbtn").on("click", function()
		{
            console.log("append object to stage");
            me.addObjectToSlide(objet);
            $("#objectselectionmodal").modal("hide");
		})

		$("#importobject").on("click", function(e)
		{
			$("#importobjetmodal").modal("show");
		});
	},
	applyStyle : function()
	{
		$(".slidelement").each( function(i, object)
			{
				if($(this).hasClass("slidelementh1"))
				{
					me.removeAllStyles( $(this));
					$(this).addClass(me.theme);
				}
			})
	},
	removeAllStyles : function(el)
	{
		el.removeClass("quicksand");
		el.removeClass("montserrat");
		el.removeClass("sketch");
		el.removeClass("miltonian");
	},
	openStyleSelector : function()
	{
		$("#styleselectionmodal").modal("show");
	},
	deleteSavedPresentation : function(id)
	{
		presentations = JSON.parse(me.getItem(me.saveKey));
		for(var i=0; i< presentations.length; i++)
		{
			presentation = presentations[i];
			if(id == presentation.id)
			{
				presentations.splice(i, 1);
				break;
			}
		}
		console.log("after delete", presentations);
		me.saveItem(me.saveKey, JSON.stringify(presentations));
		presentations = me.getSavedPresentations();
		me.renderPresentations( presentations );
		lastsaved = JSON.parse(me.getItem(me.lastSaved));
		if(lastsaved.id == id)
		{
			console.log("lastsaved", lastsaved.id);
			localStorage.removeItem(me.lastSaved);
		}
	},
	generateExportMarkup : function(isPreview)
	{
		let children = $(".slidethumbholder").children();
			for(let i=0; i<children.length; i++)
			{
				child = $(children[i]);
				id = child.attr("id").split("_")[1];
				l = child.attr("data-left").split("px")[0];
				t = child.attr("data-top").split("px")[0];

				coords = me.calculateSlideCoordinates(l,t);
				el = $("#impress_slide_"+id);
				el.attr("data-x", coords.x - 500);
				el.attr("data-y", coords.y);
				el.attr("data-rotate", child.attr("data-rotate"));
				el.attr("data-rotate-x", child.attr("data-rotate-x"));
				el.attr("data-rotate-y", child.attr("data-rotate-y"));
				el.attr("data-z", child.attr("data-z"));
				el.attr("data-scale", child.attr("data-scale"));
				el.addClass("step");
			}
			let outputcontainer = $(".impress-slide-container").clone();
			outputcontainer.find(".impress-slide").each( function(i, object)
			{
				$(this).css("width", "1024px");
				$(this).css("height", "768px");
			});

			if(isPreview)
				me.generatePreview(outputcontainer.html().toString());
			
			$("#exportedcode").text(outputcontainer.html().toString());
	},
	createNewPresentation : function()
	{
		$(".slidethumbholder").html("");
		$(".impress-slide-container").html();
		me.addSlide();
		me.savePresentation();
	},
	openPresentationForEdit : function(id)
	{
		for(let i=0; i<me.mypresentations.length; i++)
		{
			presentation = me.mypresentations[i];
			if(id == presentation.id)
			{
				$(".impress-slide-container").html(presentation.contents);
				$(".slidethumbholder").html(presentation.thumbcontents);
				$(".slidethumbholder").each( function(i, object)
				{
					$(this).css("opacity", 1);
				});

				me.selectedSlide = $(".impress-slide-container").find(".impress-slide-element");
				me.currentPresentation = presentation;
				$("#presentationmetatitle").html(me.currentPresentation.title);
				console.log("rendered");
			}

			$("#savedpresentationsmodal").modal("hide");
		}
		$(".slidemask").on("click", function(e)
		{
			console.log("repopulated zone");
			e.stopPropagation();
			id = (e.target.id).split("_")[1];
			console.log("slidemask", id);
			me.selectSlide( "#impress_slide_"+id );
			$(".slidethumb").removeClass("currentselection");
			$("#slidethumb_"+id).addClass("currentselection");
			me.hideTransformControl();
			me.switchView("right");
		});
		$(".deletebtn").on("click", function (e)
		{
			p = $("#"+ $(this).attr("data-parent"));
			slideid = $(this).attr("data-parent").split("_")[1];
			console.log("parent", p, slideid);
			p.animate({opacity:0}, 200, function(e)
			{
				$(this).remove();
				$("#impress_slide_"+slideid).remove();
				me.assignSlideNumbers();
			})
		});
		me.enableDrag();
	},
	fetchAndPreview : function(id)
	{
		for(var i=0; i<me.mypresentations.length; i++)
		{
			presentation = me.mypresentations[i];
			if(id == presentation.id)
			{
				console.log("content", presentation.contents);
				$(".placeholder").html( presentation.contents);
				$(".placeholder").find(".impress-slide").each( function(i, object)
				{
					console.log("Physically adding sizing information, again");
					$(this).css("width", "1024px");
					$(this).css("height", "768px");
					$(this).addClass("step");
				});
				me.generatePreview($(".placeholder").html().toString());
				$("#savedpresentationsmodal").modal("hide");
				break;
			}
		}
	},
	savePresentation : function()
	{
			$("#savepresentationbtn").html('<div class="sb-nav-link-icon"><i class=\"fas fa-save\"></i></div>Sauvegarde en cours...');
			let item = me.getItem(me.saveKey);
			if(item)
			{
				arr = JSON.parse(item);
				if(this.mode == "save")
				{
					if(me.currentPresentation)
						arr = me.removeReference(arr);
				}
			}
			else
				arr = [];

			if(this.mode == "save")
			{
				if(me.currentPresentation)
					tempid = me.currentPresentation.id;
				else
					tempid = Math.round(Math.random() * 201020);
			}
			else
				tempid = Math.round(Math.random() * 201020);

			let o = {
				id : tempid,
				title: $("#titleinput").val(),
				description: $("textarea#descriptioninput").val(),
				contents : $(".impress-slide-container").html().toString(),
				thumbcontents : $(".slidethumbholder").html().toString(),
				theme : me.theme
			};

			me.currentPresentation = o;
			$("#presentationmetatitle").html(me.currentPresentation.title);
			arr.push( o );
			me.saveItem(me.saveKey, JSON.stringify(arr));
			me.saveItem(me.lastSaved, JSON.stringify(o));
			presentations = me.getSavedPresentations();
			presentations.reverse();
			me.renderPresentations( presentations );

			$(".previewpresobtn").on("click", function(e)
			{
				me.fetchAndPreview( $(this).attr("data-id") )
			});
			$(".openpresobtn").on("click", function(e)
			{
				me.mode = "save";
				me.openPresentationForEdit( $(this).attr("data-id") );
			});
			$("#newpresentationmodal").modal("hide");
			setTimeout(me.resetSaveButtonText, 1000)
	},
	resetSaveButtonText : function()
	{
		$("#savepresentationbtn").html('<div class="sb-nav-link-icon"><i class=\"fas fa-check-circle\"></i></div>Sauvegarde réussie!');
		setTimeout(function(){ $("#savepresentationbtn").html('<div class="sb-nav-link-icon"><i class=\"fas fa-save\"></i></div>Sauvegarder'); }, 1000);
	},
	removeReference : function( arr )
	{
		for(var i=0; i<arr.length; i++ )
		{
			if(arr[i].id == me.currentPresentation.id)
			{
				arr.splice(i,1);
				break;
			}
		}
		return arr;
	},
	getSavedPresentations : function()
	{
			item = me.getItem(me.saveKey);
			arr = [];
			if(item)
				 arr = JSON.parse(item);

			return arr;
	},
	generatePreview : function ( str )
	{
		$("#previewmodal").modal("show");
		$("#openpreviewbtn").addClass("disabled");
		$("#openpreviewbtn").removeClass("btn-primary");
		$("#progressmeter").css("display", "block");
		$("#previewmessage").html("Veuillez patienter durant la génération de la prévisualisation.");
		$.ajax({
			type: 'POST',
			 url: "http://harish.io/impressionist/generatePreview.php",
			 data: {generateddata:str},
			 dataType: "html",
			 success: function(msg)
			 {
			 	console.log("Preview Generated");
			 	$("#openpreviewbtn").removeClass("disabled");
			 	$("#openpreviewbtn").addClass("btn-primary");
			 	$("#progressmeter").css("display", "none");
			 	$("#previewmessage").html("Prévisualisation du diaporama généré avec succès.");

			 }
		});
	},
	calculateSlideCoordinates : function(wx, wy)
	{
		let vx = Math.round(((me.vxmax - me.vxmin)/(me.wxmax - me.wxmin) )*(wx - me.wxmin) + me.vxmin);
		let vy = Math.round(((me.vymax - me.vymin)/(me.wymax - me.wymin) )*(wy - me.wymin) + me.vymin);
		let object = {x:vx, y:vy};
		console.log("object", object);
		return object;
	},
	addImageToSlide : function(src)
	{
		let img = new Image();
		$(img).attr("id", "slidelement_"+me.generateUID());
		$(img).css("left", "200px");
		$(img).css("top", "200px");
		$(img).addClass("slidelement");
		$(img).attr("src", src);
		console.log("selectedslide", me.selectedSlide);
		me.selectedSlide.append($(img));
		me.enableDrag();
	},
	addVideoToSlide : function(src)
	{
		let video = $("iframe");
		video.attr("id", "slidelement_"+me.generateUID());
		video.attr("frameborder", 0);
		video.attr("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture");
		video.attr("allowfullscreen", "");
		video.attr("width", "560");
		video.attr("height", "315");
		video.css("left", "200px");
		video.css("top", "200px");
		video.attr("src", src);
		me.selectedSlide.append($(video));
		me.enableDrag();
	},
	addObjectToSlide : function(obj)
	{
			console.log("adding object", obj);
			var iframe =$('<iframe>', {
					src: obj+'.html',
					id:  'slidelement'+me.generateUID(),
					class: 'slidelement',
					frameborder: 5,
					scrolling: 'no',
		css: 'width: 200px; height: 200px;'
			}).appendTo('.accordion');
			me.selectedSlide.append($(iframe));
			me.enableDrag();
	},
	createEditor : function(e)
	{
		editor = $(e.target).clone();
		editor.attr("contentEditable", "true");
	},
	triggetElementEdit : function(e)
	{
		$(e.target).attr("contentEditable", true);
	},
	removelisteners : function()
	{
		$(".settingsCancelBtn").off();
		$("#neworchestratepanel").off();
	},
	onSettingsCancelClicked : function()
	{
		me.animateSettingsPanel("left")
	},
	onMenuItemClicked : function()
	{
		$("#newpresentationmodal").modal("show");
		$("#newpresoheader").html("Créer une nouvelle présentation");
		$("#titleinput").val("Nouvelle présentation");
		$("textarea#descriptioninput").val("Exemple de description de présentation");
		me.mode = "create";
	},
	saveItem : function(key, value)
	{
		if(me.isSupported())
			localStorage.setItem(key, value);
	},
    getItem : function(key)
	{
		return localStorage.getItem(key);
	},
	isSupported : function()
	{
		if(localStorage)
			return true;
		else
			return false;
	}
};