

<!-- 1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

2- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne  "Le montant de vos travaux est de X euros TTC." où X est le montant TTC calculé. Vous affichez le résultat au-dessus du formulaire. -->




<?php
//---------------
// variable d'affichage
$msg = '';

//---------------
// traitement PHP

function montantTTC($montant, $periode)
{
    // echo $montant . $periode; // pour tester
    if ($periode == 'inf') {
        $montantTTC = $montant * 1.2;
    } else {
        $montantTTC = $montant * 1.1;
    }

    return "Le montant de vos travaux est de $montantTTC euros TTC.";
}


if ($_POST) { // si le formulaire est posté
    // var_dump($_POST);
    $msg .= montantTTC($_POST['montant'], $_POST['periode']);
}

?>

<!-- AFFICHAGE -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Votre devis travaux</title>
</head>

<body>
    <h1>Votre devis travaux</h1>

    <h4><?php echo $msg; ?></h4>
    <form action="" method="post">

        <label for="montant_ht">Montant des travaux HT</label>
        <input type="text" name="montant" id="montant"><br><br>

        <label for="">Date de construction</label>
        <input type="radio" name="periode" value="inf" checked> 5 ans ou moins &nbsp;
        <input type="radio" name="periode" value="sup">Plus de 5 ans &nbsp;
        <br><br>

        <input type="submit" value="Calculer">
    </form>

</body>

</html>