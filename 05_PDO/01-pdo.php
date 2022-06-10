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

    <title>Cours PHP7 - PDO</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <!-- JUMBOTRON -->
    <div class="jumbotron  text-center">
        <h1 class="display-3">Cours PHP7 - PDO</h1>
        <hr>
        <p class="lead pb-3">La variable <code>$pdo</code> est un objet qui permet la connexion à la BDD</p>
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
                    <br><br>
                    <h2 class="col-sm-12 text-center">La connexion à la BDD</h2>
                    <div class="col-sm-12">
                        <p><abbr title="PHP Data Object">PDO</abbr> est l'acronyme de PHP Data Object</p>

                        <!-- TEST PHP -->
                        <?php
                        $pdoENT = new PDO(
                            'mysql:host=localhost;dbname=entreprise', //on a en 1er lieu le driver MySQL (IBM, Oracle, ODBC etc), le nom du serveur, le nom de la BDD
                            'root', //Utilisateur de la BDD
                            '', //Mot de passe de la BDD
                            array(
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, ///Affiche les erreurs SQL dans le navigateur
                                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //Permet d'indiquer le jeu de caractères des échanges avec la BDD
                            )
                        );
                        // jevar_dump($pdoENT);
                        ?>
                        <!-- Fin du test PHP -->
                    </div> <!-- Fin de la colonne -->

                    <div class="col-sm-12">
                    <hr>
                    <br><br>
                        <h2 class="text-center"><span>2 - </span> Faire des requêtes avec <code>exec()</code></h2>
                        <p>La méthode <b>exec()</b> est utilisée pour faire des requêtes qui ne retournent pas de résultats : INSERT, UPDATE, DELETE</p>
                        <p><i>Valeurs de retour</i><br>
                            Succès : dans le jevar_dump de $requête, on aura le nombre de lignes affectées par la requête, 3 DELETE = int(3)<br>
                            Echec : false = 0
                        </p>

                        <?php

                        //Requête pour ajouter des données dans la BDD
                        //Commentée pour ne pas ajouter à chaque rafraichissement

                        //$requete = $pdoENT->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bernard', 'm', 'informatique', '2022-03-18', 2000)");

                        //Pour savoir le résultat de $requete
                        //jevar_dump($requete)

                        //Pour supprimer une côte
                        //$requete = $pdoENT->exec("DELETE FROM employes WHERE prenom = 'Jean' AND nom='Bernard'");

                        // Pour avoir l'ID du dernier arrivé en BDD 
                        // echo "<p>Dernier ID généré en BDD :" . $pdoENT->lastInsertId(). ".</p>";
                        ?>

                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12">
                    <hr>
                    <br><br>
                        <h2 class="text-center"><span>3 - </span>Faire des requêtes avec <code>query()</code></h2>
                        <p><code>query()</code> est utilisé pour faire des requêtes qui retournent un ou plusieurs résultats : SELECT mais aussi DELETE, UPDATE et INSERT</p>
                        <p>En cas de succès : query() retourne un nouvel objet qui provient de la classe <b>PDOstatement</b>. <br> En cas d'echec : false</p>
                        <ul>
                            <li>Pour information, on peut mettre les paramètres () de fetch ()</li>
                            <li>PDO :: FETCH_NUM : pour obtenir un tableau aux indices numériques</li>
                            <li>PDO :: FETCH_OBJ : pour obtnir un dernier objet</li>
                            <li>ou encore des () vides pour obtenir un mélange de tableaux associatifs et numériques</li>
                        </ul>

                        <?php
                        //1 -  on demande des informations à la BDD car il y a un ou plusieurs résultats avec query()
                        $requete = $pdoENT->query("SELECT * FROM employes" );

                        // Voir le contenu de $requete
                        // jevar_dump($requete);

                        //2 - dans cet objet $requete, nous ne voyons pas encore les données concernant daniel alors qu'elles s'y trouvent. Pour y accéder, nous devons utiliser une méthode de $requete qui s'appelle fetch()

                        $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                        //!! Fecth récupère UNE ligne, FetchAll récupère TOUTES les lignes !!
                        //3 - avec cette méthode, on transforme l'objet $requete
                        //4 - fetch(), avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet de la requête en un arry associatif appelé ici $ligne : on y trouve en indice le nom des champs de la requête SQL

                        // var_dump() commenté
                        // jevar_dump($ligne);

                        // MISE EN FORME DES RESULTATS EN TABLEAU HTML
                        // echo "<ul><li>Id : " .$ligne['id_employes']
                        // ."<li>Prénom :" .$ligne['prenom']
                        // ."</li><li>Nom :" .$ligne['nom']
                        // ."</li><li>Sexe :" .$ligne['sexe']
                        // ."</li><li>Service :" .$ligne['service']
                        // ."</li><li>Date d'embauche :" .$ligne['date_embauche']
                        // ."</li><li>Salaire :" .$ligne['salaire']
                        // ."€</li></ul>";
                        // ?>


                        <!-- ============================================================== -->
                        <!-- EXERCICE : Afficher l'employé dont l'ID est 417 + nom + prénom -->
                        <!-- ============================================================== -->


                        <!-- <?php
                        $requete = $pdoENT->query("SELECT id_employes, service, prenom, nom FROM employes WHERE id_employes = 417");
                        $ligne = $requete = $requete->fetch(PDO::FETCH_ASSOC);
                        
                        // PRINTR déconne
                        // jeprint_r($ligne);

                        // MISE EN FORME DES RESULTATS EN TABLEAU
                        // echo "<ul><li>ID :" .$ligne['id_employes'].
                        // "</li><li>Service :". $ligne['service'].
                        // "</li><li>Prénom :". $ligne['prenom'].
                        // "</li><li>Nom :". $ligne['nom'].
                        // "</li></ul>";

                        // jevar_dump($ligne);


                        ?> -->
                    </div> <!-- fin de la colonne -->

                    <div class="col-sm-12">

                        <hr>
                        <br><br>

                        <h2 class="text-center"><span>4 - </span> Faire des requêtes avec <code>query()</code> et afficher plusieurs résultats</h2>

                        <?php
                        $requete = $pdoENT -> query("SELECT * FROM employes ORDER BY prenom");
                        // jevar_dump($requete);
                        // $ligne = $requete->fetchAll(PDO::FETCH_ASSOC);
                        // jevar_dump($ligne)

                        $nbr_employes = $requete->rowCount();
                        // Cette méthode rowcount() permet de compter le nombre d'enregistrements retournés par la requête
                        // jeprint_r($nbremployes);

                        echo"<p>Il y a " .$nbr_employes. " employés dans notre BDD.</p>";
                        // Comme nous avons plusieurs réulstats dans la requête, nous devons faire une boucle pour les parcourir.
                        // Fecth() ira chercher la ligne suivante du jeu de résultats à chaque tour de boucle et le transforme en objet.
                        // WHILE permet de faire avancer le curseur dans l'objet. Quand il arrive à la fin, fetch() retourne false et la boucle s'arrête.

                        // MISE EN FORME DES RESULTATS EN TABLEAU HTML
                        // echo "<ul>";
                        // while($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                        //     echo "<li>"
                        //     .$ligne['prenom']. " - "
                        //     .$ligne['nom']. " - "
                        //     .$ligne['sexe']. " - "
                        //     .$ligne['service']. " - "
                        //     .$ligne['date_embauche']. " - "
                        //     .$ligne['salaire']. "€ </li>";
                        // }
                        // echo "</ul>";
                        ?>


                        <!-- =================================================================================== -->
                        <!-- EXERCICE : Afficher la liste des services dans une UL en mettant un service par LI  -->
                        <!-- =================================================================================== -->

                        <?php
                        $requete = $pdoENT -> query("SELECT DISTINCT (service) FROM employes ORDER BY service");
                        
                        $nbrservices = $requete->rowCount();

                        echo"<div class=\"bg-info rounded w-50 text-center text-white mt-4 mx-auto\">";
                        echo"<p class=\"p-2 text-white\">Il y a " .$nbrservices. " services dans l'entreprise : </p>";
                        echo "</div>";

                        echo "<div class=\"border border-info rounded w-50 pt-3 mx-auto\">";
                        echo "<ul>";
                        While ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                            echo "<li>" .$ligne['service']. "</li>";
                        }
                        echo "</ul>";
                        echo "</div>";                        
                        ?>

                        <!-- =================================================================================== -->
                        <!-- EXO 1/ dans un h2, compter le nombre d'employés
                            2/ puis afficher toutes les infor des employés dans un tableau triés par ordre alphabétique de nom
                        <-- =================================================================================== -->

                        Il faudra : 
                        - faire la requete, trier par nom
                        - Thead - Tbody etc (table table-dark table-striped)
                        - penser au concatenation
                        - penser aux differents $lignes




                    </div>



                </div> <!-- Fin de la ROW -->
                <hr>
                <br><br>
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





<!-- Lorris Connexion BDD -->
<?php
$pdoENT = new PDO(
    'mysql:host=localhost;dbname=entreprise', //On a en premier lieu le driver MySQL(IBM, Oracle, Microsoft, etc.), le nom du serveur, le nom de la BDD
    'root', //Le nom d'utilisateur pour la BDD
    '', //Le mot de passe de l'utilisateur pour la BDD
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //Cette ligne sert à afficher les erreurs SQL dans le navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
); //POur définir le charset des échanges avec la BDD
?>