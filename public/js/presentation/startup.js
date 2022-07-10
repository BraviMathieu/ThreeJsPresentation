document.addEventListener("DOMContentLoaded", function(event) {
  let presentation = new Presentation();
  presentation.initialize();
  presentation.addSettingsPanel();

/*
  const moveable = new Moveable(document.body, {
    target: document.querySelector("#orchestrationelement_239"),
    container: document.body.querySelector(".panorama-viewport"),
    draggable: true,
    origin: true,
    keepRatio: true,
    edge: false,
    throttleDrag: 0,
    throttleResize: 0,
    throttleScale: 0,
    throttleRotate: 0,
  });

  moveable.on("dragStart", ({ target, clientX, clientY }) => {
    console.log("onDragStart", target);
  }).on("drag", ({
    target, transform,
    left, top, right, bottom,
    beforeDelta, beforeDist, delta, dist,
    clientX, clientY,
  }) => {
    console.log("onDrag left, top", left, top);
    target.style.left = `${left}px`;
    target.style.top = `${top}px`;
    // console.log("onDrag translate", dist);
    // target!.style.transform = transform;
  }).on("dragEnd", ({ target, isDrag, clientX, clientY }) => {
    console.log("onDragEnd", target, isDrag);
  });
*/

});