<?php

/* SUITE DE L'EXERCICE 3
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".
 */

/* Exercice 3 - pour mémoire
	1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone VARCHAR(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/

/**
 * ****************************************** I- INIT & FUNCTIONS **********************************************
 */
// ----------------
//  Connexion à la BDD
// -----------------
// ⚡️ pour Mac ⚡️
$pdo = new PDO(
    'mysql:host=localhost;dbname=contacts', // driver mysql (pourrait être oracle, IBM, ODBC...) + nom de la BDD
    'root', // pseudo de la BDD
    // '', // mdp de la BDD
    '', // mdp de la BDD ⚡️ pour Mac ⚡️
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour afficher les messages d'erreur SQL
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8' // définition du jeu de caractère des échanges avec la BDD
    )
);

// ----------------
// Session
// ----------------
session_start();

// ----------------
// Variables d'affichage
// ----------------
$msg = '';

// ----------------
// fonction d'affichage d'un print_r() [2ème paramètre = 1] et d'un var_dump() [2ème paramètre = 2] avec balise <pre>
// ----------------
function debug($param, $exit = 2)
{
    if ($exit === 1) {
        echo '<pre style="background-color: #d5ecd4 ; padding: 1vh 5vh;">';
        echo '<strong>print_r($param)</strong> <br>';
        print_r($param);
        echo '</pre>';
    } elseif ($exit === 2) {
        echo '<pre style="background-color: #ebd4cb; padding: 1vh 5vh;">';
        echo '<strong>var_dump($param)</strong> <br>';
        var_dump($param);
        echo '</pre>';
    }
}

/**
 * ****************************************** TRAITEMENT **********************************************
 */

/**
 * TABLEAU DES CONTACTS
 */
$table_contacts = $pdo->query("SELECT id_contact, nom, prenom, telephone FROM contact");
debug($table_contacts);

/**
 * FICHE DETAILLEE
 */
if ($_GET && isset($_GET['id_contact'])) {
    // debug($_GET);
    $_GET['id_contact'] = htmlspecialchars($_GET['id_contact'], ENT_QUOTES);

    $resultat = $pdo->prepare("SELECT * FROM contact WHERE id_contact = :id_contact");
    $resultat->bindParam(':id_contact', $_GET['id_contact']);
    $resultat->execute();

    // affichage des infos du contact
    $contact_detail = $resultat->fetch(PDO::FETCH_ASSOC); // on ne fait pas de boucle while ici car on est certain de n'avoir qu'un seul contact par id_contact de la BDD
    // debug($contact_detail);
    extract($contact_detail); // créé autant de variables qu'il y a d'indices dans l'array $contact_detail. Celles-ci ont pour nom le nom de l'indice et pour valeur la valeur associée à cet indice
    // debug($contact_detail);
}

/**
 * ****************************************** AFFICHAGE **********************************************
 */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
    <!-- Bootstrap Core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row alert bg-secondary mt-4 mb-4">
            <h1 class="col-2 offset-5 mt-4 mb-4">Contacts</h1>
        </div>

        <!-- TABLEAU D'AFFICHAGE DES CONTACTS -->
        <div class="row mt-5">
            <?php if (empty($_GET)) { ?>
                <div class="col-12 p-0">
                <?php } else { ?>
                    <div class="col-6 pl-0">
                    <?php } ?>

                    <div class="card mt-8">
                        <h5 class="card-header bg-secondary text-center">Répertoire des contacts</h5><!-- /.card-header alert-secondary -->
                        <table class="table table-striped table-hover mb-0">
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Afficher</th>
                            </tr>

                            <?php
                            //-- Affichage des lignes
                            while ($ligne = $table_contacts->fetch(PDO::FETCH_ASSOC)) { // $ligne => 1 ligne de la table de la BDD
                                echo '<tr>';
                                echo '<td>' . $ligne['nom'] . '</td>';
                                echo '<td>' . $ligne['prenom'] . '</td>';
                                echo '<td>' . $ligne['telephone'] . '</td>';
                                echo '<td><a href="?id_contact=' . $ligne['id_contact'] . '" class="btn btn-secondary">Détails</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                    </div><!-- /.card -->
                    </div><!-- .col-12 ou .col-6 selon if(empty($_GET)) -->
                    <!-- /. FIN -> TABLEAU D'AFFICHAGE DES CONTACTS -->

                    <!-- DETAIL DES CONTACTS -->
                    <?php
                    if ($_GET && $_GET['id_contact']) :
                    ?>
                        <div class="col-6 pr-0">
                            <div class="card mt-8">
                                <h5 class="card-header bg-secondary text-center"><?php echo $prenom  . ' ' . $nom ?></h5><!-- /.card-header alert-secondary -->
                                <table class="table table-striped table-hover mb-0">
                                    <tr>
                                        <th class="col-3">#</th>
                                        <th><?php echo $id_contact ?></th>
                                    </tr>
                                    <tr>
                                        <td class="col-3">Téléphone</th>
                                        <td><?php echo $telephone ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">Email</th>
                                        <td><?php echo $email ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">Depuis</th>
                                        <td><?php echo $annee_rencontre ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">Type</th>
                                        <td><?php echo $type_contact ?></td>
                                    </tr>
                                </table>
                                <a href="?" class="btn btn-block btn-secondary text-center">Fermer la fiche contact</a>
                            </div><!-- /. card mt-8 -->
                        </div><!-- .col-6 selon if($_GET...) -->
                    <?php endif; ?>
                </div><!-- .row mt-5 -->

        </div> <!-- /.container -->
        <hr>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>