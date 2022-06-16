<?php require_once('../inc/functions.php') ?>
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

    <title>Cours_php2022 - Exos pratiques - 1</title>

</head>

<body class="bg-dark">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours_php2022 - Premier exercice</h1>
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
                        if (isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])) {
                            // echo "<p>" . $_GET['article']. " - " . $_GET['couleur']. " <br> " . $_GET['prix'] . "€</p>";
                            echo "
                                <div class=\"card text-center\">
                                <div class=\"card-header\">
                                    À la Une !
                                </div>
                                <div class=\"card-body\">
                                    <h3 class=\"card-title\">" . $_GET['article'] .  " " . $_GET['couleur'] . "</h3>
                                    <p class=\"card-text\">Découvrez nos vêtements de qualité en matière 100% naturelle et recyclables. Des questions ? N'hésitez pas à nous contacter, nous sommes disponibles 7j/7 et 24h/24.</p>
                                    <a href=\"#\" class=\"btn btn-primary\">Ajoutez au panier</a>
                                </div>
                                <div class=\"card-footer text-muted\">
                                " . $_GET['prix'] . " €
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