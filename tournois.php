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
  if(isset($_SESSION["privilege"])){
    if($_SESSION["privilege"] == 2){
      $administrateur = true;
  ?>
  <form action="gestionTournoi.php" method="POST" class="formAjouterTournoi">
    <table>
      <tr>
        <td><label for="tournoi">Nom du tournoi :</label></td>
        <td><input type="text" id="tournoi" name="ajouterTournoi" required></td>
      </tr>
      <tr>
        <td><label for="club">Nom du club</label></td>
        <td><input type="text" id="club" name="club"></td>
      </tr>
      <tr>
        <td><label for="categorie">Catégorie :</label></td>
        <td>
          <select name="categorie" id="categorie">
            <option value="0">Jeune</option>
            <option value="1">Adulte</option>
          </select>
      </td>
      </tr>
      <tr>
        <td><label for="date">Date :</label></td>
        <td><input type="date" id="date" name="date" required></td>
      </tr>
      <tr>
        <td><label for="adresse">Adresse :</label></td>
        <td><input type="text" id="adresse" name="adresse"></td>
      </tr>
      <tr>
        <td><label for="cout">Coût d'inscription :</label></td>
        <td><input type="number" id="cout" name="cout"></td>
      </tr>
      <tr>
        <td><label for="affiche">Affiche :</label></td>
        <td><input type="file" id="affiche" name="affiche"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit"></td>
      </tr>
    </table>
  </form>
  <div class="separation"></div>
  <?php }} ?>
  <table class="tableauAffichageTournoi">
    <tr>
      <th>Nom</th>
      <th>Club</th>
      <th>Catégorie</th>
      <th>Date</th>
      <th>Adresse</th>
      <th>Prix</th>
      <th>Supprimer</th>
    </tr>
  <?php
  $lesTournois = $cnx->query("SELECT * FROM tournoi");
  $lesTournois->setFetchMode(PDO::FETCH_OBJ);
  while($unTournoi = $lesTournois->fetch())
  { ?>
  <tr>
    <td><?php echo $unTournoi->tournoi ?></td>
    <td><?php echo $unTournoi->club ?></td>
    <td>
      <?php
      if($unTournoi->inscription == 0){echo "Jeune";}
      else{echo "Jeune";}
      ?>
    </td>
    <td><?php echo $unTournoi->date ?></td>
    <td><?php echo $unTournoi->adresse ?></td>
    <td><?php echo $unTournoi->inscription ?></td>
    <?php if($administrateur){ ?>
    <td><a href="gestionTournoi.php?suppression=<?php echo $unTournoi->id; ?>">
      <img src="image/croix.png" alt="supprimer"></a>
    </td>
    <?php } ?>
  </tr>
  <?php }
  ?>
  </table>
  </body>
</html>
