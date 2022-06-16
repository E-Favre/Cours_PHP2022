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

        <div class="col-lg-9">
            <main class="container">
                <div class="row">
                    <h2 class="col-sm-12 text-center"><u> 1-Introduction </u></h2>
                    <!-- ouverture de la div -->
                    <div class="col-sm-12 col-lg-4">
                        <p>Pour parvenir à la réalisation de sites dynamiques, nous allons aborder successivements les points suivants :</p>
                        <ul>
                            <li>De connaître la syntaxe et les caracteristiques du language PHP</li>
                            <li>Les notions essentielles du language SQL, permettant la création et la gestion d'une BDD et la réalisation des requêtes de base</li>
                            <li>Le fonctionnement et la réalisation de BDD MYSQL et les moyens d'y accéder à l'aide de fonctions spécialisées de PHP (ou objet)</li>
                        </ul>
                    </div>
                    <!-- fermeture de la div -->

                    <div class="col-sm-12 col-lg-4">
                        <p>PHP permet en outre de créer des pages interactives. Une page interactive permet à un visiteur de saisir des données personelles. Ces dernières sont ensuite transmises au serveur , où elles peuvent rester stockées dans une base de données pour être diffusées vers d'autres utilisateurs. Un visiteur peut par exemple , s'enregistrer et retrouver une page adaptée à ses besoins lors d'une visite ultérieure. Il peut aussi envoyer des e-mails et des fichiers sans avoir avoir à passer par son logiciel de messagerie. En associant toutes ces caracteristiques, il est possible de créer aussi bien des sites de diffusion et de collectes d'information que des sites d'e-commerces, de rencontres ou des blogs</p>
                    </div>
                    <!-- fin de la div -->
                    <div class="col-sm-12 col-lg-4">
                        <p>Pour contenir la masse d'informations collectées, PHP s'appuie généralement sur une base de données, généralement MYSQL mais aussi SQLite, et sur des serveurs Apache. PHP, MYSQL et Apache forment d'ailleurs le trio ultra dominant sur les serveurs internet.
                            Quand ce trio est associé sur un serveur à LINUX, on parle de système LAMP (Linux, Apache, MySQL et PHP).PHP est utilisé aujourd'hui par plus des trois quarts des sites dynamiques de la planète et par les trois quarts des grandes entreprises francaises. Pour un serveur Windows, on parle de système WAMP, mais ceci est beaucoup moins courant</p>
                    </div><!-- fin de la div -->
                    <hr>
                </div><!-- fin de la row -->
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <p>Avec le code suivant s'écrit dans un fichier nommé info.php , placé dans le serveur d'évaluation, on obtient toutes les infos sur le PHP éxécuté dans ce serveur. <br>
                            <!-- <code><?php
                                        phpinfo();
                                        ?></code> -->
                        </p>
                        <div class="alert alert-success col-md-6">
                            <?php
                            echo "<p>Bienvenue sur le site de cours de PHP7</p>";
                            ?>
                            <?php
                            echo "<p> Aujourd'hui nous sommes le " . date("d/m/Y") . "</p>";
                            ?>
                        </div>
                    </div>
                    <!-- fin de la div -->
                    <div class="col-sm-12 col-md-6">
                        <h3>Le cycle de vie d'une page PHP</h3>
                        <ul>
                            <li>Envoi d'une requête HTML par le navigateur client vers le serveur du type http://www.monserveur.fr.page.php</li>
                            <li>Interprétation par le serveur du code PHP contenu dans la page appelée</li>
                            <li>Envoi par le serveur d'un fichier dont le contenu est purement du HTML</li>
                        </ul>
                        <a class="btn btn-primary btn-lg" target="_blank" href="info.php" role="button">Voir info.php</a>
                    </div>
                </div>
                <!-- fin de la row(rangée) -->
                <hr>
                <div class="row pt-3">
                    <div class="col-sm-12">
                        <h2 class="text-center"><u> 2-Inclure des fichiers externes</u></h2>
                        <table class="table table-striped" id="tableau1">
                            <thead>
                                <tr>
                                    <th scope="col">Fonction</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>include("nom-fichier.php")</td>
                                    <td>Lors de son interpretation par le serveur, cette ligne est remplacée par tout le contenu du fichier précisé en paramètre, dont vous fournissez le nom et éventuellement l'adresse complète. En cas d'erreur, par exemple si le fichier n'est pas trouvé, include() ne génère qu'une alerte (un warning), et le script continue. </td>
                                </tr>
                                <tr>
                                    <td>require("nom-fichier.php")</td>
                                    <td>A désormais un comportement identique à include() , à la différence près qu'en cas d'erreur , require() provoque une erreur fatale et met fin au script</td>
                                </tr>
                                <tr>
                                    <td>include_once("nom-fichier.php")</td>
                                    <td>Contrairement aux deux précédentes, ces fonctions ne sont pas éxécutées plusieurs fois , même si elles figurent dans une boucle ou si elles sont déjà éxécutées une fois dans le code qui précède</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- fin de la row(rangée) -->

                <br><br>

            </main>
        </div>
        <!-- fin de la partie principale, col-8 -->





    </div>

    <?php
    require('../inc/footer.inc.php'); //ici on appelle le fichier footer.inc.php
    ?>


    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <!-- le js pour la navigation  -->
    <script src="../inc/sidenav.js"></script>

</body>

</html>