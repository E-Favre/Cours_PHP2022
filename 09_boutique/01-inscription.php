<?php
    require_once('./inc/init.php');
    jeprint_r($_SESSION);

    if( !empty($_POST)){
        $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
        $_POST['mdp'] = htmlspecialchars($_POST['mdp']);
        $_POST['nom'] = htmlspecialchars($_POST['nom']);
        $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
        $_POST['email'] = htmlspecialchars($_POST['email']);
        $_POST['civilite'] = htmlspecialchars($_POST['civilite']);
        $_POST['adresse'] = htmlspecialchars($_POST['adresse']);
        $_POST['code_postal'] = htmlspecialchars($_POST['code_postal']);
        $_POST['ville'] = htmlspecialchars($_POST['ville']);

        $requete = $pdoSITE->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, adresse, code_postal, ville) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :adresse, :code_postal, :ville)");

        $requete->execute(array(
            ':pseudo' =>$_POST['pseudo'],
            ':mdp' =>$_POST['mdp'],
            ':nom' =>$_POST['nom'],
            ':prenom' =>$_POST['prenom'],
            ':email' =>$_POST['email'],
            ':civilite' =>$_POST['civilite'],
            ':adresse' =>$_POST['adresse'],
            ':code_postal' =>$_POST['code_postal'],
            ':ville' =>$_POST['ville']
        ));
    } //fin if !empty
?>

<!doctype html>
<html lang="fr">
  <head>
    <title>La boutique - Connexion </title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Mes styles -->
    <link rel="stylesheet" href="/css/style.css">

  </head>
  <body>
    <main class="container bg-white m-4 mx-auto p-4">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h1 class="text-center" id="color">La boutique - Inscrivez-vous !</h1>
                
                <?php
                    echo $contenu;
                ?>
                <p class="text-center">Déjà inscrit ? <a href="02-connexion.php">Connectez-vous !</a></p>

                <!-- Formulaire dinscritpion à la BDD -->
                <form action="" method="POST" class="w-75 mx-auto">
                    <div class="form-group">
                        <label for="pseudo">pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo $_POST['pseudo'] ??'';?>" required>
                    </div>
                    <small>Votre mot de passe doit de 8 à 20 caractères</small>

                    <div class="form-group">
                        <label for="nom">nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $_POST['nom'] ??'';?>" required>
                    </div>

                    <div class="form-group">
                        <label for="prenom">prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $_POST['prenom'] ??'';?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $_POST['email'] ??'';?>" required>
                    </div>

                    <div class="form-group">
                        <label for="civilite">Genre</label>
                        <select name="civilite" id="civilite" class="form-select">
                            <option selected>Veuillez selectionner un genre</option>
                            <option value="F">Féminin</option>
                            <option value="M">Masculin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="adresse">adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $_POST['adresse'] ??'';?>" required>
                    </div>

                    <div class="form-group">
                        <label for="code_postal">code_postal</label>
                        <input type="text" class="form-control" id="code_postal" name="code_postal" value="<?php echo $_POST['code_postal'] ??'';?>" required>
                    </div>

                    <div class="form-group">
                        <label for="ville">ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $_POST['ville'] ??'';?>" required>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-secondary my-2">
                        <input type="reset" class="btn btn-secondary m-2">
                    </div>

                </form><!-- fermeture du formulaire -->
            </div>
        </div><!-- Fermetire de la rangée -->
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>