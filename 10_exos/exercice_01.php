<!-- Exercice 1-Vous créez un tableau PHP contenant les pays suivants : France, Italie, Espagne, inconnu, Allemagne auxquels vous associez les valeurs Paris, Rome, Madrid, '?', Berlin.
 
 Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un paragraphe (où X remplace la capitale et Y le pays).
 Pour le pays "inconnu" vous afficherez "Ca n'existe pas !" à la place de la phrase précédente.   -->

 <?php
    $pays = array('France', 'Italie', 'Espagne', 'inconnu', 'Allemagne');
    $capitale = ['Paris', 'Rome', 'Madrid', '?', 'Berlin'];
    $tableau = count($pays);

    for($i = 0; $i < $tableau; $i++){
        echo "<p>La capitale " .$capitale[$i]. " se trouve en " .$pays[$i]. ". <br>";
    }
    echo "</p>";
?>

<?php
/* 
   Vous créez un tableau PHP contenant les pays suivants : France, Italie, Espagne, inconnu, Allemagne auxquels vous associez les valeurs Paris, Rome, Madrid, '?', Berlin.
   Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un paragraphe (où X remplace la capitale et Y le pays).
   Pour le pays "inconnu" vous afficherez "Ca n'existe pas !" à la place de la phrase précédente. 	
 */

 $pays = array(
     'France'    => 'Paris', 
     'Italie'    => 'Rome', 
     'Espagne'   => 'Madrid', 
     'inconnu'   => '?', 
     'Allemagne' => 'Berlin'
    );

print_r($pays);
echo count($pays);


foreach ($pays as $key => $value) {
    // var_dump($pays);
    // echo '<hr>';
    // var_dump($key);
    // echo '<hr>';
    // var_dump($value);
    if($key == 'inconnu') {
        echo '<p>Ce pays n\'existe pas !</p>';
    } else {
        echo '<p>La capitale '. $value .' se situe en '. $key .'</p>';
    }
}
var_dump($value);

?>