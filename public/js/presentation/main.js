function isEmpty(obj) {
  return Object.keys(obj).length === 0;
}

Presentation = function() {
  this.currentview = 'mainarea';
  this.selectedElement;
  this.clonedElement;
  this.selectedSlide;
  this.orchestrationcoords = [];
  this.selectedOrchElement;
  this.userId = user_id_ajax;

  this.currentPresentation;
  this.mypresentations = [];
  this.mode = 'create';
  this.backgroundColor = '';
  this.nightMode = false;

  this.graphiqueColor = '#FFFFFF';

  this.isBold = false;
  this.isItalic = false;
  this.isUnderlined = false;
  this.isAlignedLeft = false;
  this.isAlignedCenter = false;
  this.isAlignedRight = false;
  this.theme = 'montserrat';
  this.obj3dUrl = obj3dUrl;

  //Modals
  this.NewPresntationModal = new bootstrap.Modal('#new-presentation-modal');
  this.exportCodeModal = new bootstrap.Modal('#export-code-modal');
  this.previewModal = new bootstrap.Modal('#preview-modal');
  this.newImageModal = new bootstrap.Modal('#image-modal');
  this.newVideoModal = new bootstrap.Modal('#video-modal');
  this.newTableauModal = new bootstrap.Modal('#tableau-modal');
  this.newGraphiqueModal = new bootstrap.Modal('#graphique-modal');
  this.newObjetModal = new bootstrap.Modal('#objet-selection-modal');
  this.newAllPresentationsModal = new bootstrap.Modal('#saved-presentations-modal');
  this.newPoliceModal = new bootstrap.Modal('#police-selection-modal');
  this.newImportObjetModal = new bootstrap.Modal('#import-objet-modal');
  this.newSavedObjetModal = new bootstrap.Modal('#saved-objects-modal');
  this.newSvgModal = new bootstrap.Modal('#svg-selection-modal');

  //Graphique
  this.monGraphique;
  this.ctxGraphique;
  this.dataGraphique;

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
};
Presentation.prototype =
    {
      initialize: function() {
        me = this;
        me.continueInit();
      },
      continueInit: function() {
        me.setupColorpicker();
        me.setupMenuItemEvents();
        me.enableSort();
        me.setupDials();
        me.setupKeyboardShortcuts();
        me.hideTransformControl();
        me.continueInitAsync();
      },
      continueInitAsync: async function() {
        let presentationsAsync = await me.getSavedPresentationsAsync();
        presentationsAsync.json().then(function(presentations){
          me.renderPresentations(presentations);
          me.openPresentation(presentations.at(-1));
          me.switchView('right');
        });
      },
      openPresentation: function(presentation) {
        if (!presentation) {
          me.openNewPresentationWindow();
        } else {
          me.currentPresentation = presentation;
          me.openPresentationForEdit(me.currentPresentation.id);
          me.applyStyle();
        }
      },
      openNewPresentationWindow: function() {
        me.NewPresntationModal.show();
      },
      renderPresentations: function(presentations) {
        me.mypresentations = presentations;

        if(presentations.length > 0){
          document.querySelector('#saved-presentations').innerHTML ="";
        }else{
          document.querySelector('#saved-presentations').innerHTML =
              '<span>' +
              ' Vous n\'avez aucune présentation sauvegardée. ' +
              '</span>';
        }

        let templ;
        for (let i = 0; i < presentations.length; i++) {
          presentation = presentations[i];
          templ = saved_presentations;
          templ = templ.split('__presotitle__').join(presentation.title);
          templ = templ.split('__presodescription__').join(presentation.description);
          templ = templ.split('__presoid__').join(presentation.id);
          document.querySelector('#saved-presentations').insertAdjacentHTML('beforeend', templ);
        }

      },
      hideTransformControl: function() {
        document.querySelector('#play').style.display =  'none';
        document.querySelector('#spandelete').style.display =  'none';
      },
      setupKeyboardShortcuts: function() {
        document.addEventListener('copy', () => {
          me.cloneElement();
        });
        document.addEventListener('paste', () => {
          me.appendClonedElement();
        });
      },
      cloneElement: function() {
        if (me.selectedElement) {
          let clone   = me.selectedElement.cloneNode(true);
          clone.id    = 'slideelement_' + me.generateUID();
          clone.left  = me.selectedElement.offsetLeft + 20 + 'px';
          clone.top   = me.selectedElement.offsetTop + 20 + 'px';
          me.clonedElement = clone;
        }
      },
      appendClonedElement: function() {
        document.querySelector(me.selectedSlide).appendChild(me.clonedElement);
        me.enableDrag();
      },
      setupMenuItemEvents: function() {
        document.querySelector('#make-bold').addEventListener('click', function(e) {
          let element = e.target;
          e.stopPropagation();
          if (!me.isBold && me.selectedElement) {
            me.selectedElement.style.fontWeight = 'bold';
            me.selectedElement.setAttribute('data-isbold', true);
            element.classList.add('active');
            me.isBold = true;
          } else if (me.isBold && me.selectedElement) {
            me.selectedElement.style.fontWeight = 'normal';
            me.selectedElement.setAttribute('data-isbold', false);
            element.classList.add('active');
            me.isBold = false;
          }
        });

        document.querySelector('#make-italic').addEventListener('click', function(e) {
          let element = e.target;
          e.stopPropagation();
          element.classList.remove('active');
          if (!me.isItalic && me.selectedElement) {
            me.selectedElement.style.fontStyle = 'italic';
            me.selectedElement.setAttribute('data-isitalic', true);
            element.classList.add('active');
            me.isItalic = true;
          } else if (me.isItalic && me.selectedElement) {
            me.selectedElement.style.fontStyle = 'normal';
            me.selectedElement.setAttribute('data-isitalic', false);
            element.classList.remove('active');
            me.isItalic = false;
          }
        });

        document.querySelector('#make-underline').addEventListener('click', function(e) {
          let element = e.target;
          e.stopPropagation();
          element.classList.remove('active');
          if (!me.isUnderlined && me.selectedElement) {
            me.selectedElement.style.textDecoration = 'underline';
            me.selectedElement.setAttribute('data-isunderline', true);
            element.classList.add('active');
            me.isUnderlined = true;
          } else if (me.isUnderlined && me.selectedElement) {
            me.selectedElement.style.textDecoration = 'none';
            me.selectedElement.setAttribute('data-isunderline', false);
            element.classList.remove('active');
            me.isUnderlined = false;
          }
        });

        document.querySelector('#make-align-left').addEventListener('click', function(e) {
          let element = e.target;
          e.stopPropagation();
          element.classList.remove('active');
          if (!me.isAlignedLeft && me.selectedElement) {
            me.selectedElement.style.textAlign = 'left';
            me.selectedElement.setAttribute('data-isalignleft', true);
            me.selectedElement.setAttribute('data-isaligncenter', false);
            me.selectedElement.setAttribute('data-isalignright', false);
            element.classList.add('active');
            document.querySelector('#make-align-center').classList.remove('active');
            document.querySelector('#make-align-right').classList.remove('active');
            me.isAlignedLeft = true;
            me.isAlignedCenter = false;
            me.isAlignedRight = false;
          } else if (me.isAlignedLeft && me.selectedElement) {
            me.selectedElement.style.textAlign =  'left';
            me.selectedElement.setAttribute('data-isalignleft', false);
            me.selectedElement.setAttribute('data-isaligncenter', false);
            me.selectedElement.setAttribute('data-isalignright', false);
            element.classList.remove('active');
            document.querySelector('#make-align-center').classList.remove('active');
            document.querySelector('#make-align-right').classList.remove('active');
            me.isAlignedLeft = false;
            me.isAlignedCenter = false;
            me.isAlignedRight = false;
          }
        });

        document.querySelector('#make-align-center').addEventListener('click', function(e) {
          let element = e.target;
          e.stopPropagation();
          element.classList.remove('active');
          if (!me.isAlignedCenter && me.selectedElement) {
            me.selectedElement.style.textAlign = 'center';
            me.selectedElement.setAttribute('data-isalignleft', false);
            me.selectedElement.setAttribute('data-isaligncenter', true);
            me.selectedElement.setAttribute('data-isalignright', false);
            document.querySelector('#make-align-left').classList.remove('active');
            document.querySelector('#make-align-right').classList.remove('active');
            element.classList.remove('active');
            me.isAlignedLeft = false;
            me.isAlignedCenter = true;
            me.isAlignedRight = false;
          } else if (me.isAlignedCenter && me.selectedElement) {
            me.selectedElement.style.textAlign = 'left';
            me.selectedElement.setAttribute('data-isalignleft', false);
            me.selectedElement.setAttribute('data-isaligncenter', false);
            me.selectedElement.setAttribute('data-isalignright', false);
            document.querySelector('#make-align-left').classList.remove('active');
            document.querySelector('#make-align-right').classList.remove('active');
            element.classList.remove('active');
            me.isAlignedLeft = false;
            me.isAlignedCenter = false;
            me.isAlignedRight = false;
          }
        });

        document.querySelector('#make-align-right').addEventListener('click', function(e) {
          let element = e.target;
          e.stopPropagation();
          element.classList.remove('active');
          if (!me.isAlignedRight && me.selectedElement) {
            me.selectedElement.style.textAlign = 'right';
            me.selectedElement.setAttribute('data-isalignleft', false);
            me.selectedElement.setAttribute('data-isaligncenter', false);
            me.selectedElement.setAttribute('data-isalignright', true);
            document.querySelector('#make-align-left').classList.remove('active');
            document.querySelector('#make-align-center').classList.remove('active');
            element.addClass('active');
            me.isAlignedLeft = false;
            me.isAlignedCenter = false;
            me.isAlignedRight = true;
          } else if (me.isAlignedRight && me.selectedElement) {
            me.selectedElement.style.textAlign = 'left';
            me.selectedElement.setAttribute('data-isalignleft', false);
            me.selectedElement.setAttribute('data-isaligncenter', false);
            me.selectedElement.setAttribute('data-isalignright', false);
            document.querySelector('#make-align-left').classList.remove('active');
            document.querySelector('#make-align-center').classList.remove('active');
            element.classList.remove('active');
            me.isAlignedLeft = false;
            me.isAlignedCenter = false;
            me.isAlignedRight = false;
          }
        });
      },
      enableSort: function() {
        //TODO
        /*Sortable.create(el, {
          group: "localStorage-example",
          store: {

            get: function (sortable) {
              var order = localStorage.getItem(sortable.options.group.name);
              return order ? order.split('|') : [];
            },

            set: function (sortable) {
              var order = sortable.toArray();
              localStorage.setItem(sortable.options.group.name, order.join('|'));
            }
          }
        })*/


        /*$('.slide-thumb-holder').sortable({
          update: function() {
            me.reArrangeImpressSlides();
          },
        });*/
      },
      reArrangeImpressSlides: function() {
        let children = document.querySelector('.slide-thumb-holder').children;
        let clonedElements = [];
        for (let i = 0; i < children.length; i++) {
          let child = children[i];
          let id = (child.id).split('_')[1];
          let el = document.querySelector('#impress_slide_' + id);
          clonedElements.push(el);
        }
        let impressSlideContainer = document.querySelector('.impress-slide-container');
        impressSlideContainer.innerHTML = '';

        for(let j = 0; j < clonedElements.length; j++) {
          impressSlideContainer.appendChild(clonedElements[j]);
        }
        me.enableDrag();
      },
      setupDials: function() {
        //TODO
        /*$('#rotation-knob').knob({
          change: function(v) {
            me.rotateElement(v);
          },
        });
        $('#skew-x-knob').knob({
          change: function(v) {
            me.rotateElementX(v);
          },
        });
        $('#skew-y-knob').knob({
          change: function(v) {
            me.rotateElementY(v);
          },
        });*/

        document.querySelector('#scale-range').addEventListener('change', function(e) {
         let element = e.target;
          me.selectedOrchElement.setAttribute('data-scale', element.value);
          let id = me.selectedOrchElement.id.split('_')[1];
          document.querySelector('#slidethumb_' + id).setAttribute('data-scale', element.value);
        });

        document.querySelector('#depth-range').addEventListener('change', function(e) {
         let element = e.target;
          me.selectedOrchElement.setAttribute('data-z', element.value);
          let id = me.selectedOrchElement.id.split('_')[1];
          document.querySelector('#slidethumb_' + id).setAttribute('data-z', element.value);
        });
        document.querySelector('.transform-label').style.verticalAlign = 'top';

      },
      rotateElement: function(value) {
        let rotx = me.selectedOrchElement.getAttribute('data-rotate-x');
        let roty = me.selectedOrchElement.getAttribute('data-rotate-y');
        let s = '';
        if (rotx !== undefined)
          s += 'rotateX(' + rotx + 'deg)';
        if (roty !== undefined)
          s += 'rotateY(' + roty + 'deg)';

        let str = s + ' rotate(' + value + 'deg)';
        me.selectedOrchElement.style.transform= str;
        me.selectedOrchElement.setAttribute('data-rotate', value);

        let id = me.selectedOrchElement.id.split('_')[1];

        let slideThumbId = document.querySelector('#slidethumb_' + id);
        slideThumbId.setAttribute('data-rotate-x', rotx);
        slideThumbId.setAttribute('data-rotate-y', roty);
        slideThumbId.setAttribute('data-rotate', value);
        slideThumbId.setAttribute('data-transform-string', str);
      },
      rotateElementX: function(value) {
        let roty = me.selectedOrchElement.getAttribute('data-rotate-y');
        let s = '';
        if (roty !== undefined)
          s += 'rotateY(' + roty + 'deg)';

        let str = s + ' rotateX(' + value + 'deg)';
        me.selectedOrchElement.style.transform = str;
        me.selectedOrchElement.setAttribute('data-rotate', value);
        me.selectedOrchElement.setAttribute('data-rotate-x', value);

        let id = me.selectedOrchElement.id.split('_')[1];

        let slideThumbId = document.querySelector('#slidethumb_' + id);
        slideThumbId.setAttribute('data-rotate-x', value);
        slideThumbId.setAttribute('data-rotate-y', roty);
        slideThumbId.setAttribute('data-rotate', rot);
        slideThumbId.setAttribute('data-transform-string', str);
      },
      rotateElementY: function(value) {
        let rotx = me.selectedOrchElement.getAttribute('data-rotate-x');
        let s = '';
        if (rotx !== undefined)
          s += 'rotateX(' + rotx + 'deg)';

        let str = s + ' rotateY(' + value + 'deg)';
        me.selectedOrchElement.style.transform = str;
        me.selectedOrchElement.setAttribute('data-rotate', value);
        me.selectedOrchElement.setAttribute('data-rotate-y', value);

        let id = me.selectedOrchElement.id.split('_')[1];

        let slideThumbId = document.querySelector('#slidethumb_' + id);
        slideThumbId.setAttribute('data-rotate-x', rotx);
        slideThumbId.setAttribute('data-rotate-y', value);
        slideThumbId.setAttribute('data-rotate', rot);
        slideThumbId.setAttribute('data-transform-string', str);
      },
      enableDrag: function() {
        //TODO
        document.querySelectorAll('.slidelement').forEach(function(element){

          element.addEventListener("click",function(e){
            e.stopPropagation();
            //$(this).draggable({disabled: true});
            document.querySelectorAll('.slidelement').forEach(function(subElement){
              subElement.classList.remove('elementselected');
            });

            me.selectElement(element);
            me.setMenuControlValues(element);
            me.positionTransformControl();
            //$('#play').css('transform', 'matrix(1, 0, 0, 1, 0, 0)');
          });

          //mousedown et mouseover
          element.addEventListener("mousedown",function(e){
            e.stopPropagation();
            //$(this).draggable({disabled: true});
            document.querySelectorAll('.slidelement').forEach(function(subElement){
              subElement.classList.remove('elementselected');
            });

            me.selectElement(element);
            me.setMenuControlValues(element);
            me.positionTransformControl();
            //$('#play').css('transform', 'matrix(1, 0, 0, 1, 0, 0)');
          });

          element.addEventListener("mouseup",function(e){
            me.generateScaledSlide(me.selectedSlide);
          })
        })
        /*$('.slidelement').draggable().on('dblclick', function(e) {
              e.stopPropagation();
              $(this).draggable({disabled: false});
              $('#play').css('display', 'none');
              $('#spandelete').css('display', 'none');
              $(this).removeClass('movecursor');
            });*/
      },
      positionTransformControl: function() {
        let play = document.querySelector('#play');
        let _transform = me.selectedElement.style.transform;
        let selector_spandelete = document.querySelector('#spandelete');

        play.style.transform =  _transform;
        play.style.display =  'block';
        selector_spandelete.style.display = 'block';
        play.style.width = me.selectedElement.style.width;
        play.style.left = me.selectedElement.offsetLeft + 'px';
        play.style.top = me.selectedElement.offsetTop + 'px';

        selector_spandelete.addEventListener('click', function(e) {
          e.stopPropagation();
          me.selectedElement.remove();
          play.style.display = 'none';
          document.querySelector('#spandelete').style.display = 'none';
        });
      },
      setMenuControlValues: function(el) {
        let isbold = (el.getAttribute('data-isbold') === 'true');
        let isitalic = (el.getAttribute('data-isitalic') === 'true');
        let isunderline = (el.getAttribute('data-isunderline') === 'true');
        let isalignleft = (el.getAttribute('data-isalignleft') === 'true');
        let isaligncenter = (el.getAttribute('data-isaligncenter') === 'true');
        let isalignright = (el.getAttribute('data-isalignright') === 'true');

        if (isbold)
          document.querySelector('#make-bold').classList.add('active');
        else
          document.querySelector('#make-bold').classList.remove('active');

        if (isitalic)
          document.querySelector('#make-italic').classList.add('active');
        else
          document.querySelector('#make-italic').classList.remove('active');

        if (isunderline)
          document.querySelector('#make-underline').classList.add('active');
        else
          document.querySelector('#make-underline').classList.remove('active');

        if (isalignleft)
          document.querySelector('#make-align-left').classList.add('active');
        else
          document.querySelector('#make-align-left').classList.remove('active');

        if (isaligncenter)
          document.querySelector('#make-align-center').classList.add('active');
        else
          document.querySelector('#make-align-center').classList.remove('active');

        if (isalignright)
          document.querySelector('#make-align-right').classList.add('active');
        else
          document.querySelector('#make-align-right').classList.remove('active');

      },
      selectElement: function(el) {
        me.selectedElement = el;
      },
      setupColorpicker: function() {
        const pickrMain = Pickr.create({
          el: '#colorpicker-btn',
          theme: 'nano',
          swatches: [
            'rgba(244, 67, 54, 1)',
            'rgba(233, 30, 99, 1)',
            'rgba(156, 39, 176, 1)',
            'rgba(103, 58, 183, 1)',
            'rgba(63, 81, 181, 1)',
            'rgba(33, 150, 243, 1)',
            'rgba(3, 169, 244, 1)',
            'rgba(0, 188, 212, 1)',
            'rgba(0, 150, 136, 1)',
            'rgba(76, 175, 80, 1)',
            'rgba(139, 195, 74, 1)',
            'rgba(205, 220, 57, 1)',
            'rgba(255, 235, 59, 1)',
            'rgba(255, 193, 7, 1)'
          ],
          lockOpacity: true,
          useAsButton: true,
          components: {
            hue: true,
            preview: true,
            interaction: {
              hex: true,
              input: true
            }
          },
        });
        pickrMain.on('change', (color) => {
          me.colorSelectedElement(color);
        });



        const pickrGraphique = Pickr.create({
          el: '#preview-graphique-add-donnee-color',
          theme: 'nano',
          appClass: 'w-100',
          swatches: [
            'rgba(244, 67, 54, 1)',
            'rgba(233, 30, 99, 1)',
            'rgba(156, 39, 176, 1)',
            'rgba(103, 58, 183, 1)',
            'rgba(63, 81, 181, 1)',
            'rgba(33, 150, 243, 1)',
            'rgba(3, 169, 244, 1)',
            'rgba(0, 188, 212, 1)',
            'rgba(0, 150, 136, 1)',
            'rgba(76, 175, 80, 1)',
            'rgba(139, 195, 74, 1)',
            'rgba(205, 220, 57, 1)',
            'rgba(255, 235, 59, 1)',
            'rgba(255, 193, 7, 1)'
          ],
          lockOpacity: true,
          inline: true,
          showAlways: true,
          useAsButton: true,
          components: {
            hue: true,
            preview: true,
            interaction: {
              hex: true,
              input: true
            }
          },
        });
        pickrGraphique.on('change', (color) => {
          me.graphiqueColor = color.toRGBA().toString(0);
        });
      },
      addSettingsPanel: function() {
        this.removeListeners();
        this.attachListeners();
      },
      manageGlobalClick: function() {

        let slideElement = document.querySelector('.slidelement');
        if(slideElement){
        //TODO
        //slideElement.draggable({disabled: false});
        }
        document.querySelector('#play').style.display = 'none';
        document.querySelector('#spandelete').style.display = 'none';

        me.generateScaledSlide(me.selectedSlide);
      },
      colorSelectedElement: function(color) {
        let rgba = color.toRGBA().toString(0);
        if (me.selectedElement){
          if (me.selectedElement.localName === 'svg'){
            me.selectedElement.style.fill = rgba;
          } else {
            me.selectedElement.style.color = rgba;
          }
        }
      },
      addSlide: function() {
        let thumb = slidethumb;
        let uid = me.generateUID();
        thumb = thumb.split('slidethumb_^UID^').join('slidethumb_' + uid);
        document.querySelector('.slide-thumb-holder').insertAdjacentHTML('beforeend', thumb);

        let slideThumbId = document.querySelector('#slidethumb_' + uid);
        slideThumbId.animate({opacity: 1}, 200);
        slideThumbId.setAttribute('data-left', '0px');
        slideThumbId.setAttribute('data-top', '0px');

        slideThumbId.querySelector('.deletebtn').addEventListener('click', function(e) {
          let element = e.target;
          let slideid = element.getAttribute('data-parent').split('_')[1];
          slideThumbId.remove();
          document.querySelector('#impress_slide_' + slideid).remove();
          me.selectThumb("first")
        });

        document.querySelectorAll('.slidemask ').forEach(function(element){
          element.addEventListener("click", function(e){
            e.stopPropagation();

            document.querySelectorAll('.slidethumb').forEach(function(subElement){
              subElement.classList.remove('currentselection');
            });

            let id = (e.target.id).split('_')[1];
            me.selectSlide('#impress_slide_' + id);
            document.querySelector('#slidethumb_' + id).classList.add('currentselection');
            me.hideTransformControl();
            me.switchView('right');
          })
        });
        me.addImpressSlide(uid);
        me.switchView('right');
        me.selectThumb("last");
      },
      addImpressSlide: function(id) {
        let islide = impress_slide;
        islide = islide.split('__slidenumber__').join('_' + id);
        islide = islide.split('slidelement_id').join('slidelement_' + me.generateUID());
        document.querySelector('.impress-slide-container').insertAdjacentHTML('beforeend', islide);

        let selector_impress_slide_new = document.querySelector('#impress_slide_' + id);
        selector_impress_slide_new.classList.add('impress-slide-element');
        me.removeAllStyles(selector_impress_slide_new);
        me.applyStyle();
        me.generateScaledSlide('#impress_slide_' + id);

        me.selectSlide('#impress_slide_' + id);
        me.enableDrag();
      },
      addImpressSlideItem: function(el) {
        let typeText = document.querySelector('#dropdownMenuButton1').value;
        let item;

        switch (typeText) {
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

        item = item.split('slidelement_id').join('slidelement_' + me.generateUID());
        document.querySelector(el).insertAdjacentHTML('beforeend', item);

        me.enableDrag();
        me.generateScaledSlide(me.selectedSlide);
      },
      generateScaledSlide: function(el) {
        if(document.querySelector(el)){
          let newel = document.querySelector(el).cloneNode(true);
          let id;
          let slideThumbId;
          let children;
          if (!newel) {
            return;
          }

          id = newel.id.split('_')[2];
          slideThumbId = document.querySelector('#slidethumb_' + id);
          children = slideThumbId.children;
          newel.id = 'clonethumb_' + id;
          newel.setAttribute('data-clone', true);
          newel.style.transform = 'translate(-41%, -41%) scale(0.172)';
          newel.classList.remove('impress-slide-element');
          let child;
          for (let i = 0; i < children.length; i++) {
            child = children[i];
            if (child.getAttribute('data-clone') === 'true')
              child.remove();
          }
          slideThumbId.appendChild(newel);
        }
      },
      selectSlide: function(id) {
        let children = document.querySelector('.impress-slide-container').children;

        for (let i = 0; i < children.length; i++) {
          let child = children[i];
          let childid = '#' + child.id;
          if (childid === id) {
            document.querySelector(childid).style.zIndex =  1;
            me.selectedSlide = childid;
          } else
            document.querySelector(childid).style.zIndex =  -200 + (-(Math.round(Math.random() * 1000)));
        }
      },
      generateUID: function() {
        let id
        do{
          id = Math.round(Math.random() * 10000);
        }while (document.querySelector('slidelement_' + id));
        return id;
      },
      assemblePanoramaCases: function() {
        let panoramaViewport = document.querySelector('.panorama-viewport');
        let orchestrationElements = [];
        let children = document.querySelector('.slide-thumb-holder').children;
        let l = 10;
        panoramaViewport.innerHTML = '';

        let child;
        let clone;
        for (let i = 0; i < children.length; i++) {
          child = children[i];
          clone = child.cloneNode(true);
          clone.classList.remove('slidethumb');
          clone.classList.add('orchthumb');
          clone.id = 'orchestrationelement_' + child.id.split('_')[1];
          clone.style.opacity = 1;
          clone.style.position = 'absolute';
          clone.style.transform = clone.getAttribute('data-transform-string');

          clone.querySelector('.deletebtn').remove();
          //TODO
          /*clone.draggable().on('mouseup', function() {
            $(this).attr('data-left', $(this).css('left'));
            $(this).attr('data-top', $(this).css('top'));
            console.log('accessing ', $(this).attr('id'));
            id = $(this).attr('id').split('_')[1];

            let selector_slidethumb_id = $('#slidethumb_' + id);
            selector_slidethumb_id.attr('data-left', $(this).css('left'));
            selector_slidethumb_id.attr('data-top', $(this).css('top'));
          });*/

          clone.addEventListener('click', function(e) {
            let element = e.target;
            document.querySelector('.orchthumb').classList.remove('currentselection');
            element.classList.add('currentselection');
            me.selectedOrchElement = element;

            let rot = me.selectedOrchElement.getAttribute('data-rotate');
            let rotx = me.selectedOrchElement.getAttribute('data-rotate-x');
            let roty = me.selectedOrchElement.getAttribute('data-rotate-y');
            let scale = me.selectedOrchElement.getAttribute('data-scale');
            let depth = me.selectedOrchElement.getAttribute('data-z');

            document.querySelector('#rotation-knob').value = rot || 0
            document.querySelector('#rotation-knob').dispatchEvent(new Event('change'))
            document.querySelector('#skew-x-knob').value = rotx || 0
            document.querySelector('#skew-x-knob').dispatchEvent(new Event('change'))
            document.querySelector('#skew-y-knob').value = roty || 0
            document.querySelector('#skew-y-knob').dispatchEvent(new Event('change'))

            document.querySelector('#scale-range').value = scale || 1;
            document.querySelector('#depth-range').value = depth || 1000;
          });
          panoramaViewport.appendChild(clone);
          orchestrationElements.push(clone);

          l += 200;
        }
        me.repositionOrchestrationElements(orchestrationElements);
      },
      repositionOrchestrationElements: function(arr) {
        let children = document.querySelector('.slide-thumb-holder').children;
        for (let i = 0; i < arr.length; i++) {
          arr[i].style.left = children[i].getAttribute('data-left');
          arr[i].style.top = children[i].getAttribute('data-top');
        }
      },
      switchView: function(direction) {

        if (direction === 'left') {
          document.querySelector('#new-panorama-panel').innerHTML =
              '<div class="sb-nav-link-icon">' +
              '<i id="view-toggle-icon" class="fas fa-chevron-left"></i>' +
              '</div>Mode edition';
          document.querySelector('.main-grey-area').style.display = 'none';
          document.querySelector('.panorama-grey-area').style.display = 'block';
          me.currentview = 'orchestration';
          me.assemblePanoramaCases();
        } else {
          document.querySelector('#new-panorama-panel').innerHTML =
              '<div class="sb-nav-link-icon">' +
              '<i id="view-toggle-icon" class="fas fa-th"></i>' +
              '</div>Panorama';
          document.querySelector('.main-grey-area').style.display = 'block';
          document.querySelector('.panorama-grey-area').style.display = 'none';
          me.currentview = 'mainarea';
          me.persistOrchestrationCoordinates();
        }
      },
      persistOrchestrationCoordinates: function() {
        let children = document.querySelector('.panorama-viewport').children;
        me.orchestrationcoords = [];

        let child
        let l
        let t

        for (let i = 0; i < children.length; i++) {
          child = children[i];
          l = child.getAttribute('data-left');
          t = child.getAttribute('data-top');
          me.orchestrationcoords.push({left: l, top: t});
        }
      },
      onViewToggled: function() {
        if (me.currentview === 'mainarea')
          me.switchView('left');
        else
          me.switchView('right');
      },
      openCodeExportWindow: function() {
        me.generateExport();
        me.exportCodeModal.show();
      },
      attachListeners: function() {
        let slideElement = document.querySelector('.slidelement');
        let openPresoBtn = document.querySelector('.openpresobtn')
        document.querySelector('html').addEventListener('click', me.manageGlobalClick);
        document.querySelector('#new-preso-panel').addEventListener('click', me.onNewPresentationItemClicked);
        document.querySelector('#new-panorama-panel').addEventListener('click', me.onViewToggled);
        if(slideElement){
          slideElement.addEventListener('click', me.triggerElementEdit);
          slideElement.addEventListener('mouseup', me.createEditor);
        }
        document.querySelector('#change-font-btn').addEventListener('click', me.openStyleSelector);
        document.querySelector('#export-preso-panel').addEventListener('click', me.openCodeExportWindow);
        document.querySelector('#create-presentation').addEventListener('click', function() {
          if (me.mode === 'create')
            me.createNewPresentation();
          else
            me.savePresentation();
        });
        document.querySelector('#save-presentation-panel').addEventListener('click', function() {
          if (me.currentPresentation) {
            document.querySelector('#title-input').value = me.currentPresentation.title;
            document.querySelector('textarea#description-input').value = me.currentPresentation.description;
          }
          me.mode = 'save';
          me.savePresentation();
        });
        document.querySelector('#open-preview-btn').addEventListener('click', function() {
          me.previewModal.hide();
        });
        document.querySelector('#add-text-btn').addEventListener('click', function() {
          me.addImpressSlideItem(me.selectedSlide);
        });
        document.querySelector('#add-image-btn').addEventListener('click', function() {
          me.newImageModal.show();
        });
        document.querySelector('#add-video-btn').addEventListener('click', function() {
          document.querySelector('.div-preview-video').innerHTML = video_template;
          me.newVideoModal.show();
        });
        document.querySelector('#add-tableau-btn').addEventListener('click', function() {
          document.querySelector('.div-tableau-previsualisation').innerHTML = tableau_previsualisation;
          me.newTableauModal.show();
        });
        document.querySelector('#add-graphique-btn').addEventListener('click', function() {
          document.querySelector('.div-graphique-previsualisation').innerHTML = graphique_previsualisation;


          me.dataGraphique = {
            labels: [
              'Jaune',
              'Orange',
              'Rose',
              'Vert',
              'Bleu',
              'Violet',
              'Gris'],
            datasets: [
              {
                label: 'Valeur',
                data: [12, 19, 3, 5, 2, 3, 10],
                backgroundColor: [
                  '#ffe600',
                  '#ff6400',
                  '#ff0062',
                  '#46c446',
                  '#3a76ff',
                  '#8634ff',
                  '#baabbb',
                ],
              }],
          };

          me.configGraphique = {
            type: 'bar',
            data: me.dataGraphique,
            options: {
              title: {
                display: true,
              },
              scales: {
                yAxes: {
                  ticks: {
                    beginAtZero: true,
                  },
                },
              },
            },
          }

          me.monGraphique = new Chart(
            document.querySelector('#preview-graphique'),
            me.configGraphique
          );
          me.newGraphiqueModal.show();
        });

        document.querySelector('#add-slide-btn').addEventListener('click', function() {
          me.addSlide();
        });

        /////////////
        // GRAPHIQUE
        /////////////

        //Prévisualisation d'un graphique
        document.querySelector('#preview-graphique-type').addEventListener('change', function() {
          me.monGraphique.destroy();
          me.configGraphique.type = document.querySelector('#preview-graphique-type').value;

          me.monGraphique = new Chart(
            document.querySelector('#preview-graphique'),
            me.configGraphique
          );

        });
        document.querySelector('#add-object-btn').addEventListener('click', function() {
          me.newObjetModal.show();
        });

        //Ajout d'un graphique
        document.querySelector('#append-graphique-btn').addEventListener('click', function() {
          let graphique = document.querySelector('#preview-graphique');
          me.addGraphiqueToSlide(graphique);
          me.newGraphiqueModal.hide();
        });

        //Ajouter une donnée
        document.querySelector('#preview-grahpique-add-donnee').addEventListener('click', function() {
          let couleur = me.graphiqueColor;
          let valeur = document.querySelector('#preview-graphique-add-donnee-val').value
          let nom = document.querySelector('#preview-graphique-add-donnee-nom').value

          me.monGraphique.data.labels.push(nom);
          me.monGraphique.data.datasets.forEach((dataset) => {
            dataset.data.push(valeur);
            dataset.backgroundColor.push(couleur);
          });
          me.monGraphique.update();
        });

        //Supprimer une donnée
        document.querySelector('#preview-grahpique-delete-donnee').addEventListener('click', function() {
          me.monGraphique.data.labels.pop();
          me.monGraphique.data.datasets.forEach((dataset) => {
            dataset.data.pop();
            dataset.backgroundColor.pop();
          });
          me.monGraphique.update();
        });

        /////////
        // IMAGE
        /////////

        //Ajout d'une image
        document.querySelector('#append-image-btn').addEventListener('click', function() {
          let image = document.querySelector('#preview-image').src;
          let width = document.querySelector('#image-width').value;
          let height = document.querySelector('#image-height').value;
          me.addImageToSlide(image, width, height);
          me.newImageModal.hide();
        });

        //Prévisualiser l'image
        document.querySelector('#image-input').addEventListener('keyup', function(e) {

          let element = e.target;
          let imageUrl = element.value;
          if (me.isValidUrl(imageUrl)) {
            let imageTmp = new Image();
            imageTmp.src = imageUrl;
            imageTmp.addEventListener('load', function() {
              let selector_preview_image = document.querySelector('#preview-image');
              selector_preview_image.setAttribute('src', imageUrl);
              document.querySelector('#image-width').value = imageTmp.width;
              document.querySelector('#image-height').value = imageTmp.height;
              selector_preview_image.css('width', imageTmp.width)
              .style.height = imageTmp.height;
            });
          } else {
            document.querySelector('#preview-image').setAttribute('src', '');
            document.querySelector('#image-width').value = 0;
            document.querySelector('#image-height').value = 0;
          }
        });

        //Resize de la largeur de l'image
        document.querySelector('#image-width').addEventListener('keyup', function(e) {
          let element = e.target;
          document.querySelector('#preview-image').style.width = element.value;
        });

        document.querySelector('#image-height').addEventListener('keyup', function(e) {
          let element = e.target;
          document.querySelector('#preview-image').style.height = element.value;
        });

        /////////
        // VIDEO
        /////////

        //Prévisualiser la vidéo
        document.querySelector('#video-input').addEventListener('keyup', function() {
          let video = document.querySelector('#video-input').value;
          if (me.isValidUrl(video)) {
            if (video.includes('www.youtube.com/watch?v=')) {
              video = video.replace('watch?v=', 'embed/');
              document.querySelector('.preview-video').src = video;
            }
          }
        });

        //Ajout d'une vidéo
        document.querySelector('#append-video-btn').addEventListener('click', function() {
          let video = document.querySelector('.preview-video');
          me.addVideoToSlide(video);

          me.newVideoModal.hide();
        });

        ///////////
        // TABLEAU
        ///////////

        //Ajout d'un tableau
        document.querySelector('#append-tableau-btn').addEventListener('click', function() {
          let contenuTableau = document.querySelector('.tableau-previsualisation');
          me.addTableauToSlide(contenuTableau);
          me.newTableauModal.hide();
        });

        //Ajout d'une ligne de tableau
        document.querySelector('#tableau-ajout-ligne').addEventListener('click', function() {
          let tableau = document.querySelector('.tableau-previsualisation');
          let ligne = tableau.insertRow(tableau.rows.length);
          let i;

          for (i = 0; i < tableau.rows[0].cells.length; i++) {
            me.creerCase(ligne.insertCell(i));
          }
        });

        //Ajout d'une colonne de tableau
        document.querySelector('#tableau-ajout-colonne').addEventListener('click', function() {
          let tableau = document.querySelector('.tableau-previsualisation');
          let i;
          for (i = 0; i < tableau.rows.length; i++) {
            me.creerCase(tableau.rows[i].insertCell(tableau.rows[i].cells.length));
          }
        });

        //Suppression d'une ligne
        document.querySelector('#tableau-suppression-ligne').addEventListener('click', function() {
          let tableau = document.querySelector('.tableau-previsualisation');
          let derniereLigne = tableau.rows.length - 1;
          if (derniereLigne !== 0)
            tableau.deleteRow(derniereLigne);
        });

        //Suppression d'une colonne
        document.querySelector('#tableau-suppression-colonne').addEventListener('click', function() {
          let tableau = document.querySelector('.tableau-previsualisation');
          let derniereColonne = tableau.rows[0].cells.length - 1;
          let i;
          for (i = 0; i < tableau.rows.length; i++) {
            if (derniereColonne !== 0)
              tableau.rows[i].deleteCell(derniereColonne);
          }
        });

        document.querySelector('#open-presentations-panel').addEventListener('click', function() {

          document.querySelectorAll('.deletepresobtn').forEach(element=>{
            element.addEventListener('click', function() {
              if (confirm('Êtes-vous sûr de vouloir supprimer cette présentation ?'))
                me.deleteSavedPresentation(element.getAttribute('data-id'));
            });
          });

          document.querySelectorAll('.openpresobtn').forEach(element=>{
            element.addEventListener('click', function() {
              me.mode = 'save';
              me.openPresentationForEdit(parseInt(element.getAttribute('data-id')));
            });
          });

          me.newAllPresentationsModal.show();
        });

        document.querySelector('#import-objet-panel').addEventListener('click', function() {
          me.newImportObjetModal.show();
        });

        let objimport
        document.querySelector('#objinput').addEventListener('change', function(e) {
          let self = document.querySelector('#objinput');
          if(self.files.length > 0) {
            objimport = self.files[0];
            if (!objimport.name.includes('.obj')) {
              self.value = '';
              new bs_toast.Toast({
                body: 'Vous devez importer un fichier <b>.obj</b>.',
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
              }).show()
            }
          }
        });

        let mtlimport
        document.querySelector('#mtlinput').addEventListener('change',function(element) {
          let self = document.querySelector('#mtlinput');
          if(self.files.length > 0) {
            mtlimport = self.files[0];
            if (!mtlimport.name.includes('.mtl')) {
              self.value = '';
              new bs_toast.Toast({
                body: 'Vous devez importer un fichier <b>.mtl</b>.',
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
              }).show()
            }
          }
        });


        document.querySelector('#imginput').addEventListener('change',function(e) {
          let element = document.querySelector('#imginput');
          if (element.files.length > 0) {

            let imgimport;
            let formdata;

            for (let n = 0; n < element.files.length; n++) {
              imgimport = element.files[n];
              formdata  = new FormData();
              if (!imgimport.type.includes('image/jpeg')) {
                document.querySelector('#imginput').value = '';
                new bs_toast.Toast({
                  body: 'Vous devez importer un fichier <b>.jpg</b>.',
                  className: 'border-0 bg-danger text-white',
                  btnCloseWhite: true,
                }).show()

              } else {
                formdata.append('img', imgimport);
                formdata.append('idUser', user_id_ajax);

                fetch('App/Ajax/texturejpg_importAjax.php', {
                  method: 'POST',
                  cache: 'no-cache',
                  body: formdata,
                }).then(data => {
                  me.afficheMesObj(data);
                }).catch(error => {
                  console.log(error);
                });
              }
            }
          }
        });

        document.querySelector('#import-objet-3d').addEventListener('click', function() {
          let objinput = document.querySelector('#mtlinput').value;

          if (objinput !== '') {
            let formdata = new FormData();
            formdata.append('obj', objimport);
            formdata.append('mtl', mtlimport);
            formdata.append('idUser', user_id_ajax);

            fetch('App/Ajax/objet3d_importAjax.php', {
              method: 'POST',
              cache: 'no-cache',
              body: formdata,
            }).then(data => {
              me.afficheMesObj(data);

              let objurl = objimport.name + '.html';
              me.addMyObjectToSlide(objurl);
              me.newImportObjetModal.hide();
            }).catch(error => {
              console.log(error);
            });
          } else {
            new bs_toast.Toast({
              body: 'Veuillez importer vos fichiers <b>.mtl</b> et <b>.obj</b>.',
              className: 'border-0 bg-danger text-white',
              btnCloseWhite: true,
            }).show()
          }
        });

        document.querySelector('#open-mesObj-panel').addEventListener('click', function() {
          document.querySelector('#savedobjects').options.length = 0;
          me.newSavedObjetModal.show();
          let data = {idUser: user_id_ajax};

          fetch('App/Ajax/mesobjet3d_affichageAjax.php', {
            method: 'POST',
            cache: 'no-cache',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
          }).then(data => {
            return data.json();
          }).then(data => {
            me.afficheMesObj(data);
          }).catch(error => {
            console.log(error);
          });
        });

        let urlmyobj;
        document.querySelector('#savedobjects').addEventListener('change', function(e) {
          let element = document.querySelector('#savedobjects');
          urlmyobj = element.options[element.selectedIndex].value;
          document.querySelector('#previewobj').src =
              'uploads/' + user_id_ajax + '/' + urlmyobj;
        });

        document.querySelector('#append-myobject-btn').addEventListener('click', function() {
          me.addMyObjectToSlide(urlmyobj);
          me.newSavedObjetModal.hide();
        });

        document.querySelector('#add-svg-btn').addEventListener('click', function() {
          me.newSvgModal.show();
        });

        /**
         * Objet
         */
       let objet;
        document.querySelectorAll('.objet-thumbnail').forEach(function(element){
          element.addEventListener('click', function(e) {
            document.querySelectorAll('.objet-thumbnail').forEach(function(subElement){
              subElement.style.borderBottom = '1px dotted #DDD';
            });
            element.style.borderBottom = '2px solid #6f2232';
            objet = element.getAttribute('data-nom');
          });
        })

        document.querySelector('#append-object-btn').addEventListener('click', function() {
          me.addObjectToSlide(objet);
          me.newObjetModal.hide();
        });


        /**
         * Svg
         */

        let forme;
        document.querySelectorAll('.svg-thumbnail').forEach(function(element){
          element.addEventListener('click', function(e) {
            document.querySelectorAll('.svg-thumbnail').forEach(function(subElement){
              subElement.style.borderBottom = '1px dotted #DDD';
            });
            element.style.borderBottom = '2px solid #6f2232';
            forme = element.getAttribute('data-nom');
          });
        })

        document.querySelector('#append-svg-btn').addEventListener('click', function() {
          console.log(forme);
          forme = me.pickSvg(forme);
          me.addSvgToSlide(forme);
          me.newSvgModal.hide();
        });


        /**
         * Police
         */
        document.querySelectorAll('.style-thumbnail').forEach(function(element){
          element.addEventListener('click', function(e) {
            document.querySelectorAll('.style-thumbnail').forEach(function(subElement){
              subElement.style.borderBottom = '1px dotted #DDD';
            });
            element.style.borderBottom = '2px solid #6f2232';
            me.theme = element.getAttribute('data-style');
          });
        })

        document.querySelector('#apply-style-btn').addEventListener('click', function(e) {
          me.applyStyle();
          me.newPoliceModal.hide();
        });

        document.querySelector('#night-mode').addEventListener('click', function() {
          me.toggleDayNightMode();
        });

      },
      applyStyle: function() {
        document.querySelectorAll('.slidelement').forEach(function(element) {
          if (element.classList.contains('slidelementh1'))
            me.removeAllStyles(element);
          element.classList.add(me.theme);
        });
      },
      removeAllStyles: function(el) {
        el.classList.remove('quicksand');
        el.classList.remove('montserrat');
        el.classList.remove('sketch');
        el.classList.remove('miltonian');
      },
      openStyleSelector: function() {
        me.newPoliceModal.show();
      },
      deleteSavedPresentation: function(id) {
        let data = {presentation_id: id};
        fetch('App/Ajax/presentations_suppressionAjax.php', {
          method: 'POST',
          cache: 'no-cache',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data),
        }).then(data => {
          return data.json();
        }).then(data => {
          document.location.reload(true);
        }).catch(error => {
          console.log(error);
        });
      },
      generateExport: function(isPreview) {
        let children = document.querySelector('.slide-thumb-holder').children;
        let child;
        let coords;
        let id;
        let l;
        let t;
        let el;
        let selector_slide_container = document.querySelector('.impress-slide-container');
        let outputcontainer = selector_slide_container.cloneNode(true);

        for (let i = 0; i < children.length; i++) {
          child = children[i];
          id = child.id.split('_')[1];
//          editor.contentEditable = 'true';

          l = child.getAttribute('data-left').split('px')[0];
          t = child.getAttribute('data-top').split('px')[0];

          coords = me.calculateSlideCoordinates(l, t);
          el = document.querySelector('#impress_slide_' + id);
          el.setAttribute('data-x', coords.x - 500);
          el.setAttribute('data-y', coords.y);
          el.setAttribute('data-rotate', child.getAttribute('data-rotate'));
          el.setAttribute('data-rotate-x', child.getAttribute('data-rotate-x'));
          el.setAttribute('data-rotate-y', child.getAttribute('data-rotate-y'));
          el.setAttribute('data-z', child.getAttribute('data-z'));
          el.setAttribute('data-scale', child.getAttribute('data-scale'));
          el.classList.add('step');
        }

        outputcontainer.querySelectorAll('.impress-slide').forEach(function(element) {
          element.style.width = '1024px';
          element.style.height = '768px';
        });

        if (isPreview)
          me.generatePreview(outputcontainer.innerHTML);

        let codeExport = selector_slide_container.innerHTML;

        let presentation_export = export_template;
        presentation_export = presentation_export
        .split('__slidetitle__')
        .join(me.currentPresentation.title);

        presentation_export = presentation_export
        .split('__contenuslide__')
        .join(codeExport);

        presentation_export = presentation_export
        .replace(/contenteditable="true"/g, '');

        fetch('App/Ajax/presentations_exporterAjax.php', {
          method: 'POST',
          cache: 'no-cache',
          headers: {
            'Content-Type': 'application/json',
          },
          body: presentation_export,
        }).then(data => {
          return data.json();
        }).then(data => {
          window.open('/ThreeJS_Presentation/presentation_telecharger?nom_ficher='+data.path, '_blank');
        }).catch(error => {
          console.log(error);
        });

      },
      createNewPresentation: function() {
        $('.slide-thumb-holder').html('');
        $('.impress-slide-container').html();
        me.addSlide();
        me.savePresentation();
      },
      openPresentationForEdit: function(id) {
        for (let i = 0; i < me.mypresentations.length; i++) {
          let presentation = me.mypresentations[i];
          if (id === presentation.id) {
            document.querySelector('.impress-slide-container').innerHTML = presentation.contents;
            document.querySelector('.slide-thumb-holder').innerHTML = presentation.thumbcontents;
            me.selectedSlide = ".impress-slide-container .impress-slide-element";
            me.currentPresentation = presentation;

            document.querySelector('#presentation-metatitle').innerHTML = me.currentPresentation.title;
          }
          me.newAllPresentationsModal.hide();
        }
        document.querySelectorAll('.slidemask').forEach(function(element){
          element.addEventListener("click", function(e){
            e.stopPropagation();
            id = (e.target.id).split('_')[1];
            me.selectSlide('#impress_slide_' + id);
            document.querySelectorAll('.slidethumb').forEach(function(element) {
              element.classList.remove('currentselection');
            });
            document.querySelector('#slidethumb_' + id).classList.add('currentselection');
            me.hideTransformControl();
            me.switchView('right');
          })
        });

        document.querySelectorAll('.deletebtn').forEach(function(element){
          element.addEventListener('click',function(){
            let selector = element.getAttribute('data-parent');
            let p = document.querySelector('div #' + selector);
            let slideid = element.getAttribute('data-parent').split('_')[1];

            p.remove();
            document.querySelector('#impress_slide_' + slideid).remove();
            me.selectThumb("first")
          })
        })
        me.enableDrag();
        me.selectThumb("first");
      },
      fetchAndPreview: function(id) {
        for (let i = 0; i < me.mypresentations.length; i++) {
          presentation = me.mypresentations[i];
          if (id === presentation.id) {
            let selector_placeholder = document.querySelector('.placeholder');
            selector_placeholder.innerHTML = presentation.contents;
            selector_placeholder.querySelectorAll('.impress-slide').forEach(function(element) {
              element.style.width = '1024px';
              element.style.height = '768px';
              element.classList.add('step');
            });
            me.generatePreview(selector_placeholder.innerHTML);
            me.newAllPresentationsModal.hide();
            break;
          }
        }
      },
      savePresentation: async function() {
        document.querySelector('#save-presentation-panel').innerHTML =
            '<div class="sb-nav-link-icon">' +
            '<i class=\"fas fa-save\"></i>' +
            '</div>Sauvegarde en cours...';
        let tempid = 0;

        if (me.mode === 'save') {
          if (me.currentPresentation)
            tempid = me.currentPresentation.id;
        }
        if(tempid === 0){
          tempid = Math.round(Math.random() * 201020);
        }

        console.log(tempid);
        let o = {
          id: tempid,
          title: document.querySelector('#title-input').value,
          description: document.querySelector(
              'textarea#description-input').value,
          contents: document.querySelector(
              '.impress-slide-container').innerHTML,
          thumbcontents: document.querySelector(
              '.slide-thumb-holder').innerHTML,
          theme: me.theme,
        };

        me.currentPresentation = o;

        let presentationIdRetour = await me.sauvegarderBDDAsync(o);
        presentationIdRetour.json().then(function(presentationId){
          me.currentPresentation.id = presentationId
        });

        let presentationsAsync = await me.getSavedPresentationsAsync();
        presentationsAsync.json().then(function(presentations) {
          presentations.reverse();
          me.renderPresentations(presentations);
        });

        document.querySelectorAll(".openpresobtn").forEach(function(element){
          element.addEventListener('click', function(e){
            me.mode = 'save';
            me.openPresentationForEdit(parseInt($(this).attr('data-id')));
          })
        })

        me.newAllPresentationsModal.hide();
        setTimeout(me.resetSaveButtonText, 1000);
      },
      resetSaveButtonText: function() {
        document.querySelector('#save-presentation-panel').innerHTML =
            '<div class="sb-nav-link-icon">' +
            '<i class=\"fas fa-check-circle\"></i>' +
            '</div>Sauvegarde réussie!';

        setTimeout(function() {
          document.querySelector('#save-presentation-panel').innerHTML =
              '<div class="sb-nav-link-icon">' +
              '<i class=\"fas fa-save\"></i>' +
              '</div>Sauvegarder';
        }, 1000);
      },
      sauvegarderBDDAsync: function(tableau) {
        let data = {user_id: me.userId, new_presentation: tableau};

        return fetch('App/Ajax/presentations_sauvegarderAjax.php', {
          method: 'POST',
          cache: 'no-cache',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data),
        })
      },
      async getSavedPresentationsAsync() {
        return await me.getItemsAsync();
      },
      generatePreview: function() {
        let openPreview = document.querySelector('#open-preview-btn');

        me.previewModal.show();

        openPreview.classList.add('disabled');
        openPreview.classList.remove('btn-primary');
        document.querySelector('#progressmeter').style.display = 'block';
        document.querySelector('#previewmessage').innerHTML =
            'Veuillez patienter durant la génération de la prévisualisation.';
      },
      calculateSlideCoordinates: function(wx, wy) {
        let vx = Math.round(
            ((me.vxmax - me.vxmin) / (me.wxmax - me.wxmin)) * (wx - me.wxmin) +
            me.vxmin);
        let vy = Math.round(
            ((me.vymax - me.vymin) / (me.wymax - me.wymin)) * (wy - me.wymin) +
            me.vymin);
        return {x: vx, y: vy};
      },
      addImageToSlide: function(src, width, height) {
        let img = new Image();

        img.id = 'slidelement_' + me.generateUID();
        img.style.position = 'absolute';
        img.style.left = '345px';
        img.style.top = '0px';
        img.classList.add('slidelement');
        img.src = src;

        if (width !== '' && height !== '') {
          img.style.width = width + 'px';
          img.style.height = height + 'px';
        }

        document.querySelector(me.selectedSlide).appendChild(img);
        me.enableDrag();
      },
      addVideoToSlide: function(video) {
        video.id = 'slidelement_' + me.generateUID();
        video.classList.add('slidelement');
        video.width = '426';
        video.height = '340';
        video.style.width ='426';
        video.style.height ='340';
        video.style.border ='solid 6px';
        video.classList.remove('preview-video');

        document.querySelector(me.selectedSlide).appendChild(video);
        me.enableDrag();
      },
      addTableauToSlide: function(contenuTableau) {
        contenuTableau.id = 'slidelement_' + me.generateUID();
        contenuTableau.classList.add('slidelement');
        contenuTableau.style.position = 'absolute';
        contenuTableau.style.top = '0';
        contenuTableau.style.left = '450px';
        contenuTableau.classList.remove('table-responsive');
        contenuTableau.classList.remove('tableau-previsualisation');

        document.querySelector(me.selectedSlide).appendChild(contenuTableau);
        me.enableDrag();
      },
      addGraphiqueToSlide: function(graphique) {
        graphique.id =  'slidelement_' + me.generateUID();
        graphique.classList.add('slidelement');
        graphique.style.position = 'absolute';
        graphique.style.top = '0';
        graphique.style.left= '260px';

        let div = document.createElement("div")
        div.style.width = "400px";
        div.style.height = "400px";
        div.appendChild(graphique);

        console.log(me.selectedSlide);
        console.log(div);
        document.querySelector(me.selectedSlide).appendChild(div);
        me.enableDrag();
      },
      creerCase: function(cell) {
        let txt = document.createTextNode('Case');

        cell.contentEditable = 'true';
        cell.appendChild(txt);
      },
      addObjectToSlide: function(obj) {
        let iframe = me.addElementToSlide('http://' + me.obj3dUrl + 'public/lib/objets3d/' + obj + '.html');

        document.querySelector('.accordion').appendChild(iframe);
        document.querySelector(me.selectedSlide).appendChild(iframe);
        me.enableDrag();
      },
      addMyObjectToSlide: function(obj) {
        let iframe = me.addElementToSlide('http://' + me.obj3dUrl + 'uploads/' + user_id_ajax + '/' + obj);

        document.querySelector('.accordion').appendChild(iframe);
        document.querySelector(me.selectedSlide).appendChild(iframe);
        me.enableDrag();
      },
      addElementToSlide: function(url){
        let iframe = document.createElement('iframe');
        iframe.id = 'slidelement_' + me.generateUID();
        iframe.width = '500';
        iframe.height = '500';
        iframe.src = url;
        iframe.className = 'slidelement';
        iframe.frameborder = '5';
        iframe.style.width = '200px';
        iframe.style.height = '200px';
        return iframe;
      },
      addSvgToSlide: function(forme) {
        forme.id = 'slidelement_' + me.generateUID();
        forme.style.left = '200px';
        forme.style.top = '0px';
        forme.classList.add('slidelement');

        document.querySelector(me.selectedSlide).appendChild(forme);
        me.enableDrag();
      },
      pickSvg: function(forme) {
        let svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        let polygon;

        switch (forme) {
          case 'pentagon':
            svg.setAttribute('viewBox', '0 0 200 200');
            svg.setAttribute('preserveAspectRatio', 'none');
            svg.setAttribute('width', '100');
            svg.setAttribute('height', '100');

            polygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
            polygon.setAttribute('points', '156.427384220077,186.832815729997 43.5726157799226,186.832815729997 8.69857443566525,79.5015528100076 100,13.1671842700025 191.301425564335,79.5015528100076');
            polygon.setAttribute('id', 'pentagon');
            console.log(polygon);
            svg.appendChild(polygon);
            console.log(svg);
            break;
          case 'circle':
            svg.setAttribute('viewBox', '0 0 80 80');
            svg.setAttribute('preserveAspectRatio', 'none');
            svg.setAttribute('width', '100');
            svg.setAttribute('height', '100');

            let circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
            circle.setAttribute('cx', '40');
            circle.setAttribute('cy', '40');
            circle.setAttribute('r', '40');

            svg.appendChild(circle);
            break;
          case 'rectangle':
            svg.setAttribute('viewBox', '0 0 50 50');
            svg.setAttribute('preserveAspectRatio', 'none');
            svg.setAttribute('width', '100');
            svg.setAttribute('height', '100');

            let rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
            rect.setAttribute('width', '50');
            rect.setAttribute('height', '50');

            svg.appendChild(rect);
            break;
          case 'triangle':
            svg.setAttribute('viewBox', '0 0 50 50');
            svg.setAttribute('preserveAspectRatio', 'none');
            svg.setAttribute('width', '100');
            svg.setAttribute('height', '100');

            polygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
            polygon.setAttribute('points', '25,0 50,50 0,50');

            svg.appendChild(polygon);
            break;
          case 'hexagone':
            svg.setAttribute('viewBox', '0 0 726 726');
            svg.setAttribute('preserveAspectRatio', 'none');
            svg.setAttribute('width', '100');
            svg.setAttribute('height', '100');

            polygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
            polygon.setAttribute('points', '723,314 543,625.769145 183,625.769145 3,314 183,2.230855 543,2.230855 723,314');

            svg.appendChild(polygon);
            break;
          case 'etoile':
            svg.setAttribute('viewBox', '0 0 180 180');
            svg.setAttribute('preserveAspectRatio', 'none');
            svg.setAttribute('width', '100');
            svg.setAttribute('height', '100');

            polygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
            polygon.setAttribute('points', '90,0 30,170 180,50 0,50 150,170');

            svg.appendChild(polygon);
            break;
        }
        return svg;
      },
      createEditor: function(e) {
        let editor = e.target.cloneNode(true);
        editor.contentEditable ='true';
      },
      triggerElementEdit: function(e) {
        e.target.contentEditable = "true";
      },
      removeListeners: function() {
        //TODO
        //$('#new-panorama-panel').off();
      },
      onNewPresentationItemClicked: function() {
        document.querySelector('#new-preso-header').innerHTML = 'Créer une nouvelle présentation';
        document.querySelector('#title-input').value = 'Nouvelle présentation';
        document.querySelector('textarea#description-input').value = 'Exemple de description de présentation';
        me.mode = 'create';

        me.NewPresntationModal.show();
      },
      getItemsAsync: function() {
        let data = {user_id: me.userId};

        return fetch('App/Ajax/presentations_affichageAjax.php', {
          method: 'POST',
          cache: 'no-cache',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data)
        });
      },
      isValidUrl: function(url) {
        try {
          new URL(url);
        } catch (e) {
          return false;
        }
        return true;
      },
      toggleDayNightMode: function() {
        let sidenavAccordion = document.querySelector('#sidenavAccordion');
        let navSlide = document.querySelector('#navSlide');
        let visualisation = document.querySelector('#visualisation');
        let panoramaNavbar = document.querySelector('#panorama-navbar');
        let boutonNightMode = document.querySelector('#night-mode');

        me.nightMode = !me.nightMode;

        if (me.nightMode) {
          boutonNightMode.innerHTML = '<div class="sb-nav-link-icon">' +
              '<i class="fas fa-moon"></i>' +
              '</div>Activé';
        } else {
          boutonNightMode.innerHTML = '<div class="sb-nav-link-icon">' +
              '<i class="fas fa-sun"></i>' +
              '</div>Désactivé';
        }
        sidenavAccordion.classList.toggle('sb-sidenav-light');
        sidenavAccordion.classList.toggle('sb-sidenav-dark');
        navSlide.classList.toggle('mainfooter-light');
        navSlide.classList.toggle('mainfooter');
        visualisation.classList.toggle('main-viewport');
        visualisation.classList.toggle('main-viewport-dark');
        panoramaNavbar.classList.toggle('transform-controls-holder');
        panoramaNavbar.classList.toggle('transform-controls-holder-night');
        document.body.classList.toggle('body-dark');
      },
      afficheMesObj: function(mesObj) {
        document.querySelector('#savedobjects').innerHTML += '<option selected></option>';
        for (let i = 0; i < mesObj.length; i++) {
          let basename = mesObj[i].basename;
          document.querySelector('#savedobjects').innerHTML +=
              '<option value=\'' + basename + '\'>' +
              basename +
              '</option>';
        }
      },
      selectThumb: function(stringPosition) {
        let thumbs = document.querySelector('div .slide-thumb-holder').innerHTML;
        let docThumb = new DOMParser().parseFromString(thumbs, 'text/html');
        docThumb = docThumb.body;

        let idThumb;
        if(stringPosition === "first"){
          idThumb = docThumb.firstChild.id.split('_');
        }else{
          idThumb = docThumb.lastChild.id.split('_');
        }
        me.selectSlide('#impress_slide_' + idThumb[1]);

        document.querySelectorAll('.slidethumb').forEach(function(element){
          element.classList.remove('currentselection');
        });
        document.querySelector('#slidethumb_' + idThumb[1]).classList.add('currentselection');
      },
    }