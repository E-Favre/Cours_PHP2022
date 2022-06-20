<?php

// fichier indispensable au fonctionnement du site

////////////////////////////////////////
    /////      Connexion à la BDD      /////
        ////////////////////////////////////////


/////      1 - CONNEXION
$pdoSITE = new PDO('mysql:host=localhost;dbname=site', 'root', '');
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

/////      2 - OUVERTURE de SESSION
session_start();

/////      3 - CHENMIN du site avec une CONSTANTE


/////      4 - VARIABLE pour les CONTENUS
$contenu = '';

/////      5 - INCLUSION des fonctions
require_once ('functions.php');


?>