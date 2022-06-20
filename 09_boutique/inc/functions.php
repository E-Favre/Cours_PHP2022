<?php

//// 1 - FONCTION print_r ////
function jeprint_r($mavariable){
    echo "<small class=\"bg-primary text-white p-2\">print_r :</small><pre class=\"alert alert-primary w-50\">";
    print_r($mavariable);
    echo "</pre>";
}

function jeprint_r($mavariable){
        echo "<small class=\"bg-primary text-white p-2\">print_r :</small><pre class=\"alert alert-primary w-50\">";
        print_r($mavariable);
        echo "</pre>";
    }
//// 1 - FONCTION pour executer les prepare() ////
function executeRequete($requete, $parametres = array()){
    foreach($parametres as $indice => $valeur){
    $parametres[$indice] = htmlspecialchars($valeur); // on évite les injections SQL
    global $pdoSITE; // global va nous permettre d'accéder à la variable globale $pdoSITE et déclarer qu'elle devient globale
    $resultat = $pdoSITE->prepare($requete); // on prépare la requête
    $succes = $resultat->execute($parametres); // on execute la requête
    if($succes === false){
        return false; // si la requête n'a pas fonctionné, on retourne false
    } else {
        return $resultat; // sinon on retourne le résultat de la requête
    }  // Fin if else
    }
} // Fin function executeRequete

?>