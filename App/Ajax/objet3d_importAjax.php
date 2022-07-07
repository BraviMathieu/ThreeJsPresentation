<?php

const ROOT = "../..";
const CONFIG = ROOT . '/Config';
const APP = ROOT . '/App';

require_once CONFIG . "/config.php";

$tabData = json_decode(file_get_contents("php://input"), true);
$id = intval($tabData['idUser']);

$obj = $_FILES["obj"]["name"];
$mtl = $_FILES["mtl"]["name"];

if (!is_dir(APP . "/../uploads/" . $id)) {
    mkdir(APP . "/../uploads/" . $id, 0755);
}
move_uploaded_file($_FILES["mtl"]["tmp_name"], APP . "/../uploads/" . $id . "/" . $mtl);
move_uploaded_file($_FILES["obj"]["tmp_name"], APP . "/../uploads/" . $id . "/" . $obj);
$f = fopen(APP . "/../uploads/" . $id . "/" . $obj . ".html", "w");
$html = <<<HTML
<html>
<head>
  <title>My first three.js app</title>
  <style>
    body { margin: 0; }
    canvas { display: block; }
  </style>
</head>
<body>

<script  type="module">
  import * as THREE from '../../public/lib/threejs/three.module.js';
  import { MTLLoader } from '../../public/lib/threejs/MTLLoader.js';
  import { OBJLoader } from '../../public/lib/threejs/OBJLoader.js';
  import { OrbitControls } from '../../public/lib/threejs/OrbitControls.js';
  
  var onError = function () { };

  var onProgress = function ( xhr ) {
    if ( xhr.lengthComputable ) {
      var percentComplete = xhr.loaded / xhr.total * 100;
      console.log( Math.round( percentComplete, 2 ) + '% downloaded' );
    }
  };

  var scene = new THREE.Scene();
  var camera = new THREE.PerspectiveCamera(20, window.innerWidth/window.innerHeight, 0.3, 1000);
  var manager = new THREE.LoadingManager();
  var ambientLight = new THREE.AmbientLight( 0xcccccc, 2 );
  scene.add( ambientLight );

  var renderer = new THREE.WebGLRenderer({alpha: true});
  renderer.setSize(window.innerWidth,window.innerHeight);
  document.body.appendChild(renderer.domElement);

  var geometry = new THREE.BoxGeometry(1,1,1);
  var material = new THREE.MeshBasicMaterial({color: 0x00ff00});

  camera.position.z = 200;

  var controls = new OrbitControls(camera, renderer.domElement);

  
  new MTLLoader( manager )
      .load( "{$mtl}", function ( materials ) {
        materials.preload();
        new OBJLoader( manager )
          .setMaterials( materials )
          .load("{$obj}", function ( object ) {
            scene.add( object );
          }, onProgress, onError );
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
HTML;

fwrite($f, $html);
fclose($f);

echo $id;
