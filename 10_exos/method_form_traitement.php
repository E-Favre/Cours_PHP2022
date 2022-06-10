<?php
require_once('../inc/functions.php');

if (!empty($_POST)) {
    echo"<p> Prénom : " . $_POST['prenom'] . "</p>";
    echo"<p> Nom : " . $_POST['nom'] . "</p>";
    echo"<p> Commentaire : " . $_POST['commentaire'] . "</p>";


    // On va écrire le contenu de la super-globale $_POST dans un fichier texte en l'absence de BDD.
        $fichier = fopen('formulaire.txt', 'a');
        //fopen en mode "a" permet de créer un fichier s'il n'existe pas, sinon cela permet de l'ouvrir.
        $donneeformulaire = $_POST['prenom'] . " " . $_POST['nom'] . " " . $_POST['commentaire'] . "\n";
        // \n permet de créer un retour à la ligne.
        fwrite($fichier, $donneeformulaire);
}
?>