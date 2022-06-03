<!DOCTYPE html>
<?php
$variable1 = "la page faite avec des fichiers en inc.";
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
       echo "<title>Page faite avec des fichiers en inc.</title>";
    ?>
</head>
<body>
<?php

    echo "<div>
    <h1 style=\"border-width:5;border-style:double;background-color:#ffcc99;\">Bienvenue sur $variable1</h1>
    </div>";
    //commentaire php sur une ligne
    /* Ceci est un commentaire 
    PHP sur plusieurs lignes */
    
    #********************
    #Ceci est aussi un commentaire PHP sur plusieurs lignes
    #********************
    echo "<div>
    <p>Une fonction qui donne le nom du fichier : " . $_SERVER['PHP_SELF'] ." </p>
    </div>";

?>