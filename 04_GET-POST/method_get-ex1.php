<?php require_once('../inc/functions.php') ?> 
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

    <title>Cours PHP7 - Exos pratiques - 1</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-dark">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours PHP7 - Premier exercice</h1>
        <p class="lead">Première page d'exercice pour le PHP</p>
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
                    <h2 class="col-sm-12 text-center" id="definition">1 - Tableau créé par la variable $_GET[]</h2>
                    <div class="col-12">
                        <?php 
                            // jevar_dump($_GET);
                            if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])){
                                // echo "<p>" . $_GET['article']. " - " . $_GET['couleur']. " <br> " . $_GET['prix'] . "€</p>";
                                echo "
                                <div class=\"card text-center\">
                                <div class=\"card-header\">
                                    À la Une !
                                </div>
                                <div class=\"card-body\">
                                    <h3 class=\"card-title\">" . $_GET['article'].  " " . $_GET['couleur']. "</h3>
                                    <p class=\"card-text\">Découvrez nos vêtements de qualité en matière 100% naturelle et recyclables. Des questions ? N'hésitez pas à nous contacter, nous sommes disponibles 7j/7 et 24h/24.</p>
                                    <a href=\"#\" class=\"btn btn-primary\">Ajoutez au panier</a>
                                </div>
                                <div class=\"card-footer text-muted\">
                                " . $_GET['prix']. " €
                                </div>
                                </div>";

                            } else {
                                echo "<p class=\"alert alert-danger w-50 mx-auto text-center\">Désolé, il n'y a pas de produit sur cette page</p>";
                            }
                        ?> 
                    </div><!-- fin de la colonne -->
                </div><!-- fin de la rangée -->

                <hr>
                <br><br>

            </main>
        </div> <!-- FIN DE LA PARTIE PRINCIPALE COL-8 -->

        <div class="col-sm-2 aside">
            <ul>
                <!-- DES ANCRES POUR LE COURS ET LES EXOS -->
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li></li>
            </ul>
        </div>
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