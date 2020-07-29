<?php
  session_start();
  include("include/connexion.php");
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
      <title>Archives | Guipavas Badminton </title>
    <link rel="stylesheet" href="include/style.css">
  </head>

  <body>
    <?php include("include/menu.php"); ?>

    <h1 class="titrePage">Page des Archives | Photos</h1>

    <form class="" action="traitementsct.php" method="post">
      <input type="text" name="nomSection">
      <input type="submit" value="Envoyer">
      <input type="reset" value="Supprimer">
    </form>

    <form class="" action="traitementimg.php" method="post" enctype="multipart/form-data">
      <input type="file" name="envoiimage">
      <select name="selectSection">
        <?php
          $lesSections = $cnx->query("SELECT * FROM section");
          $lesSections->setFetchMode(PDO::FETCH_OBJ);
          while($uneSection = $lesSections->fetch())
          { ?>
            <option value="<?php echo $uneSection->id_section; ?>">
              <?php echo $uneSection->nom_section; ?>
            </option>
            <?php
          }
         ?>
      </select>
      <input type="submit" value="Envoyer">
      <input type="reset" value="Supprimer">
      <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
    </form>

    <?php
     $lesImages = $cnx->query("SELECT * FROM image");
     $lesImages->setFetchMode(PDO::FETCH_OBJ);
     while($uneImage = $lesImages->fetch())
      { ?>
        <img src="imageGallerie/<?php echo $uneImage->nom_image; ?>">
      <?php } ?>





















































    <h1 class="titrePage">Page des Archives | Presse</h1>

      <script type="text/javascript" scr="include/script.js"></script>
  </body>
</html>
