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
    <nav>
      <ul>
        <li><a class="menuLien" href="accueil.php">Actualités</a></li>
        <li><a class="menuLien" href="tournois.php">Tournois</a></li>
        <li><a class="menuLien" href="inscriptions.php">Inscriptions</a></li>
        <li><a class="menuLien" href="contacts.php">Contacts</a></li>
        <li class="menuDeroulant">
          <a class="menuLienA" href="">Archives</a>
          <ul class="sousMenu">
            <div class="fondEtBordureSousMenu">
              <li><a class="menuSousLien" href="Photos.php">Photos</a></li>
              <li><a class="menuSousLien" href="Presse.php">Presse</a></li>
            </div>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
