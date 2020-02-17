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
            <form class="formulaire" action="login.php" method="post">
              <label for="identifiantCreation">Entrez votre identifiant</label>
              <input type="text" name="identifiant" id="identifiantCreation">
              <label for="mdpCreation">Entrez votre mot de passe :</label>
              <input type="password" name="mdp" id="mdpCreation">
              <label for="mdpCreation2">Entrez votre mot de passe une nouvelle fois:</label>
              <input type="password" name="mdp" id="mdpCreation2">
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
            </form>
          </div>
        </div>
    </div>
    <script type="text/javascript" src="include/script.js"></script>
  </body>
</html>
