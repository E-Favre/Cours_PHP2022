<?php
require_once('../inc/functions.php');

// Si une langue est passée dans l'URL (l'internaute a cliqué sur un lien de langue), on enverra cette langue dans le cookie
if(isset($_GET['Lang'])){
    $langue =($_GET['langue']);
    // jevar_dump($langue);

}else if(isset($_COOKIE['langue'])){ // sinon, si on a reçu un cookie appelé langue, on a la valeur du site qui prendra la valeur de la langue
    $langue = $_COOKIE['langue'];
    jeprint_r($langue);

} else{ //langue par defaut
    $langue = 'fr';
    jeprint_r($langue);
}

$expiration = time() + 365*24*60*60; // donne la date actuelle exprimée en secondes

//Time donne la date du jour depuis le début de l'unix (1970) en secondes
jeprint_r($expiration); //J'ajoute à la date du jour les données d'une année en secondes

setcookie('langue, $langue, $expiration'); // Fonction qui fabrique le cookie, appelé langue avec la valeur de $langue et la valeur de $expiration.
//Il n'existe pas de fonction prédéfinie permettant de supprimer un cookie.
// Pour rendre un cookie invalide, on utilise la fonction setcookie() avec le nom concerné et en mettant une date d'expiration à 0 ou antérieur à la date actuelle.
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <title>Cours PHP7 - PDO</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours PHP7 - PDO</h1>
        <p class="lead">La variable "$pdo" est un objet qui représente la connexion à une BDD</p>


    </div>

    <!-- RANGÉE PRINCIPALE -->
    <div class="row">
        <!-- LA NAVIGATION EN INCLUDE (penser à ajouter le JS qui va avec en fin de page) -->
        <?php
        require('../inc/sidenav.inc.php')
        ?>

        <!-- ============================================================== -->
        <!-- Contenu principal -->
        <!-- ============================================================== -->
        <div class="col-sm-8">
            <main class="container-fluid">
                <div class="row">
                    <hr>
                    <h2 class="col-sm-12 text-center" id="">1. Introduction</h2>
                    <div class="col-sm-12">

                    </div>
                </div>

                
            </main>
        </div> <!-- FIN DE LA PARTIE PRINCIPALE COL-8 -->

    </div>

    <!-- LE FOOTER EN REQUIRE -->
    <?php
    require("../inc/footer.inc.php")
    ?>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <!-- le js pour la navigation  -->
    <script src="../inc/sidenav.js"></script>

</body>

</html>