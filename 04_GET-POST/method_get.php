<?php require_once('../inc/functions.php');
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

    <title>Cours_php2022 - $_GET</title>

</head>

<body class="bg-dark">
    <!-- JUMBOTRON -->
    <div class="jumbotron  text-center">
        <h1 class="display-3">Cours_php2022 - La méthode GET</h1>
        <hr>
        <p class="lead pb-3"><code>$_GET []</code> représente les données qui transitent par l'URL</p>
    </div>

    <div class="row bg-light">
        <!-- NavBar en INCLUDE (penser à toujours ajouter le JS en fin de page)    --->
        <?php
        require('../inc/sidenav.inc.php');
        ?>
        <!-- ============================================================== -->
        <!-- Contenu principal -->
        <!-- ============================================================== -->
        <div class="col-sm-8">
            <main class="container-fluid">
                <div class="row">
                    <hr>
                    <h2 class="col-sm-12 text-center" id="definition"><u>1 - Introduction</u></h2>
                    <div class="col-sm-12 col-md-6">
                        <p>Il s'agit d'une <b>super-globale</b> et comme toutes les super-globales, c'est un <b>tableau</b>. Super-Globale signifie que c'est une variable disponible partout dans le script, y compris au seoin des fonctions. Les informations transitent dans l'URL selon la syntaxe suivante : <code>mapage.php?indice1=valeur1&indiceN=valeurN;</code>.</p>

                        <p>Quand on récupère les données, $_GET fabrique un tableau selon le schéma suivant : <code>$_GET = array('indice1' => 'valeur1' , 'indiceN' , => 'valeurN');</code></p>
                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12 col-md-6 text-center">
                        <div class="row">

                            <div class="col-sm-12 col-md-4">
                                <a href="./method_get-ex1.php?article=Robe&couleur=rouge&prix=75">
                                    <img src="../img/robe.jpg" alt="Robe rouge" class="img-fluid">Robe rouge
                                </a>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <a href="./method_get-ex1.php?article=Jean&couleur=bleu&prix=55">
                                    <img src="../img/jean.jpg" alt="Jean Bleu" class="img-fluid">Jean bleu
                                </a>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <a href="method_get-ex1.php?article=Pull&couleur=blanc&prix=45">
                                    <img src="../img/Pull.jpg" alt="Pull blanc" class="img-fluid">Pull blanc
                                </a>
                            </div>
                        </div>
                    </div> <!-- Fin de la colonne -->
                </div> <!-- Fin de la rangée -->
            </main>
        </div>
        <!-- ============================================================== -->
        <!-- FIN du contenu principal -->
        <!-- ============================================================== -->

        <!-- FOOTER en REQUIRE -->
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