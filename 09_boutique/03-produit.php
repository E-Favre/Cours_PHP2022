<?php
    require_once('./inc/init.php');
    //jeprint_r($_SESSION);
?>
<!doctype html>
<html lang="fr">
  <head>
    <title>La boutique - Nos produits</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
    <main class="container bg-white m-4 mx-auto p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1>La boutique Découvrez  nos produits!</h1>
                <?php
                $requete =$pdoSITE-> query("SELECT * FROM produit ORDER BY id_produit");

                echo "<table class=\"table table-white table-striped\">";
                echo "<thead><tr><th scope=\"col\">ID_produit</th><th scope=\"col\">Visuel</th><th scope=\"col\">Référence</th><th scope=\"col\">Titre</th><th scope=\"col\">Public</th><th scope=\"col\">Prix</th><th scope=\"col\">Fiche</th></tr></thead>";
                while($ligne =$requete->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>#".$ligne['id_produit']."</td>";
                    echo "<td><img src=\"".$ligne['photo']."\" width=\"200\"</td>";
                    echo "<td>".$ligne['reference']."</td>";
                    echo "<td>".$ligne['titre']."</td>";
                    echo "<td>";
                    if($ligne['public']=='f'){
                        echo "Feminin";
                        }else if($ligne['public']=='m'){
                            echo "Masculin";
                         }else{
                            echo "Mixte";
                          }
                          $fmt = new NumberFormatter('ru_RU', NumberFormatter:: CURRENCY);
                          echo "<td>".$fmt->formatCurrency($ligne['prix'], "EUR")."</td>";
                          echo "<td><a href=\"fiche-produit.php?id_produit=".$ligne['id_produit']."\"class=\"text-dark\">Voir sa fiche<a/a></td>";
                          echo "</tr>";
                         }
                         echo "</table>";

                
                ?>
            </div>
        </div>
    </main>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>