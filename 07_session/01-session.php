<?php
require_once('../inc/functions.php');

session_start(); //permet de créer un fichier de session avec son identifiant ou d'ouvrir la session existante si l'identifiant existe, 
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

    <title>Cours_php2022 - SESSION</title>

</head>

<body class="bg-light">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours PHP7 - Session</h1>
        <p class="lead">La méthode POST receptionne les données d'un formulaire. <b>$_POST est une super-globale</b>.
            l'avantage d'une session est que les données sont enregistrées dans un fichier sur le serveur disponible et consultable sur l'ensemble des pages durant toute la navigation.</p>


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
                        <p>Les données du fichier de session sont accessibles et manipulables à partir de la super-globale <code>$_SESSION</code>.</p>
                        <?php
                        $_SESSION['pseudo'] = 'Tintin';
                        $_SESSION['mdp'] = 'vol747';
                        $_SESSION['email'] = 'haddock@gmail.com';

                        echo "<p class=\alert alert-success\">La session est bien remplie !</p>";
                        // jeprint_r($_SESSION);
                        // jevar_dump($_SESSION);
                        ?>
                        <p>Principe de session : un fichier temporaire appelé <code>session</code> est créé sur le serveur, avec un ID unique. Cette session est liée à l'internaute, et dans le même temps, un cookie est déposé sur le poste de l'internaute avec l'ID (au nom PHPSESSID). Ce cookie est détruit lorsque l'on quitte le navigateur</p>
                        <p>Le fichier de session peut contenir des informations très sensibles !! Il n'est donc pas accessibles par l'internaute</p>
                        <p>Il est possible de vider une partie de la session avec le code suivant : <code>unset($_SESSION['mdp']);</code></p>

                        <?php
                        unset($_SESSION['mdp']);
                        // jeprint_r($_SESSION);
                        ?>

                        <p>Pour supprimer automatiquement une session : <code>session_destroy</code>. Il supprime totalement la session ainsi que son fichier temporaire.</p>

                        <?php
                        // session_destroy();
                        // jevar_dump($_SESSION);
                        ?>

                        <p>Nous avons effectué un session_destroy mais il n'est executé qu'à la fin de notre script. Nous voyons encore ici le contenu de la session mais le fichier temporaire dans le dossier Temp a bien été supprimé. Ce fichier contient les inforamtions de sessions et elles sont accessibles à <code>session_start()</code></p>
                        <p>Si on a besoin des informations de cette page, le code <code>session_start</code> devra être placé au début de la page.</p>

                        <?php
                        if (isset($_SESSION['pseudo'])) {
                            echo "Votre pseudo est : " . $_SESSION['pseudo'] . "<br>";
                        } else {
                            echo '<form method="post" action="">
                            <label for="pseudo">Pseudo:</label><br>
                            <input type="text" name="pseudo" id="value= ""><br>
                            <input type="submit" value="Envoyer">
                            </form>';
                        }
                        ?>

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