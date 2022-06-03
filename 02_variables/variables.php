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

    <title>Cours_php2022 - Introduction</title>
    <!-- Mes styles -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="jumbotron bg-secondary text-center">
        <h1 class="display-3 pt-3">Cours_php2022</h1>
        <p class="lead pb-3">PHP signifie aujourd'hui Hypertext Preprocessor</p>
    </div>

    <div class="row">

        <?php
        require('../inc/sidenav.inc.php'); //ici on appelle le fichier sidenav.inc.php
        ?>

        <!-- ========================================================= -->
        <!-- Contenu principal -->
        <!-- ========================================================= -->

        <div class="col-sm-8">
            <main class="container-fluid">
                <div class="row">
                    <hr>
                    <h2 class="col-sm-12 text-center" id="definition"><u>1-Définition</u></h2>
                    <div class="col-sm-12 col-lg-4">
                        <p>Chaque variable possède un <b>identifiant particulier</b>, qui <b>commence toujours par le caractère dollar($)</b> suivi du nom de la variable. Les règles de création des noms de variables sonty les suivants :</p>
                        <ul>
                            <li>Le nom commence par un <b>caractère alphabétique</b>, pris dans les ensembles <b>[a-z], [A-Z]</b> ou par le <b>tiret bas (_)</b>.</li>
                            <li>Les caractères suivants peuvent être les mêmes plus des chiffres.</li>
                            <li>Les fonctions n'ont pas les mêmes attentes , par exemple : <code> __FILE__
                                </code>, qui permet d'afficher le chemin complet :
                                <?php
                                echo "Nom du fichier inclus:" . __FILE__;
                                ?>
                            </li>
                            <li>La longueur du nom n'est pas limité mais il convient d'être raisonnable sous peine de confusion dans la saisie du code . Il est conseillé de créer des noms de variable le plus "parlant" possible .en réalisant le code contenant la variable <code>$nomClient</code>, par exemple, vous comprenez davantage ce que vous manipulez que si vous aviez écrit <code>$x</code> ou <code>$y</code>.</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <ul>
                            <li>La déclaration des variables n'est pas obligatoire en début de script. C'est là une différence notable avec les langages fortement typés comme Java ou C. Vous pouvez créer des variables <b>n'importe où</b>, à condition bien sûr de les créer avant de les utiliser, même s'il reste possible d'appeler une variable qui n'existe pas sans provoquer d'erreur.</li>
                            <li>L'initialisation des variables n'est pas non plus obligatoire et une variable non initialisée n'a pas de type précis.</li>
                            <li>Les noms des variables sont <b>sensibles à la casse</b> (majuscules et minuscules). $mavar et $MaVar ne désignent donc pas la même variable.</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <h5>a. Les noms de variables suivants sont corrects</h5>
                        <ul>
                            <li>$mavar</li>
                            <li>$_mavar</li>
                            <li>$mavar2</li>
                            <li>$M1</li>
                            <li>$_123</li>
                        </ul>
                        <h5>b. Les noms de variables suivants sont illégaux</h5>
                        <ul>
                            <li>$*mavar</li>
                            <li>$5_mavar</li>
                            <li>$mavar2+</li>
                        </ul>
                    </div>
                </div> <!-- Fin de la ROW -->

                <hr>

                <div class="row">
                    <h2 class="col-sm-12 text-center" id="affectation"><u>2 - Affectation de variables</u></h2>
                    <div class="col-sm-12">
                        <p>L'affectation de variable consiste à donner unevaleur à une variable. Lors de la création de variable, vous ne déclarez pas sont type. C'est la valeur que vous lui affectez qui détermine son type. Dans PHP, vous pouvez affecter une variable par <b>valeur</b> ou par <b>référence</b></p>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>

        <!-- fin de la partie principale, col-8 -->





    </div>

    <?php
    require('../inc/footer.inc.php'); //ici on appelle le fichier footer.inc.php
    ?>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <!-- mon script js pour la navigation -->
    <script src="../inc/sidenav.js"></script>
</body>

</html>