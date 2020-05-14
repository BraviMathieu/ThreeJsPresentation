<?php
define('ROOT', "../..");
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');

require_once CONFIG."/config.php";

$file = $_FILES["obj"]["name"];
move_uploaded_file(  $_FILES["obj"]["tmp_name"], APP."/../uploads/" . $file);
$f =fopen(APP."/../uploads/" . $file.".html","w");
$html ="
<html>
<head>
  <title>My first three.js app</title>
  <style>
    body { margin: 0; }
    canvas { display: block; }
  </style>
</head>
<body>
<script src=\"../public/lib/threejs/three.js\"></script>
<script src=\"../public/lib/threejs/OrbitControls.js\"></script>
<script src=\"../public/lib/threejs/oldOBJLoader.js\"></script>
<script>
  var scene = new THREE.Scene();
  var camera = new THREE.PerspectiveCamera(20, window.innerWidth/window.innerHeight, 0.3, 1000);

  var renderer = new THREE.WebGLRenderer({alpha: true});
  renderer.setSize(window.innerWidth,window.innerHeight);
  document.body.appendChild(renderer.domElement);

  var geometry = new THREE.BoxGeometry(1,1,1);
  var material = new THREE.MeshBasicMaterial({color: 0x00ff00});

  camera.position.z = 200;

  var controls = new THREE.OrbitControls(camera, renderer.domElement);

  var objLoader = new THREE.OBJLoader();
  objLoader.load(\"$file\",function (object) {
  scene.add(object);
  });
  renderer.setClearColor(0x000000 , 0);
  var animate = function() {
    requestAnimationFrame(animate);
    controls.update();

    renderer.render(scene,camera);
  };
  animate();
</script>
</body>
</html>
";
fwrite($f,$html);
fclose($f);