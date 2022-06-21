<?php

// fichier indispensable u fonctionnement du site.

//////////////////////////////////////////////////////////////////////
///////////////// CONNEXION A LA BASE DE DONNEES ////////////////////
////////////////////////////////////////////////////////////////////

    /// 1 - CONNEXION  ///

$pdoSITE = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Active l'affichage des erreurs SQL'.
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // Active la connexion en utf-8.
));

    /// 2 - Ouverture de session ///

session_start();

    /// 3 - Chemin du site avec une constante ///

    /// 4 - Variable pour les contenus ///

$contenu = '';

    /// 5 - Inclusion des fonctions ///

require_once('functions.php');

?>