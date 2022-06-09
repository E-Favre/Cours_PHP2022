<?php require_once('../inc/functions.php');
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

    <title>Cours PHP7 - GET</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-dark">
    <!-- JUMBOTRON -->
    <div class="jumbotron  text-center">
        <h1 class="display-3">Cours PHP7 - La méthode GET</h1>
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
                   
                </div>
            </main>
        </div>
        <!-- ============================================================== -->
        <!-- FIN du contenu principal -->
        <!-- ============================================================== -->

        <!-- FOOTER en REQUIRE -->
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