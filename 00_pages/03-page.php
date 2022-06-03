<?php
    define("PI", 3.1415926535, TRUE); // définition insensible à la casse (le nom de la variable), parce qu'on a mis TRUE
    echo "La constante PI vaut ".PI."<br>";
    echo "La constante pi vaut ".pi."<br>";

    //FAIRE LES CORRECTIONS SI BESOIN pour comprendre le fonctionnement du boolean
    
    // vérification de l'existence de la constante



    if(defined("PI")) echo "la constante est déjà définie. <br>";
    // if(defined("pi")) echo "la constante est déjà définie. <br>"
    // ici, on demande : si la variable est déjà définie, lance cet echo

    define("sitepsg", "https://www.psg.fr", FALSE);
    echo "L'URL du site PSG : ".sitePSG."<br>";
    // ICI la variable ne fonctionne pas car on a utilisé le booléen FALSE qui prend en compte la casse

    echo "Visitez le site du <a href=\" ".sitepsg." \" target=\"blank\">PSG</a>"
?>