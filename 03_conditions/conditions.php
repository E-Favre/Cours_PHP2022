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

    <title>Cours_php2022 - Les conditions</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-dark">
    <!-- JUMBOTRON -->
    <div class="jumbotron  text-center">
        <h1 class="display-3">Cours_php2022 - Les conditions</h1>
        <hr>
        <p class="lead bg-light">On retrouve dans PHP la plupart des instructions de contrôle des scripts. Indispensables à la gestion du déroulement d'un algorithme quelconque, ces instructions sont présentes dans tous les langages. PHP utilise une syntaxe très proche de celle du langage C. Ceux qui ont déjà pratiqué un langage tel que le C ou plus simplement JavaScript seront en pays de connaissance.</p>
    </div>

    <!-- RANGEE PRINCIPALE -->
    <div class="row bg-light">
        <!-- La barre de navigation en include (penser à toujours ajouter le JS en fin de page)    --->
        <?php
        require('../inc/sidenav.inc.php');
        ?>
        <!-- ============================================================== -->
        <!-- Contenu principal -->
        <!-- ============================================================== -->
        <div class="col-sm-8">
            <main class="container-fluid bg-light">
                <div class="row">
                    <hr>
                    <h2 class="col-sm-12 text-center" id="conditions"><u>1 - Les conditions avec IF</u></h2>
                    <div class="col-sm-12 col-md-4" id="if">
                        <h3 class="text-center">1 - IF</h3>
                        <p>L'instruction <code>if</code> est la plus simple et la plus utilisée des instructions conditionnelles. Présente dans tous les langages de programmation, elle est essentielle puisqu'elle permet d'orienter l'execution du script en fonction de la valeur booléenne d'une expression</p>
                        <?php
                        $a = 100;
                        $b = 55;
                        $c = 25;
                        $d = 8;

                        if ($a > $b && $b > $c) {
                            echo "<p class=\"alert alert-success w-75 mx-auto text-center\">Les deux conditions sont respectées.</p>";
                        }
                        ?>
                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12 col-md-4" id="ifelse">
                        <h3 class="text-center">2 - If...else</h3>
                        <p>L'instruction <code>if...else</code> permet de traiter le cas ou l'expression conditionnelle est TRUE et en même temps d'écrire un traitement de rechange quand elle est évaluée à FALSE, ce qui ne permet pas une instruction if seule. L'instruction ou le bloc qui suit <code>else</code> est alors le seul à être executé. L'execution continue alors ensuite normalement après le bloc. </p>
                        <?php
                        if ($a > $b) {
                            echo "<p class=\"alert alert-success w-75 mx-auto text-center\">$a est supérieur à $b.</p>";
                        } else {
                            echo "<p class=\"alert alert-success w-75 mx-auto text-center\">$b est supérieur à $a.</p>";
                        }
                        ?>
                        <p>Le bloc qui suit les instructions if...else peut contenir toutes sortes d'instructions, y compris d'autres instructions il...else. Nous obtenons dans ce cas une syntaxe plus complète</p>
                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12 col-md-4" id="ifElseIf">
                        <h3 class="text-center">If...Else if...Else</h3>
                        <p>Nous aurons ici une syntaxe un peu plus compliquée, de la forme suivante: <code>if(condition){} else if (condition) {} else {}</code></p>
                        <p>Ici notre variable d est égale à 8. On teste différente conditions pour voir laquelle est vraie grâce à un <code>if ... else if ... else</code> Ici, la première condition est vraie</p>
                        <?php
                        echo "<p class=\"alert alert-success w-75 mx-auto text-center\">$a est supérieur à $b";
                        if ($d == 8) {
                            echo "Réponse 1 : \$d est égale à 8";
                        } elseif ($d != 10) {
                            echo "Réponse 2 : \$d est différent de 10";
                        } else {
                            echo "Réponse 3 : Les conditions précédentes sont fausses";
                        }
                        echo "</p>";
                        ?>
                        <?php
                        $e = 10;
                        $f = 5;
                        $g = 2;
                        echo "<p class=\"alert alert-success w-75 mx-auto text-center\">$a est supérieur à $b";
                        if ($e == 9 || $f > $g) {
                            echo " Au moins une des deux conditions est remplie";
                        } else {
                            echo "Les deux conditions sont fausses";
                        }
                        echo "</p>";
                        ?>
                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12 col-md-6">
                        <h3 class="text-center" id="ternaire">4 - La méthode ternaire</h3>
                        <p>Il existe d'autres façons d'écrire in if else : <b>la méthode ternaire</b>. Avec cette méthode, le code sera le suivant : <code>(condition) ? code à executer si TRUE : code à executer si FALSE;</code></p>
                        <?php
                        $h = 10;
                        // en ternaire
                        echo ($h == 10) ? "<p class=\"alert alert-success w-75 mx-auto text-center\">\$h est égal à 10</p>" : "<p class=\"alert alert-success w-75 mx-auto text-center\">\$h est différent de 10</p>"
                        ?>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <h3 class="text-center" id="switch">5 - Switch et Case</h3>
                        <p>Switch permet de comparer à une multitude de valeurs, comme l'instruction <code>if ... else if ... else</code></p>
                        <?php
                        echo "<p class=\"alert alert-success w-75 mx-auto text-center\">";
                        $dept = 100;
                        switch ($dept) {
                            case '75':
                                break;
                            case '41':
                                echo "Loir-et-Cher";
                            case 'Essonne':
                                break;
                            default:
                                echo "Département inconnu !!! Bosse ta géo !";
                                break;
                        }
                        echo "</p>";
                        ?>
                    </div> <!-- fin de la colonne -->
                </div> <!-- fin de la rangée -->

                <hr>

                <div class="row">
                    <div class="row">
                        <h2 class="col-sm-12 text-center" id="conditions"><u>2 - Les boucles</u></h2>
                        <p>Les boucles permettent de répéter des opérations élémentaires un grand nombre de fois sans avoir à ré-écrire le même code</p>
                    </div>

                    <div class="col-sm-12">
                        <h3 class="text-center" id="while">1 - Boucle WHILE</h3>
                        <p>La boucle <code>WHILE</code> permet d'affiner le comportement d'une boucle en réalisant une action de manière répétitive tant qu'une condition est vérifiée ou qu'une expression quelconque est évaluée à TRUE et donc de l'arrêter quand elle n'est plus vérifiée (évaluée à FALSE)</p>
                        <div class="alert alert-success w-75 mx-auto text-center">
                            <?php
                            $n = 1;
                            while ($n % 7 != 0) { //Le script continue jusq'à trouver un multipkle de 7

                                $n = rand(1, 100); // rand fait un tirage aléatoire entre 1 et 100

                                echo $n . "&nbsp; - "; // "Non Breaking SPace
                            }
                            ?>
                        </div>
                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12">
                        <h3 class="text-center">2 - Boucle Do ... WHILE</h3>
                        <p>Avec l'instruction <code>DO ... WHILE</code> la condition n'est évaluée qu'après une première execution des instructions du bloc compris entre DO et While</p>
                        <div class="alert alert-success w-75 mx-auto text-center">
                            <?php
                            $n2 = 1;
                            do {
                                $n2 = rand(1, 100);
                                echo $n . "&nbsp; * ";
                            } while ($n2 % 7 != 0);
                            ?>
                        </div>
                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12">
                        <h3 class="text-center">3 - Boucle FOR</h3>
                        <p>La boucle <code>FOR</code> est plus conscise, ramassée que la boucle <code>WHILE</code>. Elle s'écrit ainsi :
                            <code>for(initialisation; condition; incrémentation){ code à executer}</code>
                        </p>
                        <div class="alert alert-success w-75 mx-auto text-center">
                            <?php
                            for ($i = 0; $i <= 8; $i++) {
                                $tab[$i] = pow(2, $i); // à l'aide d'une boucle et de la fonction pow()
                            } // Création d'un tableau avec 9 éléments
                            var_dump($tab)
                            ?>
                        </div>
                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12">
                        <h3 class="text-center">3 - Boucle FOREACH</h3>
                        <p>La boucle <code>forEACH</code> (pour chaque passage) est efficace pour afficher et lister les éléments contenus dans un tableau</p>
                        <div class="alert alert-success w-75 mx-auto text-center">
                            <?php
                            $val = "Une valeur";
                            echo "Les puissances de 2 sont : ";
                            foreach ($tab as $val) {
                                echo $val . " - ";
                            }
                            ?>
                        </div>
                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12">
                        <p class="alert alert-danger w-50 mx-auto text-center">Lecture des indices et des valeurs d'un tableau : <br>
                            <?php
                            // création d'un autre tableau avec la boucle FOR
                            for ($i = 0; $i <= 8; $i++) {
                                $tableau[$i] = pow(2, $i);
                            }
                            //lecture des indices et valeurs du tableau
                            foreach ($tableau as $ind => $valeur) {
                                echo "2 puissance $ind vaut $valeur <br>";
                            }
                            echo "le dernier indice est $ind et la dernière valeur est $valeur";
                            ?>
                        </p>
                    </div> <!-- fin de la colonne -->
                </div> <!-- fin de la rangée -->
                
                
                <hr>
                <br><br>


                <div class="col-sm2 aside">
                    <ul>
                        <li><a href="#conditions">Les conditions</a>
                            <ul>
                                <li><a href="#if">IF</a></li>
                                <li><a href="#ifelse">IF...ELSE</a></li>
                                <li><a href="#ifElseIf">IF...ELSE...IF</a></li>
                                <li><a href="ternaire">TERNAIRE</a></li>
                                <li><a href="switch">SWITCH</a></li>
                            </ul>
                        </li>
                        <li><a href="#while">Les boucles</a></li>
                    </ul>
                </div>
            </main>
        </div> <!-- fin de la partie principale col-8 -->


    </div>

    <!-- Fin du bloc principal -->


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