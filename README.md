Projet ThreeJS Présentation
========================

Le but de ThreeJS Présentation est de créer un éditeur de slides comme Powerpoint et de réaliser des slides classiques et des slides intégrant des modèles 3D afin d'interagir avec les objets. 
L'originalité est de créer cet éditeur pour des pages Web intégrant un module 3D à partir de la librairie ThreeJS.

Prérequis
------------

  * PHP 7.1 ou +;
  * Mysql;
  * Composer;
  * Git;
  * Apache;

Installation du projet
------------

Pour cloner le projet sur votre ordinateur, il faut lancer la commande : 

```bash
git clone https://github.com/BraviMathieu/ThreeJsPresentation.git ./ThreeJS_Presentation/
```

Il faut installer les librairies avec Composer en effecuant la commande suivante : 

```bash
composer install --ignore-platform-reqs
```

Ensuite, nous pouvons créer une base de données s'appellant threejs, avec un utilisateur "threejs" et un mot de passe "threejs" ayant les droits sur la table.

```bash
CREATE USER 'threejs'@'localhost' IDENTIFIED BY 'threejs';
CREATE DATABASE threejs;
GRANT ALL PRIVILEGES ON threejs.* TO 'threejs'@'localhost';
```
Nous pouvons importer les données à partir du ficher sql.sql dans la base de données.

Configuration Apache
------------

Il faut vérifier dans les fichiers de configuration de Apache que la directive AllowOverride est a All et non pas None.
Il faut aussi activer le mod_rewrite avec la commande :

```bash
su a2enmod rewrite
```

Le site est accessible à l'adresse : localhost/ThreeJS_Présentation

Utilisateur de test
-----
admin : admin
