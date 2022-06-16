<?php
require_once('../inc/functions.php');

// Si une langue est passée dans l'URL (l'internaute a cliqué sur un lien de langue), on enverra cette langue dans le cookie
if (isset($_GET['langue'])) {
    $langue = ($_GET['langue']);
    // jevar_dump($langue);

} else if (isset($_COOKIE['langue'])) { // sinon, si on a reçu un cookie appelé langue, on a la valeur du site qui prendra la valeur de la langue
    $langue = $_COOKIE['langue'];
    jeprint_r($langue);
} else { //langue par defaut
    $langue = 'fr';
    jeprint_r($langue);
}

$expiration = time() + 365 * 24 * 60 * 60; // donne la date actuelle exprimée en secondes

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


    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <!-- Mes styles -->
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Cours_php2022 - COOKIES</title>

</head>

<body class="bg-light">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours_php2022 - Cookies</h1>
        <p class="lead">La super-globale <b>$_COOKIE</b> est un petti fichier <b>4Ko max</b> déposé par le serveur sur le poste client et qui contient des informations.</p>


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
                        <p><u>voir axeptio pour customiser les pop-up cookie</u></p>
                        <p>Les cookies sont automatiquement renvoyés au serveur web par le navigateur. Lorsque l'internaute navigue dans les pages concernées par le ou les cookies, PHP permet de récupérer très facilement les données contenues dans un cookie. Non seulement on peut le fabriquer mais on peut aussi le récupérer. Les informations sont stockées dans une super-globale $_COOKIE.</p>
                        <p class="alert alert-danger w-50 mx-auto">Un cookie étant sauvegardé sur le poste de l'internaute, il peut être modifié, détourné ou volé !! On n'y met jamais d'informations personnelles comme les données bancaires, numéro de sécurité sociale, mot de passe ni même le contenu d'un panier d'achat</p>
                        <br>
                        <hr><br>
                        <div class="w-75 text-center mx-auto">
                            <!-- On envoie la langue choisie par l'URL : la valeur "FR" par exemple, est récupérée dans la superglobale $_GET  -->

                            <a href="?langue=fr" class="btn btn-success">Français</a> -
                            <a href="?langue=es" class="btn btn-success">Espagnol</a> -
                            <a href="?langue=it" class="btn btn-success">Italien</a> -
                            <a href="?langue=ru" class="btn btn-success">Russe</a>
                            <br><br>


                            <?php
                            echo "<h3>Langue du site : $langue</h3>";
                            echo time() . ": la date du jour exprimée en secondes depuis le 1er janvier 1970";
                            ?>
                        </div>

                    </div> <!-- Fin de la colonne -->
                </div> <!-- fin de la rangée -->

            </main>
        </div> <!-- FIN DE LA PARTIE PRINCIPALE COL-8 -->

    </div>

    <!-- LE FOOTER EN REQUIRE -->
    <?php
    require("../inc/footer.inc.php")
    ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <!-- le js pour la navigation  -->
    <script src="../inc/sidenav.js"></script>
    
</body>

</html>