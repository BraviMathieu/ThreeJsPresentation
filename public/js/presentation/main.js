
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
	this.userId = user_id_ajax;

	this.lastSaved = "";
	this.currentPresentation;
	this.mypresentations = [];
	this.mycurrentpresntationid = 0;
	this.mode = "create";
	this.backgroundColor = "";
	this.nightMode = false;

	this.dropdownopen = false;
	this.selectedforedit = false;
	this.graphiqueColor = "#FFFFFF";

	this.isBold = false;
	this.isItalic = false;
	this.isUnderlined = false;
	this.isAlignedLeft = false;
	this.isAlignedCenter = false;
	this.isAlignedRight = false;
	this.theme = "montserrat";

	//Graphique
	this.monGraphique;
	this.ctxGraphique;
	this.dataGraphique;

	this.objboolean = false;

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
		me.renderPresentations(presentations);
		me.openLastSavedPresentation();
		me.switchView("right");
	},
	openLastSavedPresentation : function()
	{
		presentation = JSON.parse(me.getLastItem());
		if(!presentation)
		{
			let savedpresos = presentation;

			if(savedpresos && savedpresos.length > 0)
				$("#saved-presentations-modal").modal("show");
			else
				me.openNewPresentationWindow();
		}
		else
		{
			me.currentPresentation = presentation;
			me.openPresentationForEdit(me.currentPresentation.id);
			me.applyStyle();
		}
	},
	openNewPresentationWindow : function()
	{
		$("#new-presentation-modal").modal();
	},
	renderPresentations : function (presentations)
	{
		me.mypresentations = presentations;
		$("#saved-presentations").html("<h3 style='display:inline-block; color:#2980B9; font-size:120%'> Vous n'avez aucune présentation sauvegardées. </h3>");
		if(presentations.length > 0)
			$("#saved-presentations").html("");

		let templ;
		for(var i=0; i<presentations.length; i++)
		{
			presentation = presentations[i];
			templ = saved_presentations;
			templ = templ.split("__presotitle__").join(presentation.title);
			templ = templ.split("__presodescription__").join(presentation.description);
			templ = templ.split("__presoid__").join(presentation.id);
			$("#saved-presentations").append(templ);
		}
		$(".deletepresobtn").on("click", function()
		{
			if(confirm("Êtes-vous sûr de vouloir supprimer cette présentation ?"))
				me.deleteSavedPresentation($(this).attr("data-id"));
		})
	},
	hideTransformControl : function()
	{
		$("#play").css("display", "none");
		$("#spandelete").css("display", "none");
	},
	setupKeyboardShortcuts : function()
	{
		key('ctrl+c', function()
		{
				me.cloneElement();
		});
		key('ctrl+v', function()
		{
				me.appendClonedElement();
		});
		key('del', function()
		{
			$("#spandelete").click();
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
		me.selectedSlide.append(me.clonedElement);
		me.enableDrag();
	},
	setupMenuItemEvents : function()
	{
		$("#make-bold").on("click", function(e)
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
		$("#make-italic").on("click", function(e)
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
		$("#make-underline").on("click", function(e)
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
		$("#make-align-left").on("click", function(e)
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
				$("#make-align-center").removeClass("active");
				$("#make-align-right").removeClass("active");
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
				$("#make-align-center").removeClass("active");
				$("#make-align-right").removeClass("active");
				me.isAlignedLeft = false;
				me.isAlignedCenter = false;
				me.isAlignedRight = false;
			}
		});
		$("#make-align-center").on("click", function(e)
		{
			e.stopPropagation();
			$(this).removeClass("active");
			if(!me.isAlignedCenter && me.selectedElement)
			{
				me.selectedElement.css("text-align", "center");
				me.selectedElement.attr("data-isalignleft", false);
				me.selectedElement.attr("data-isaligncenter", true);
				me.selectedElement.attr("data-isalignright", false);
				$("#make-align-left").removeClass("active");
				$(this).addClass("active");
				$("#make-align-right").removeClass("active");
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
				$("#make-align-left").removeClass("active");
				$(this).removeClass("active");
				$("#make-align-right").removeClass("active");
				me.isAlignedLeft = false;
				me.isAlignedCenter = false;
				me.isAlignedRight = false;
			}
		});
		$("#make-align-right").on("click", function(e)
		{
			e.stopPropagation();
			$(this).removeClass("active");
			if(!me.isAlignedRight && me.selectedElement)
			{
				me.selectedElement.css("text-align", "right");
				me.selectedElement.attr("data-isalignleft", false);
				me.selectedElement.attr("data-isaligncenter", false);
				me.selectedElement.attr("data-isalignright", true);
				$("#make-align-left").removeClass("active");
				$("#make-align-center").removeClass("active");
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
				$("#make-align-left").removeClass("active");
				$("#make-align-center").removeClass("active");
				$(this).removeClass("active");
				me.isAlignedLeft = false;
				me.isAlignedCenter = false;
				me.isAlignedRight = false;
			}
		});

	},
	enableSort : function()
	{
		$(".slide-thumb-holder").sortable({ update : function()
			{
				me.assignSlideNumbers();
				me.reArrangeImpressSlides();
			}} );
	},
	reArrangeImpressSlides : function()
	{
		children = $(".slide-thumb-holder").children();
		var clonedElements = [];
		for(var i=0; i<children.length; i++)
		{
			child = children[i];
			id = (child.id).split("_")[1];
			el = $("#impress_slide_"+id);
			clonedElements.push(el);
		}
		let impressSlideContainer = $(".impress-slide-container");
		impressSlideContainer.html("");

		for(var j=0; j< clonedElements.length; j++)
		{
			impressSlideContainer.append(clonedElements[j]);
		}
		me.enableDrag();
	},
	setupDials : function()
	{
		$("#rotation-knob").knob({change : function(v)
		{
			me.rotateElement(v);
		}});
		$("#skew-x-knob").knob({change : function(v)
		{
			me.rotateElementX(v);
		}});
		$("#skew-y-knob").knob({change : function(v)
		{
			me.rotateElementY(v);
		}});
		$("#scale-range").on("change", function()
		{
			me.selectedOrchElement.attr("data-scale", $(this).val());
			let id = me.selectedOrchElement.attr("id").split("_")[1];
			$("#slidethumb_"+id).attr("data-scale", $(this).val());
		});
		$("#depth-range").on("change", function()
		{
			me.selectedOrchElement.attr("data-z", $(this).val());
			let id = me.selectedOrchElement.attr("id").split("_")[1];
			$("#slidethumb_"+id).attr("data-z", $(this).val());
		});
		$(".transform-label").css("vertical-align", "top")

	},
	rotateElement : function(value)
	{
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

		let slideThumbId = $("#slidethumb_"+id);
		slideThumbId.attr("data-rotate-x", rotx);
		slideThumbId.attr("data-rotate-y", roty);
		slideThumbId.attr("data-rotate", value);
		slideThumbId.attr("data-transform-string", str);
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

		let slideThumbId = $("#slidethumb_"+id);
		slideThumbId.attr("data-rotate-x", value);
		slideThumbId.attr("data-rotate-y", roty);
		slideThumbId.attr("data-rotate", rot);
		slideThumbId.attr("data-transform-string", str);
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

		let slideThumbId = $("#slidethumb_"+id);
		slideThumbId.attr("data-rotate-x", rotx);
		slideThumbId.attr("data-rotate-y", value);
		slideThumbId.attr("data-rotate", rot);
		slideThumbId.attr("data-transform-string", str);
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
			$("#spandelete").css("display", "none");
			$(this).removeClass("movecursor");

		}).on("click", function (e)
		{
			e.stopPropagation();
			$(this).draggable({disabled : true});
			$(".slidelement").removeClass("elementselected");
			me.selectElement($(this));
			me.selectedforedit = true;
			me.setMenuControlValues($(this));
			me.positionTransformControl()
			$("#play").css("transform", "matrix(1, 0, 0, 1, 0, 0)");
		}).on("mousedown mouseover", function()
		{
			$(this).addClass("movecursor")
		}).on("mouseup", function()
		{
			console.log("mouse upping", me.selectedSlide);
			me.generateScaledSlide(me.selectedSlide);
		})
	},
	positionTransformControl : function()
	{
		let play = $("#play");
		let _transform = me.selectedElement.css("-webkit-transform");
		play.css("-webkit-transform", _transform);
		play.css("display", "block");
		$("#spandelete").css("display", "block");
		play.width (me.selectedElement.width());
		play.css("left",   me.selectedElement.position().left+"px");
		play.css("top", 	 me.selectedElement.position().top+"px");

		$("#spandelete").on("click", function(e)
		{
			e.stopPropagation();
			me.selectedElement.remove();
			play.css("display", "none");
			$("#spandelete").css("display", "none");
		})
	},
	setMenuControlValues : function(el)
	{
		let isbold 					= (el.attr("data-isbold") == "true");
		let isitalic 				= (el.attr("data-isitalic")  == "true");
		let isunderline 		= (el.attr("data-isunderline")  == "true");
		let isalignleft 		= (el.attr("data-isalignleft")  == "true");
		let isaligncenter 	= (el.attr("data-isaligncenter")  == "true");
		let isalignright 		= (el.attr("data-isalignright")  == "true");

		if(isbold)
			$("#make-bold").addClass("active");
		else
			$("#make-bold").removeClass("active");


		if(isitalic)
			$("#make-italic").addClass("active");
		else
			$("#make-italic").removeClass("active");


		if(isunderline)
			$("#make-underline").addClass("active");
		else
			$("#make-underline").removeClass("active");


		if(isalignleft)
			$("#make-align-left").addClass("active");
		else
			$("#make-align-left").removeClass("active");


		if(isaligncenter)
			$("#make-align-center").addClass("active");
		else
			$("#make-align-center").removeClass("active");


		if(isalignright)
			$("#make-align-right").addClass("active");
		else
			$("#make-align-right").removeClass("active");

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
		$("#colorpicker-btn").spectrum({
			allowEmpty:true,
			color: "#000000",
			showInput: true,
			containerClassName: "full-spectrum",
			showInitial: true,
			showPalette: true,
			showSelectionPalette: true,
			showAlpha: true,
			maxPaletteSize: 10,
			preferredFormat: "hex",
			move: function (color) {
				me.colorSelectedElement(color);
			},

			palette: [
				["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)", /*"rgb(153, 153, 153)","rgb(183, 183, 183)",*/
					"rgb(204, 204, 204)", "rgb(217, 217, 217)", /*"rgb(239, 239, 239)", "rgb(243, 243, 243)",*/ "rgb(255, 255, 255)"],
				["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
					"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
				["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
					"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
					"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
					"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
					"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
					"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
					"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
					"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
					/*"rgb(133, 32, 12)", "rgb(153, 0, 0)", "rgb(180, 95, 6)", "rgb(191, 144, 0)", "rgb(56, 118, 29)",
          "rgb(19, 79, 92)", "rgb(17, 85, 204)", "rgb(11, 83, 148)", "rgb(53, 28, 117)", "rgb(116, 27, 71)",*/
					"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
					"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
			]
		});

		$("#preview-graphique-add-donnee-color").spectrum({
			allowEmpty:true,
			color: "#000000",
			flat: true,
			showInput: true,
			containerClassName: "full-spectrum",
			showInitial: true,
			showPalette: true,
			showSelectionPalette: true,
			showAlpha: true,
			maxPaletteSize: 10,
			preferredFormat: "hex",
			move: function (color) {
				me.graphiqueColor = color;
			},

			palette: [
				["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)", /*"rgb(153, 153, 153)","rgb(183, 183, 183)",*/
					"rgb(204, 204, 204)", "rgb(217, 217, 217)", /*"rgb(239, 239, 239)", "rgb(243, 243, 243)",*/ "rgb(255, 255, 255)"],
				["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
					"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
				["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
					"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
					"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
					"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
					"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
					"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
					"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
					"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
					/*"rgb(133, 32, 12)", "rgb(153, 0, 0)", "rgb(180, 95, 6)", "rgb(191, 144, 0)", "rgb(56, 118, 29)",
          "rgb(19, 79, 92)", "rgb(17, 85, 204)", "rgb(11, 83, 148)", "rgb(53, 28, 117)", "rgb(116, 27, 71)",*/
					"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
					"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
			]
		});

	},
	addSettingsPanel : function()
	{
		$(".settingsbox").html(newpresotemplate);
		this.removeListeners();
		this.attachListeners();
	},
	manageGlobalClick : function()
	{
		$(".slidelement").draggable({disabled : false});
		$("#play").css("display", "none");
		$("#spandelete").css("display", "none");
		me.generateScaledSlide(me.selectedSlide);
		me.selectedforedit = false;
		me.resetMenuControlValues();
	},
	colorSelectedElement : function(color)
	{
		if(me.selectedElement)
			me.selectedElement.css("color", "rgb("+color._r+","+color._g+","+color._b+")");

		if(me.selectedElement[0].localName === "svg")
			me.selectedElement.css("fill", "rgb("+color._r+","+color._g+","+color._b+")");
	},
	addSlide : function()
	{
		let thumb = slidethumb;
		let uid = me.generateUID();
		me.mycurrentpresntationid = uid;
		thumb = thumb.split("slidethumb_^UID^").join("slidethumb_"+uid);
		let slideThumbId = $("#slidethumb_"+uid);

		$(".slide-thumb-holder").append(thumb);
		slideThumbId.animate({opacity:1}, 200);
		slideThumbId.attr("data-left", "0px");
		slideThumbId.attr("data-top", "0px");
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
			me.selectSlide("#impress_slide_"+id);
			$(".slidethumb").removeClass("currentselection");
			$("#slidethumb_"+id).addClass("currentselection");
			me.hideTransformControl();
			me.switchView("right");
		});
		me.lastslideleftpos += 200;
		me.assignSlideNumbers();
		me.addImpressSlide(uid);
		me.switchView("right");
		$("#presentation-metatitle").html($("#title-input").val());

	},
	addImpressSlide : function(id)
	{
		let islide = impress_slide;
		islide = islide.split("__slidenumber__").join("_"+id);
		islide = islide.split("slidelement_id").join("slidelement_"+me.generateUID());
		$(".impress-slide-container").append(islide);
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
		let slideThumbId = $("#slidethumb_"+id);
		let children = slideThumbId.children();

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
				$(child).remove();
		}

		slideThumbId.append(newel);
	},
	selectSlide : function(id)
	{
		let children = $(".impress-slide-container").children();

		for(let i=0; i< children.length; i++)
		{
			child = children[i];
			childid = "#"+child.id;
			if(childid == id)
			{
				$(childid).css("z-index", 1);
				me.selectedSlide = $(childid);
			}
			else
				$(childid).css("z-index", -200 + (-(Math.round(Math.random()*1000))));
		}
	},
	assignSlideNumbers : function()
	{
		let children = $(".slide-thumb-holder").children();
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
		let id = Math.round(Math.random()*10000);
		while($("slidelement_" + id).length){
			id = Math.round(Math.random()*10000);
		}
		return id;
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
	assemblePanoramaCases : function()
	{
		let panoramaViewport = $(".panorama-viewport");
		let orchestrationElements = [];
		let children = $(".slide-thumb-holder").children();
		let l = 10;

		panoramaViewport.html("");

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

				$("#rotation-knob").val(rot || 0).trigger("change");
				$("#skew-x-knob").val(rotx || 0).trigger("change");
				$("#skew-y-knob").val(roty || 0).trigger("change");
				$("#scale-range").val(scale || 1);
				$("#depth-range").val(depth || 1000);
			});
			panoramaViewport.append(clone);
			orchestrationElements.push(clone);

			l += 200;
		}
		me.repositionOrchestrationElements(orchestrationElements);
	},
	repositionOrchestrationElements : function(arr)
	{
		let children = $(".slide-thumb-holder").children();

		console.log("Current slide count", children.length, "Orchestration el count", arr.length);
		for(let i=0 ; i < arr.length; i++)
		{
			console.log("Props", $(children[i]).attr("data-left"), $(children[i]).attr("data-top"));
			arr[i].css("left", $(children[i]).attr("data-left"));
			arr[i].css("top", $(children[i]).attr("data-top"));
		}
	},
	switchView : function(direction)
	{
		let viewToggle = $("#new-panorama-panel");

		if(direction == "left")
		{
			$("#new-panorama-panel").html('<div class="sb-nav-link-icon"><i id="view-toggle-icon" class="fas fa-chevron-left"></i></div>Mode edition');
			$(".main-grey-area").css("display", "none");
			$(".panorama-grey-area").css("display", "block");
			me.currentview = "orchestration";
			me.assemblePanoramaCases();
		}
		else
		{
			$("#new-panorama-panel").html('<div class="sb-nav-link-icon"><i id="view-toggle-icon" class="fas fa-th"></i></div>Panorama');
			$(".main-grey-area").css("display", "block");
			$(".panorama-grey-area").css("display", "none");
			me.currentview = "mainarea";
			me.persistOrchestrationCoordinates();
		}
	},
	persistOrchestrationCoordinates : function()
	{
		let children = $(".panorama-viewport").children();
		me.orchestrationcoords = [];
		for(let i=0; i<children.length; i++)
		{
			child = $(children[i]);
			l = child.attr("data-left");
			t = child.attr("data-top");
			console.log("Child", i, l, t);
			me.orchestrationcoords.push({left: l, top: t});
		}
	},
	onViewToggled : function ()
	{
		if(me.currentview == "mainarea")
			me.switchView("left");
		else
			me.switchView("right");
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
		me.generateExport();
		$("#export-code-modal").modal("show");
	},
	attachListeners : function()
	{
		let slideElement = $(".slidelement");
		$("html").on("click", me.manageGlobalClick);
		$(".settingsCancelBtn").on("click", me.onSettingsCancelClicked);
		$("#new-preso-panel").on("click", me.onMenuItemClicked);
		$("#new-panorama-panel").on("click", me.onViewToggled);
		slideElement.on("click", me.triggerElementEdit);
		slideElement.on("mouseup", me.createEditor);
		$("#change-font-btn").on("click", me.openStyleSelector);
		$("#export-preso-panel").on("click", me.openCodeExportWindow);
		$(".previewpresobtn").on("click", function()
		{
			me.fetchAndPreview($(this).attr("data-id"))
		});
		$(".openpresobtn").on("click", function()
		{
			me.mode = "save";
			me.openPresentationForEdit($(this).attr("data-id"));
		});
		$("#create-presentation").on("click", function()
		{
			if(me.mode == "create")
				me.createNewPresentation();
			else
				me.savePresentation();
		});
		$("#save-presentation-panel").on("click", function()
		{
			if(me.currentPresentation)
			{
				$("#title-input").val(me.currentPresentation.title);
				$("textarea#description-input").val(me.currentPresentation.description);
			}
			me.mode = "save";
			me.savePresentation();
		});
		$("#open-preview-btn").on("click", function(e)
		{
			$("#preview-modal").modal("hide");
		});
		$(".dropdownitem").on("click", function(e)
		{
			me.changeTextFormat($(e.target).attr("data-dk-dropdown-value"));
			$(".dropdownpopup").css("display", "block");
			$(".pulldownmenu").html($(e.target).html());
			me.dropdownopen = true;
			me.hideTransformControl();
		});
		$("#add-text-btn").on("click", function ()
		{
			me.addImpressSlideItem(me.selectedSlide);
		});
		$("#add-image-btn").on("click", function()
		{
			$("#image-modal").modal("show");
		});
		$("#add-video-btn").on("click", function()
		{
			$("#video-modal").modal("show");
			$(".div-preview-video").html(video_template);
		});
		$("#add-tableau-btn").on("click", function()
		{
			$("#tableau-modal").modal("show");
			$(".div-tableau-previsualisation").html(tableau_previsualisation);
		});
		$("#add-graphique-btn").on("click", function()
		{
			$("#graphique-modal").modal("show");
			$(".div-graphique-previsualisation").html(graphique_previsualisation);

			me.ctxGraphique = $("#preview-graphique").get(0).getContext('2d');
			me.dataGraphique = {
				labels: ["Jaune", "Orange", "Rose", "Vert", "Bleu", "Violet","Gris"],
				datasets: [{
					label: 'Valeur',
					data: [12, 19, 3, 5, 2, 3, 10],
					backgroundColor:[
						"#ffe600",
						"#ff6400",
						"#ff0062",
						"#46c446",
						"#3a76ff",
						"#8634ff",
						"#baabbb",
					],
				}],
			};
			me.monGraphique = new Chart(me.ctxGraphique, {
				type: 'bar',
				data: me.dataGraphique,
				options: {
					title: {
						display: true,
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		});
		$("#preview-grahpique-add-donnee").on("click", function()
		{
			let couleur = me.graphiqueColor;
			let valeur = $("#preview-graphique-add-donnee-val").val();
			let nom = $("#preview-graphique-add-donnee-nom").val();

			me.monGraphique.data.labels.push(nom);
			me.monGraphique.data.datasets.forEach((dataset) => {
				dataset.data.push(valeur);
				dataset.backgroundColor.push("rgb("+couleur._r+","+couleur._g+","+couleur._b+")");
			});
			me.monGraphique.update();
		});
		$("#preview-grahpique-delete-donnee").on("click", function()
		{
			me.monGraphique.data.labels.pop();
			me.monGraphique.data.datasets.forEach((dataset) => {
				dataset.data.pop();
				dataset.backgroundColor.pop();
			});
			me.monGraphique.update();
		});
		$("#append-graphique-btn").on("click", function()
		{
			let graphique = $("#preview-graphique");

			me.addGraphiqueToSlide(graphique);
			$("#graphique-modal").modal("hide");
		});
		$("#preview-graphique-type").on("change", function()
		{
			let typeGraphique = $("#preview-graphique-type").val();

			me.monGraphique.destroy();
			me.monGraphique = new Chart(me.ctxGraphique, {
				type: typeGraphique,
				data: me.dataGraphique
			});
		});
		$("#add-object-btn").on("click", function()
		{
			$("#objet-selection-modal").modal("show");
		});
		$("#image-input").on("blur keyup", function()
		{
			let image = $(this).val();

			if(me.isValidUrl(image))
				$("#preview-image").attr("src", image);
				$("#image-width").attr("value", $("#preview-image").width());
				$("#image-height").attr("value", $("#preview-image").height());
		});
		$("#video-input").on("blur keyup", function()
		{
			let video = $("#video-input").val();
			if(me.isValidUrl(video)){
				if(video.includes("www.youtube.com/watch?v=")){
					video = video.replace("watch?v=","embed/");
					$(".preview-video").attr("src", video);
				}
			}
		});
		$("#add-slide-btn").on("click", function()
		{
			me.addSlide();
		});
		$("#append-image-btn").on("click", function()
		{
			let image = $("#preview-image").attr("src");
			let width = $("#image-width").val();
			let height = $("#image-height").val();
			me.addImageToSlide(image, width, height);
			$("#image-modal").modal("hide");
		});
		$("#append-video-btn").on("click", function()
		{
			let video = $(".preview-video");

			me.addVideoToSlide(video);
			$("#video-modal").modal("hide");
		});
		$("#append-tableau-btn").on("click", function()
		{
			let contenuTableau = $(".tableau-previsualisation");

			me.addTableauToSlide(contenuTableau);
			$("#tableau-modal").modal("hide");
		});
		$("#tableau-ajout-ligne").on("click", function()
		{
			let tableau = $(".tableau-previsualisation").get(0);
			let ligne = tableau.insertRow(tableau.rows.length);
			let i;

			for (i = 0; i < tableau.rows[0].cells.length; i++) {
				me.creerCase(ligne.insertCell(i));
			}
		});

		$("#tableau-ajout-colonne").on("click", function()
		{
			let tableau = $(".tableau-previsualisation").get(0);
			let i;

			for (i = 0; i < tableau.rows.length; i++) {
				me.creerCase(tableau.rows[i].insertCell(tableau.rows[i].cells.length));
			}
		});

		$("#tableau-suppression-ligne").on("click", function()
		{
			let tableau = $(".tableau-previsualisation").get(0);
			let derniereLigne = tableau.rows.length - 1;

			if(derniereLigne !== 0)
				tableau.deleteRow(derniereLigne);
		});

		$("#tableau-suppression-colonne").on("click", function()
		{
			let tableau = $(".tableau-previsualisation").get(0);
			let derniereColonne = tableau.rows[0].cells.length - 1;
			let i = tableau.rows[0].cells.length - 1;

			for (i = 0; i < tableau.rows.length; i++) {

				if(derniereColonne !== 0)
					tableau.rows[i].deleteCell(derniereColonne);
			}
		});
		$("#open-presentations-panel").on("click", function()
		{
			$(".previewpresobtn").on("click", function()
			{
				me.fetchAndPreview($(this).attr("data-id"))
			});
			$(".openpresobtn").on("click", function()
			{
				me.mode = "save";
				me.openPresentationForEdit($(this).attr("data-id"));
			});
			$("#saved-presentations-modal").modal("show");
		});
		$(".style-thumbnail").on("click", function()
		{
			$(".style-thumbnail").css("border-bottom", "1px dotted #DDD");
			$(this).css("border-bottom", "2px solid #6f2232");
			me.theme = $(this).attr("data-style");
		});
		$("#apply-style-btn").on("click", function()
		{
			me.applyStyle();
			$("#police-selection-modal").modal("hide");
		});

		$(".objet-thumbnail").on("click", function()
		{
			$(".objet-thumbnail").css("border-bottom", "1px dotted #DDD");
			$(this).css("border-bottom", "2px solid #6f2232");
			objet = $(this).attr('data-nom');
		});

		$("#append-object-btn").on("click", function()
		{
			me.addObjectToSlide(objet);
			$("#objet-selection-modal").modal("hide");
		});

		$("#import-objet-panel").on("click", function()
		{
			$("#import-objet-modal").modal("show");
		});

		$("#objinput").change( function()
		{
			if($(this).prop('files').length > 0) {
				objimport = $(this).prop('files')[0];
				console.log(objimport);
				if (!objimport.name.includes(".obj")) {
					document.getElementById("objinput").value = '';
					toastr.error("vous devez importer un .obj");
				}
			}
		});

		$("#mtlinput").change( function()
		{
			if($(this).prop('files').length > 0) {
				mtlimport = $(this).prop('files')[0];
				if (!mtlimport.name.includes(".mtl")) {
					document.getElementById("mtlinput").value = '';
					toastr.error("vous devez importer un .mtl");
				}
			}
		});
		$("#imginput").change( function()
		{
			if($(this).prop('files').length > 0) {
				for(let n = 0; n < $(this).prop('files').length; n++)
				{
					imgimport = $(this).prop('files')[n];
					console.log(imgimport);
					formdata = new FormData();
					if (!imgimport.type.includes("image/jpeg")) {
						document.getElementById("imginput").value = '';
						toastr.error("vous devez importer un .jpg");
					}
					else {
						formdata.append("img", imgimport);
						$.ajax
						({
							type: "POST",
							url: "App/Ajax/texturejpg_importAjax.php",
							data: formdata,
							processData: false,
							contentType: false,
							async: false,
						});
					}
				}
			}
		});

		$("#import-objet-3d").on("click", function()
		{
			objinput =document.getElementById("mtlinput").value;
			imgimput = document.getElementById("objinput").value;
			if( objinput !== ""  && imginput !== ""){
				formdata = new FormData();
				formdata.append("obj", objimport);
				formdata.append("mtl",mtlimport);
				$.ajax
				({
					type: "POST",
					url: "App/Ajax/objet3d_importAjax.php",
					data: formdata,
					processData: false,
					contentType: false,
					async: false,
				});
				objurl = objimport.name+".html";
				me.addMyObjectToSlide(objurl);
				$("#import-objet-modal").modal("hide");

			}
			else {
				toastr.error("veuillez importer vos fichiers mtl et obj");
			}
		});

		$("#open-mesObj-panel").on("click",function () {

			$("#saved-objects-modal").modal("show");
			if( me.objboolean === false) {
				$.ajax({
					datatype: "JSON",
					url: "../App/Ajax/mesobjet3d_affichageAjax.php",
					success: function (retour) {
						objRetour = JSON.parse(retour);
					},
					async: false,
				});
				me.afficheMesObj(objRetour)
			}
			me.objboolean = true;
		});

		$("#savedobjects").on("change",function () {
			urlmyobj =$(this).prop("options")[$(this).prop("selectedIndex")].value;
			document.getElementById("previewobj").src = "uploads/"+urlmyobj;
		});

		$("#append-myobject-btn").on("click",function () {
			me.addMyObjectToSlide(urlmyobj);
			$("#saved-objects-modal").modal("hide");
		});

		$("#add-svg-btn").on("click",function () {
			$("#svg-selection-modal").modal("show");
		});

		$(".svg-thumbnail").on("click", function()
		{
			$(".svg-thumbnail").css("border-bottom", "1px dotted #DDD");
			$(this).css("border-bottom", "2px solid #6f2232");
			forme = $(this).attr('data-nom');
		});

		$("#append-svg-btn").on("click", function()
		{
			forme = me.pickSvg(forme);
			me.addSvgToSlide(forme);
			$("#svg-selection-modal").modal("hide");
		});

		$("#night-mode").on("click", function() {
			me.toggleNightMode();
		});

		$("#configuration").on("click", function() {
			$("#configuration-modal").modal("show");
		});
	},
	applyStyle : function()
	{
		$(".slidelement").each(function()
			{
				if($(this).hasClass("slidelementh1"))
					me.removeAllStyles($(this));
					$(this).addClass(me.theme);
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
		$("#police-selection-modal").modal("show");
	},
	deleteSavedPresentation : function(id)
	{
		let data = {presentation_id: id};
		$.ajax({
			type: "POST",
			url: "App/Ajax/presentations_suppressionAjax.php",
			data: data,
			async:false,
			success: function()
			{
				document.location.reload(true);
			},
			error: function (err) {
				console.log(err);
			}
		});
	},
	generateExport : function(isPreview)
	{
		let children = $(".slide-thumb-holder").children();
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
		outputcontainer.find(".impress-slide").each(function()
		{
			$(this).css("width", "1024px");
			$(this).css("height", "768px");
		});

		if(isPreview)
			me.generatePreview(outputcontainer.html().toString());

		 $("#exported-code").text(outputcontainer.html().toString());

		let codeExport =  $(".impress-slide-container").html();

		let presentation_export = export_template;
		presentation_export = presentation_export.split("__slidetitle__").join(me.currentPresentation.title);
		presentation_export = presentation_export.split("__contenuslide__").join(codeExport);
		presentation_export = presentation_export.replace(/contenteditable="true"/g, "");

		let zip = new JSZip();
		$.ajax({
			type: "GET",
			url: "public/lib/impressjs/js/impress.js",
			success: function(data)
			{
				let impressJs = data;
				zip.file("presentation.html",presentation_export);
				zip.file("impress.js",impressJs);

				$.ajax({
					type: "GET",
					url: "public/lib/impressjs/css/impress-common.css",
					success: function(data)
					{
						zip.file("impress-common.css",data);

						$.ajax({
							type: "GET",
							url: "public/lib/bootstrap/css/bootstrap.min.css",
							success: function(data)
							{
								zip.file("bootstrap.css",data);

								$.ajax({
									type: "GET",
									url: "public/css/styles.css",
									success: function(data)
									{
										zip.file("styles.css",data);

										$.ajax({
											type: "GET",
											url: "public/css/presentation/custom.css",
											success: function(data)
											{
												zip.file("styles.css",data);

												$.ajax({
													type: "GET",
													url: "public/lib/chartjs/Chart.min.js",
													success: function(data)
													{
														zip.file("chart.js",data);

														zip.generateAsync({type:"blob"}).then(function(content) {
															saveAs(content, "threejs-presentation.zip");
														});
													},
													error: function (err) {
														console.log(err);
													}
												});
											},
											error: function (err) {
												console.log(err);
											}
										});
									},
									error: function (err) {
										console.log(err);
									}
								});
							},
							error: function (err) {
								console.log(err);
							}
						});
					},
					error: function (err) {
						console.log(err);
					}
				});
			},
			error: function (err) {
				console.log(err);
			}
		});

	},
	createNewPresentation : function()
	{
		$(".slide-thumb-holder").html("");
		$(".impress-slide-container").html();
		me.addSlide();
		me.savePresentation();
		me.selectFirstThumb();
	},
	openPresentationForEdit : function(id)
	{
		me.mycurrentpresntationid = id;
		for(let i=0; i<me.mypresentations.length; i++)
		{
			presentation = me.mypresentations[i];
			if(id == presentation.id)
			{
				$(".impress-slide-container").html(presentation.contents);
				$(".slide-thumb-holder").html(presentation.thumbcontents);
				$(".slide-thumb-holder").each(function()
				{
					$(this).css("opacity", 1);
				});

				me.selectedSlide = $(".impress-slide-container").find(".impress-slide-element");
				me.currentPresentation = presentation;
				$("#presentation-metatitle").html(me.currentPresentation.title);
			}

			$("#saved-presentations-modal").modal("hide");
		}
		$(".slidemask").on("click", function(e)
		{
			e.stopPropagation();
			id = (e.target.id).split("_")[1];
			me.selectSlide("#impress_slide_"+id);
			$(".slidethumb").removeClass("currentselection");
			$("#slidethumb_"+id).addClass("currentselection");
			me.hideTransformControl();
			me.switchView("right");
		});
		$(".deletebtn").on("click", function ()
		{
			p = $("#"+ $(this).attr("data-parent"));
			slideid = $(this).attr("data-parent").split("_")[1];
			p.animate({opacity:0}, 200, function()
			{
				$(this).remove();
				$("#impress_slide_"+slideid).remove();
				me.assignSlideNumbers();
			})
		});
		me.enableDrag();
		me.selectFirstThumb();
	},
	fetchAndPreview : function(id)
	{
		for(var i=0; i<me.mypresentations.length; i++)
		{
			presentation = me.mypresentations[i];
			if(id == presentation.id)
			{
				$(".placeholder").html(presentation.contents);
				$(".placeholder").find(".impress-slide").each(function()
				{
					$(this).css("width", "1024px");
					$(this).css("height", "768px");
					$(this).addClass("step");
				});
				me.generatePreview($(".placeholder").html().toString());
				$("#saved-presentations-modal").modal("hide");
				break;
			}
		}
	},
	savePresentation : function()
	{
		$("#save-presentation-panel").html('<div class="sb-nav-link-icon"><i class=\"fas fa-save\"></i></div>Sauvegarde en cours...');
			let items = me.getItems();
			let arr = [];
			if(items) {
				arr = JSON.parse(items);
			}
			if(arr)
			{
				if(this.mode == "save")
				{
					if(me.currentPresentation)
						arr = me.removeReference(arr);
				}
			}
			else{
				arr = [];
			}

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
				title: $("#title-input").val(),
				description: $("textarea#description-input").val(),
				contents : $(".impress-slide-container").html().toString(),
				thumbcontents : $(".slide-thumb-holder").html().toString(),
				theme : me.theme
			};

			me.currentPresentation = o;
			$("#presentation-metatitle").html(me.currentPresentation.title);

			me.sauvegarderBDD(o);

			presentations = me.getSavedPresentations();
			presentations.reverse();
			me.renderPresentations(presentations);

			$(".previewpresobtn").on("click", function()
			{
				me.fetchAndPreview($(this).attr("data-id"))
			});
			$(".openpresobtn").on("click", function()
			{
				me.mode = "save";
				me.openPresentationForEdit($(this).attr("data-id"));
			});
			$("#new-presentation-modal").modal("hide");
			setTimeout(me.resetSaveButtonText, 1000)
	},
	resetSaveButtonText : function()
	{
		$("#save-presentation-panel").html('<div class="sb-nav-link-icon"><i class=\"fas fa-check-circle\"></i></div>Sauvegarde réussie!');
		setTimeout(function(){ $("#save-presentation-panel").html('<div class="sb-nav-link-icon"><i class=\"fas fa-save\"></i></div>Sauvegarder'); }, 1000);
	},
	sauvegarderBDD : function(tableau)
	{
		let data = {user_id : me.userId, new_presentation:tableau};

		$.ajax({
			type: "POST",
			url: "App/Ajax/presentations_sauvegarderAjax.php",
			data: data,
			async:false,
			success: function(retour)
			{
				presentationsRetour = retour;
			},
			error: function (err) {
				console.log(err);
			}
		});
	},
	removeReference : function(arr)
	{
		for(let i=0; i<arr.length; i++ )
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
			let items = me.getItems();
			let arr = [];

			if(items) {
				arr = JSON.parse(items);
			}

			return arr;
	},
	generatePreview : function (str)
	{
		let openPreview = $("#open-preview-btn");

		$("#preview-modal").modal("show");
		openPreview.addClass("disabled");
		openPreview.removeClass("btn-primary");
		$("#progressmeter").css("display", "block");
		$("#previewmessage").html("Veuillez patienter durant la génération de la prévisualisation.");

	},
	calculateSlideCoordinates : function(wx, wy)
	{
		let vx = Math.round(((me.vxmax - me.vxmin)/(me.wxmax - me.wxmin) )*(wx - me.wxmin) + me.vxmin);
		let vy = Math.round(((me.vymax - me.vymin)/(me.wymax - me.wymin) )*(wy - me.wymin) + me.vymin);
		let object = {x:vx, y:vy};

		return object;
	},
	addImageToSlide : function(src, width, height)
	{
		let img = new Image();

		$(img).attr("id", "slidelement_"+me.generateUID());
		$(img).css("position", "absolute");
		$(img).css("left", "345px");
		$(img).css("top", "0px");
		$(img).addClass("slidelement");
		$(img).attr("src", src);

		if(width !== "" && height !== "")
		{
			$(img).css("width", width + "px");
			$(img).css("height", height + "px")
		}

		me.selectedSlide.append($(img));
		me.enableDrag();
	},
	addVideoToSlide : function(video)
	{
		video.attr("id", "slidelement_"+me.generateUID());
		video.addClass("slidelement");
		video.attr("width", "426");
		video.attr("height", "240");
		video.css("width", "426");
		video.css("height", "240");
		video.css("border", "solid 6px");
		video.removeClass("preview-video");

		me.selectedSlide.append($(video));
		me.enableDrag();
	},
	addTableauToSlide : function(contenuTableau)
	{
		contenuTableau.attr("id", 'slidelement_'+me.generateUID());
		contenuTableau.addClass("slidelement");
		contenuTableau.css("position", 'absolute');
		contenuTableau.css("top", '0px');
		contenuTableau.css("left", '450px');
		contenuTableau.removeClass("table-responsive");
		contenuTableau.removeClass("tableau-previsualisation");

		me.selectedSlide.append($(contenuTableau));
		me.enableDrag();
	},
	addGraphiqueToSlide : function(graphique)
	{
		graphique.attr("id", 'slidelement_'+me.generateUID());
		graphique.addClass("slidelement");
		graphique.css("position", 'absolute');
		graphique.css("top", '0px');
		graphique.css("left", '260px');

		let div = $("<div style=\"width: 400px; height: 400px;\">").html(graphique);

		me.selectedSlide.append($(div));
		me.enableDrag();
	},
	creerCase : function(cell)
	{
	let  txt = document.createTextNode("Case");

	cell.appendChild(txt);
	cell.setAttribute('contenteditable', "true");
	},
	addObjectToSlide : function(obj)
	{
		let iframe = $('<iframe>', {
            width: 500,
            height: 500,
			src: "public/lib/objets3d/"+obj+'.html',
			id:  'slidelement_'+me.generateUID(),
			class: 'slidelement',
			frameborder: 5,
			scrolling: 'no',
			css: 'width: 200px; height: 200px;'
		}).appendTo('.accordion');

		me.selectedSlide.append($(iframe));
		me.enableDrag();
	},
	addMyObjectToSlide : function(obj)
	{
		let iframe = $('<iframe>', {
			width: 500,
			height: 500,
			src: "http://localhost/ThreeJS_Presentation/uploads/"+obj,
			id:  'slidelement_'+me.generateUID(),
			class: 'slidelement',
			frameborder: 5,
			scrolling: 'no',
			css: 'width: 200px; height: 200px;'
		}).appendTo('.accordion');

		me.selectedSlide.append($(iframe));
		me.enableDrag();
	},
	addSvgToSlide : function(forme)
	{
		$(forme).attr("id", "slidelement_"+me.generateUID());
		$(forme).css("left", "200px");
		$(forme).css("top", "0px");
		$(forme).addClass("slidelement");

		me.selectedSlide.append($(forme));
		me.enableDrag();
	},
	pickSvg: function (forme)
	{
		let svg;
		switch (forme) {
			case "pentagon":
				svg = $("<svg viewBox=\"0 0 200 200\"  preserveAspectRatio=\"none\" width=\"100\" height=\"100\">\n" +
					"                        <polygon points=\"156.427384220077,186.832815729997 43.5726157799226,186.832815729997 8.69857443566525,79.5015528100076 100,13.1671842700025 191.301425564335,79.5015528100076\" id=\"pentagon\"></polygon>\n" +
					"                    </svg>");
			break;

			case "circle":
				svg = $("<svg preserveAspectRatio=\"none\" viewBox=\"0 0 80 80\" width=\"100\" height=\"100\">\n" +
					"                        <circle cx=\"40\" cy=\"40\" r=\"40\" id=\"circle\"></circle>\n" +
					"                    </svg>");
			break;
			case "rectangle":
				svg = $("<svg viewBox=\"0 0 50 50\" preserveAspectRatio=\"none\" width=\"100\" height=\"100\" id=\"rectangle\">\n" +
					"                        <rect width=\"50\" height=\"50\"></rect>\n" +
					"                    </svg>");
			break;
			case "triangle":
				svg = $("<svg viewBox=\"0 0 50 50\" preserveAspectRatio=\"none\" width=\"100\" height=\"100\"id=\"triangle\">\n" +
					"                        <polygon points=\"25,0 50,50 0,50\"></polygon>\n" +
					"                    </svg>");
			break;
			case "hexagone":
				svg = $("<svg viewBox=\"0 0 726 726\" preserveAspectRatio=\"none\" width=\"100\" height=\"100\">\n" +
					"                        <polygon points=\"723,314 543,625.769145 183,625.769145 3,314 183,2.230855 543,2.230855 723,314\" id=\"hexagone\"></polygon>\n" +
					"                    </svg>");
			break;
			case "etoile":
				svg = $("<svg  viewBox=\"0 0 180 180\" preserveAspectRatio=\"none\" width=\"100\" height=\"100\" id=\"etoile\">\n" +
					"                        <polygon points=\"90,0 30,170 180,50 0,50 150,170\"></polygon>\n" +
					"                    </svg>");
			break;
		}
		return svg;
		
	},
	createEditor : function(e)
	{
		let editor = $(e.target).clone();

		editor.attr("contentEditable", "true");
	},
	triggerElementEdit : function(e)
	{
		$(e.target).attr("contentEditable", true);
	},
	removeListeners : function()
	{
		$(".settingsCancelBtn").off();
		$("#new-panorama-panel").off();
	},
	onSettingsCancelClicked : function()
	{
		me.animateSettingsPanel("left")
	},
	onMenuItemClicked : function()
	{
		$("#new-presentation-modal").modal("show");
		$("#new-preso-header").html("Créer une nouvelle présentation");
		$("#title-input").val("Nouvelle présentation");
		$("textarea#description-input").val("Exemple de description de présentation");
		me.mode = "create";
	},
	getItems : function()
	{
		let presentationsRetour;
		let data = {user_id : me.userId};
		$.ajax({
			type: "POST",
			url: "App/Ajax/presentations_affichageAjax.php",
			data: data,
			async:false,
			success: function(retour)
			{
				presentationsRetour = retour;
			},
			error: function (err) {
				console.log(err);
			}
		});
		return presentationsRetour;
	},
	getLastItem : function()
	{
		let presentationRetour;
		let data = {user_id : me.userId};
		$.ajax({
			type: "POST",
			url: "App/Ajax/presentations_last_affichageAjax.php",
			data: data,
			async:false,
			success: function(retour)
			{
				presentationRetour = retour;
			},
			error: function (err) {
				console.log(err);
			}
		});
		return presentationRetour;
	},
	isSupported : function()
	{
			return localStorage;
	},
	isValidUrl : function(url)
	{
		try {
			new URL(url);
		}
		catch (e) {
			return false;
		}
		return true;
	},
	toggleNightMode : function()
	{
		if(me.nightMode === false)
		{
			me.nightMode = true;
			$("#night-mode").html("<div class=\"sb-nav-link-icon\"><i class=\"fas fa-moon\"></i></div>Activé</a>");

			$("#sidenavAccordion").removeClass("sb-sidenav-light");
			$("#sidenavAccordion").addClass("sb-sidenav-dark");
			$("#navSlide").removeClass("mainfooter-light");
			$("#navSlide").addClass("mainfooter");
			$("#visualisation").removeClass("main-viewport");
			$("#visualisation").addClass("main-viewport-dark");
		}
		else
		{
			me.nightMode = false;
			$("#night-mode").html("<div class=\"sb-nav-link-icon\"><i class=\"fas fa-sun\"></i></div>Désactivé</a>");

			$("#sidenavAccordion").removeClass("sb-sidenav-dark");
			$("#sidenavAccordion").addClass("sb-sidenav-light");
			$("#navSlide").removeClass("mainfooter");
			$("#navSlide").addClass("mainfooter-light");
			$("#visualisation").removeClass("main-viewport-dark");
			$("#visualisation").addClass("main-viewport");
		}
	},
	afficheMesObj : function (mesObj) {
		for (let i = 0; i < mesObj.length; i++) {
			document.getElementById("savedobjects").innerHTML += "<option value='"+mesObj[i].basename+"'>"+mesObj[i].basename+"</option>";
		}
	},
	selectFirstThumb : function(){
		let firstThumb = $("div .slide-thumb-holder").html();
		let docThumb = new DOMParser().parseFromString(firstThumb, "text/xml");
		let idThumb = docThumb.firstChild.id.split('_');
		$("div #slidethumb_"+idThumb[1]).click();
		$("div #orchestrationelement_6984").click();
	},
};