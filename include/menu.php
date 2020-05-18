<div class="menu">

  <div class="supmenu">

    <a class="lienlogosite" href="accueil.php">
      <img class="Logosite" src="image/LogoNMenu.png" alt="Logo du site">
    </a>

    <?php if(isset($_SESSION ["privilege"]) == false)
    {

    ?>

    <a class="lienlogoconnexion" href="authentification.php">
      <img class="LogoConnexion" src="image/LogoConnexion.png" alt="Logo d'authentification">
    </a>

    <?php
    }
    else
    {
    ?>
    <div class="conteneurMessageMenu">

      <p class="messageMenuConnectes">Bienvenue <?php echo $_SESSION["prenom"]; ?>, </br></p>
      <p class="messageMenuDeconnexion">Pour vous déconnecter, cliquez <a class="lienDeconnexion" href="deconnexion.php">ici</a>.</p>
    </div>
    <?php
    }
    ?>
  </div>

  <div class=undermenu>
    <a class="menulien" href="accueil.php">Actualités</a>
    <a class="menulien" href="tournois.php">Tournois</a>
    <a class="menulien" href="inscriptions.php">Inscriptions</a>
    <a class="menulien" href="contacts.php">Contacts</a>
      <div class="menuArchives">
        <p class="menulienArchives">Archives</p>
        <a class="menulien" href="Photos.php">Photos</a>
        <a class="menulien" href="Presse.php">Presse</a>
      </div>
  </div>
</div>
