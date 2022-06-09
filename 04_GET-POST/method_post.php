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

<body>
    <!-- JUMBOTRON -->
    <div class="jumbotron  text-center">
        <h1 class="display-3">Cours PHP7 - La méthode POST</h1>
        <hr>
        <p class="lead pb-3">La méthode <code>$_POST []</code> est une <b>super-globale</b> réceptionne les données d'un formulaire</p>
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
                    <div class=".col-sm-12.col-md-6">
                        <h2 class="col-sm-12 text-center" id="definition"><u>1 - Formulaire</u></h2>
                        <ul>
                            <li>Un formulaire doit toujours être dans une balise <code>form</code> pour fonctionner.</li>
                            <li>L'attibut <b>method</b> indique comment les donnéees vont circuler vers le PHP. <i>$_GET</i> et <i>$_POST</i> </li>
                            <li>L'attribut <b>action</b> indique l'URL de destination des données.(si l'attribut est vide, les données vont vers le même script ou la même page)</li>
                            <li>Pour finir, il ne faut pas oublier les <b>name</b> dans les formaulaires, ils constituent les indices de $_POST qui réceptionne les données</li>
                        </ul>

                        <form action="../05_exos/method_form_traitement.php" method="POST" class="w-75 mx-auto">

                            <!-- Champ prenom -->
                            <div class="formgroup">
                                <label for="prenom">prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
                            </div> <!-- Fin champ prenom -->

                            <!-- Champ nom -->
                            <div class="formgroup">
                                <label for="nom">nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                            </div> <!-- Fin champ nom -->

                            <!-- Champ commentaire -->
                            <div class="formgroup">
                                <label for="commentaire">commentaire</label>
                                <textarea type="text" class="form-control" id="commentaire" rows="2" name="commentaire" placeholder="Commentaire" required></textarea>
                            </div> <!-- Fin champ commentaire -->

                            <!-- BTN centré dans une IDV -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-small btn-info">Envoyer</button>
                            </div>

                        </form> <!-- fin du formulaire -->

                    </div> <!-- Fin de la colonne -->

                    <div class="col-sm-12 col-md-6">
                        <h2 class="col-sm-12 text-center"><u>2 - Récupération des données</u></h2>
                        <ul>
                            <li>$_POST est une <b>super-globale</b> qui permet de récuperer les données saisies dans un formulaire</li>
                            <li>$_POST est donc un tableau <b>[array]</b> et il est disponible dans tous les contextes du script</li>
                            <li>Le tableau $_POST se remplit de la manière suivante : <code>
                                $_POST = array(<br>
                                'name1' => 'valeur1'<br>
                                'nameN' => 'valeurN'<br>)
                            </code></li>
                            <li>Donc soit name1 ou nameN correspondent aux attributs "name" du formulaire et ou valeur1 et valeurN correspondent aux valeurs saisies par l'internaute.</li>
                        </ul>

                        <?php
                        if(!empty($_POST)){//si $_POST n'est pas vide, c'est qu'il est rempli et donc que le formulaire a été envoyé. Notez qu'en l'état on peut l'envoyer avec des champs vides, les valeurs des $_POST étant alors des champs strings vides. En effet, on peut avoir des informations facultatives dans un formulaires, leurs inputs seront donc rarement remplis
                            
                            // jevardump($_POST);
                            echo "<div class=\"alert alert-success w-100 mx-auto\"><p>Prénom: " .$_POST['prenom']. "</p>";
                            echo "<p>Nom: " .$_POST['nom']. "</p>";
                            echo "<p>Commentaire: " .$_POST['commentaire']. "</p></div>";

                        }
                    ?>                            
                    </div>
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

        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

        <!-- le js pour la navigation  -->
        <script src="../inc/sidenav.js"></script>

</body>

</html>