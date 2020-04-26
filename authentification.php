<?php session_start();
if(isset($_SESSION ["privilege"]) == false)
{
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="include/style.css">
  </head>
  <body>
    <div class="exeterieurcarte"> 
      <div class="carte">
          <div class="recto">
            <h1>Créer un compte</h1>
            <form class="formulaire" action="utilisateur.php" method="post">
              <label for="identifiantCreation">Entrez votre identifiant</label>
              <input type="text" name="identifiant" id="identifiantCreation" required min="5">
              <label for="mdpCreation">Entrez votre mot de passe :</label>
              <input type="password" name="mdp" id="mdpCreation" required min="8">
              <label for="nom">Entrez votre nom</label>
              <input type="text" name="nom" id="nom" required min="1">
              <label for="prenom">Entrez votre prenom</label>
              <input type="text" name="prenom" id="prenom" required min="1">
              <label for="email">Entrez votre email</label>
              <input type="email" name="email" id="email" required>
              <label for="date">Entrez votre date de naissance</label>
              <input type="date" name="date" id="date" required>
              <input type="submit" value="Créer">
              <input type="reset" name="" value="Se connecter" class="btnConnexion">
            </form>
          </div>
          <div class="verso">
            <h1>Connexion</h1>
            <form class="formulaire" action="login.php" method="post">
              <label for="identifiant">Entrez votre identifiant</label>
              <input type="text" name="identifiant" id="identifiant">
              <label for="mdp">Entrez votre mot de passe :</label>
              <input type="password" name="mdp" value="" id="mdp">
              <input type="submit">
              <input type="reset" name="" value="Creer un compte" class="btnCreation">
              <?php
              if (isset($_GET["error"]))
              {
                if ($_GET["error"] == 1)
                {
                  echo "<p class='messageErreur'>L'utilisateur n'existe pas</p>";
                }
                if ($_GET["error"] == 2)
                {
                  echo "<p class='messageErreur'>Le mot de passe n'est pas le bon</p>";
                }
                if ($_GET["error"] == 3)
                {
                  echo "<p class='messageErreur'>Le mot de passe n'est pas le bon</p>";
                }
              }
              ?>
            </form>
          </div>
        </div>
    </div>
    <script type="text/javascript" src="include/script.js"></script>
  </body>
</html>
<?php
}
else
{
  header("Location:accueil.php");
}
?>