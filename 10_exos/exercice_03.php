<!-- Exercice 3- Créer une base de données "contacts" avec une table "contact" :
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
 
    4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec. -->


<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
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
    '', // mdp de la BDD
    //'root', // mdp de la BDD ⚡️ pour Mac ⚡️
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
 * ****************************************** III- TRAITEMENT **********************************************
 */
// III-1. Vérifications du formulaire
if ($_POST) {
    // debug($_POST);

    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) $msg .= '<div class="alert alert-danger">Le prénom doit contenir entre 2 et 20 caractères.</div>';

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) $msg .= '<div class="alert alert-danger">Le nom doit contenir entre 2 et 20 caractères.</div>';

    if (!isset($_POST['annee_rencontre']) || $_POST['annee_rencontre'] == '') $msg .= '<div class="alert alert-danger">Une année de rencontre doit être sélectionnée.</div>';

    if (!isset($_POST['telephone']) || !preg_match('#^[0-9]{10}$#', $_POST['telephone'])) $msg .= '<div class="alert alert-danger">Le téléphone est un numéro à 10 chiffres.</div>';

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $msg .= '<div class="alert alert-danger">L\'email est incorrect.</div>';

    if (!isset($_POST['type_contact']) || ($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'autre')) $msg .= '<div class="alert alert-danger">Le type du contact doit être sélectionné.</div>';


    // insertion en BDD
    if (empty($msg)) {
        //-- 1- assainissement des saisies de l'internaute
        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // on prend la valeur que l'on traite avec htmlspecialchars() puis que l'on range dans son emplaçement initial : $_POST[$indice] (image du nettoyage des chaussures)
        }

        //-- 2- requête préparée
        $req = $pdo->prepare("INSERT INTO contact (nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES (:nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact)");

        // debug($req);

        //-- 3- sécurisation contre les injections CSS & JS
        $req->bindParam(':nom', $_POST['nom']);
        $req->bindParam(':prenom', $_POST['prenom']);
        $req->bindParam(':telephone', $_POST['telephone']);
        $req->bindParam(':annee_rencontre', $_POST['annee_rencontre']);
        $req->bindParam(':email', $_POST['email']);
        $req->bindParam(':type_contact', $_POST['type_contact']);

        //-- 4- exécution de la requête
        $res = $req->execute();

        //-- 5- Message de réussite ou d'échec de l'enregistrement
        if ($res) {
            $msg .= '<div class="alert alert-success">Le contact a bien été enregistré.</div>';
        } else {
            $msg .= '<div class="alert alert-danger">Le contact n\'a pas été enregistré.</div>';
        }
    } // END if (empty($msg))
} // END if($_POST)

/**
 * ****************************************** II- AFFICHAGE **********************************************
 */

/**
 * SELECT DATE_RENCONTRE
 */
$currentYear = date('Y');
$century = $currentYear - 100;
$select_annee = '';

while ($currentYear >= $century) {
    if ($_POST && isset($_POST['annee_rencontre']) && $_POST['annee_rencontre'] == $currentYear) {
        $select_annee .= '<option selected>' . $currentYear . '</option>';
    } else {
        $select_annee .= '<option>' . $currentYear . '</option>';
    }
    $currentYear--;
}

/**
 * TABLEAU DES CONTACTS
 */
$table_contacts = $pdo->query("SELECT * FROM contact");
// debug($table_contacts);

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
        <div class="row bg-info mt-4 mb-4">
            <h1 class="col-2 offset-5 mt-4 mb-4">Contacts</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <?php echo $msg; ?>
            </div>
        </div>
        <!-- FORMULAIRE -->
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <label for="nom">Nom</label><br>
                            <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $_POST['nom'] ?? ''; ?>"><br><br>

                            <label for="prenom">Prénom</label><br>
                            <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo $_POST['prenom'] ?? ''; ?>"><br><br>

                            <label for="telephone">Téléphone</label><br>
                            <input type="text" id="telephone" name="telephone" class="form-control" value="<?php echo $_POST['telephone'] ?? ''; ?>"><br><br>
                        </div>
                        <!-- /.col -->
                        <div class="col">
                            <label for="annee_rencontre">Année de rencontre</label><br>
                            <select name="annee_rencontre" id="annee_rencontre" class="form-control">
                                <option value="" selected>Choisir</option>
                                <?php echo $select_annee; ?>
                            </select><br><br>

                            <label for="email">Email</label><br>
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $_POST['email'] ?? ''; ?>"><br><br>

                            <label for="type_contact">Type de contact</label><br>
                            <select name="type_contact" id="type_contact" class="form-control">
                                <option value="">Choisir</option>
                                <option value="ami" <?php if (isset($_POST['type_contact']) && $_POST['type_contact'] == 'ami') echo 'selected'; ?>>Ami</option>
                                <option value="famille" <?php if (isset($_POST['type_contact']) && $_POST['type_contact'] == 'famille') echo 'selected'; ?>>Famille</option>
                                <option value="professionnel" <?php if (isset($_POST['type_contact']) && $_POST['type_contact'] == 'professionnel') echo 'selected'; ?>>Professionnel</option>
                                <option value="autre" <?php if (isset($_POST['type_contact']) && $_POST['type_contact'] == 'autre') echo 'selected'; ?>>Autre</option>
                            </select>
                        </div> <!-- /.col -->
                    </div> <!-- /.row -->
                    <input type="submit" value="S'inscrire" name="inscription" class="btn btn-block btn-outline-info">
                </form>
            </div><!-- /.col-12 -->
        </div><!-- /.row -->

        <div class="row mt-5">
            <div class="col-12">
                <div class="card mt-8">
                    <div class="card-header alert-warning">Répertoire des contacts</div><!-- /.card-header alert-warning -->

                    <?php
                    echo '<table class="table table-striped table-hover table-info mb-0">';
                    // affichage de la ligne des entêtes dynamiquement :
                    echo '<tr>';
                    for ($i = 0; $i < $table_contacts->columnCount(); $i++) {
                        //debug($resultat->getColumnMeta($i)); // récupère les informations contextuelles de chaque champs de la table parcourue 
                        // et on voit que l'indice 'name' ramène le titre des champs
                        // la méthode getColumnMeta() retourne un array qui contient notamment l'indice "name" avec le nom de
                        // chaque colonne (= champs de la table SQL)

                        $colonne = $table_contacts->getColumnMeta($i);

                        echo '<th scope="col">' . $colonne['name'] . '</th>'; // l'indice "name" contient le nom du champ à chaque tour de boucle
                    }
                    echo '</tr>';

                    //-- Affichage des lignes
                    while ($ligne = $table_contacts->fetch(PDO::FETCH_ASSOC)) { // $ligne => 1 ligne de la table de la BDD
                        echo '<tr>';
                        // $ligne est tableau associatif, donc je peux faire une FOREACH pour le parcourir
                        foreach ($ligne as $information) {
                            echo '<td>' . $information . '</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                    ?>