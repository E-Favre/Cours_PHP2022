<?php
$host = 'localhost';
$database = 'site';
$user = 'root';
$psw = '';
   
$pdoSITE = new PDO('mysql:host='.$host.';dbname='.$database,$user,$psw);
$pdoSITE->exec("SET NAMES utf8");
// echo 'coucou';

$requete = $pdoSITE->query("SELECT * FROM membre");
$ligne = $requete->fetch(PDO::FETCH_ASSOC);

require_once('functions.php');
jeprint_r($requete);

echo "<p>Les infos de notre 1er membre :</p>";
echo "<ul>";
echo "<li>Prénom :" .$ligne['prenom']. "</li>";
echo "<li>Nom :" .$ligne['nom']. "</li>";
echo "<li>Email :" .$ligne['pseudo']. "</li>";
echo "<li>Adresse :" .$ligne['Adresse']. "</li>";
echo "<li>Code postal :" .$ligne['code_postal']. "</li>";
echo "<li>Sexe :" .$ligne['sexe']. "</li>";
if ($ligne['civilite'] == 'f') {
    echo "Féminin";
}else{
    echo "Masculin";
}
echo "</li>";
echo "</ul>";

?>