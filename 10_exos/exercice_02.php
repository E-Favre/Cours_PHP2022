

<!-- Exercice 2- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement.
  Cette fonction prend 2 paramètres : une date et le format de conversion de sortie "US" ou "FR". Pour faire cette conversion, vous utilisez la classe DateTime.
     
  2- Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
 
  3- Vous validez que la date fournie est bien une date. La fonction retourne un message si ce n'est pas le cas. -->

Exercice 2 Correction


<?php
/*
    1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement.
    Cette fonction prend 2 paramètres : une date et le format de conversion de sortie "US" ou "FR". Pour faire cette conversion, vous utilisez la classe DateTime.
        
    2- Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
    
    3- Vous validez que la date fournie est bien une date. La fonction retourne un message si ce n'est pas le cas.
    
   */

function convertir($date, $format)
{
    // point 2
    if ($format != 'FR' && $format != 'US') { // vérification du format de la date
        return '<p>La date renseignée n\'est pas un format pris en charge.</p>';
    }

    // point 3
    if (!strtotime($date)) { // vérification de la validité de la date
        return '<p>La date renseignée n\'est pas valide.</p>';
    }

    // point 1
    $date_convert = new DateTime($date);
    if ($format == 'FR') { // FR en US
        return $date_convert->format('d/m/Y');
    } elseif ($format == 'US') { // US en FR
        return $date_convert->format('Y-m-d');
    }
}

echo convertir('31-01-2018', 'US');

echo '<hr>';
/***
 * CORRECTION
 */
function afficheDate($date, $format)
{
    // On contrôle d'abord les valeurs reçues :
    if ($format != 'FR' && $format != 'US') {
        return '<p>Le format demandé n\'est pas valide.</p>'; // return nous fait quitter la fonction, le reste du code qui suit n'est donc pas exécuté => ici je n'ai donc pas besoin d'un else ou elseif puisque si la condition est true le return 
    }

    if (!strtotime($date)) {
        return '<p>La date est invalide.</p>';
    }

    // Traitement de l'affichage de la date :
    $objetDate = new DateTime($date);
    if ($format == 'FR') {
        return $objetDate->format('d-m-Y');
    } else {
        return $objetDate->format('Y-m-d');
    }
    // return 'test';
}

echo afficheDate('2018-08-15', 'FR');



// A LIRE => http://php.net/manual/fr/function.checkdate.php
/**
 * function validateDate($date, $format = 'Y-m-d H:i:s')
  {
      $d = DateTime::createFromFormat($format, $date);
      return $d && $d->format($format) == $date;
  }
 */
?>