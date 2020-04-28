<?php
session_start();
include("include/connexion.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tournois</title>
    <link rel="stylesheet" href="include/style.css">
  </head>
  <body>
    <?php include("include/menu.php"); ?>
    <h1 class="titrePageTournoi">Tournois</h1>
    <?php
    $administrateur = false;
    if(isset($_SESSION["privilege"])) //Si l'utilisateur est connecté
    {
      if($_SESSION["privilege"] == 2) //Si l'utilisateur est administrateur
      {
        $administrateur = true;
        include("include/formAjoutTournoi.php"); //Include du formulaire d'ajout de tournoi
      }
    }
    ?>
    <div class="mainTournoi">
      <div class="tournoiJeune">
        <h2 class="titrePageTournoi">Tournois Jeunes</h2>
        <?php
        include("include/outils.php");
        ?>
        <img src="afficheTournoi/<?php echo afficheProchainTournoi(0); ?>" class="afficheTournoiRecent" alt="Pas d'affiche disponible">
        <div class="separation"></div>
        <table class="tableauAffichageTournoi">
          <tr>
            <th>Nom</th>
            <th>Club</th>
            <th>Date</th>
            <th>Adresse</th>
            <th>Prix</th>
            <?php if($administrateur){ ?>
            <th>Supprimer</th>
            <?php } ?>
          </tr>
        <?php
        //Récupération des tournois jeunes dans la base de données
        $lesTournois = $cnx->query("SELECT * FROM tournoi WHERE categorie = 0 ORDER BY date");
        $lesTournois->setFetchMode(PDO::FETCH_OBJ);
        while($unTournoi = $lesTournois->fetch())
        { ?>
        <tr <?php
            if($unTournoi->date == dateProchainTournoi(0))
            {
              echo "class='tournoiProche'";
            }
            ?>>
          <td><?php echo $unTournoi->tournoi ?></td>
          <td><?php echo $unTournoi->club ?></td>
          <td><?php echo $unTournoi->date ?></td>
          <td><?php echo $unTournoi->adresse ?></td>
          <td><?php echo $unTournoi->inscription ?></td>
          <?php if($administrateur){ ?>
          <td class="caseSupprimerTournoi">
            <a class="lienSupprimerTournoi" href="gestionTournoi.php?suppression=<?php echo $unTournoi->id; ?>"> Supprimer </a>
          </td>
          <?php } ?>
        </tr>
        <?php } ?>
        </table>
        <a href="tournoiPdf.php?categorie=0" class="lienPdf"><div><p>PDF</p></div></a>
      </div>
      <div class="tournoiAdulte">
        <h2 class="titrePageTournoi">Tournois Adulte</h2>
        <img src="afficheTournoi/<?php echo afficheProchainTournoi(1); ?>" class="afficheTournoiRecent" alt="Pas d'affiche disponible">
        <div class="separation"></div>
        <table class="tableauAffichageTournoi">
          <tr>
            <th>Nom</th>
            <th>Club</th>
            <th>Date</th>
            <th>Adresse</th>
            <th>Prix</th>
            <?php if($administrateur){ ?>
            <th>Supprimer</th>
            <?php } ?>
          </tr>
        <?php
        //Récupération des tournois jeunes dans la base de données
        $lesTournois = $cnx->query("SELECT * FROM tournoi WHERE categorie = 1 ORDER BY date");
        $lesTournois->setFetchMode(PDO::FETCH_OBJ);
        while($unTournoi = $lesTournois->fetch())
        { ?>
        <tr <?php
            if($unTournoi->date == dateProchainTournoi(1))
            {
              echo "class='tournoiProche'";
            }
            ?>>
          <td><?php echo $unTournoi->tournoi ?></td>
          <td><?php echo $unTournoi->club ?></td>
          <td><?php echo $unTournoi->date ?></td>
          <td><?php echo $unTournoi->adresse ?></td>
          <td><?php echo $unTournoi->inscription ?></td>
          <?php if($administrateur){ ?>
          <td><a href="gestionTournoi.php?suppression=<?php echo $unTournoi->id; ?>">
            <img src="image/croix.png" alt="supprimer"></a>
          </td>
          <?php } ?>
        </tr>
        <?php } ?>
        </table>
      </div>
    </div>
  </body>
</html>
