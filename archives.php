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
     $lesSections = $cnx->query("SELECT * FROM section INNER JOIN image
       ON section.id_section = image.id_section
       GROUP BY section.id_section
       HAVING COUNT(image.id_image) > 0");
     $lesSections->setFetchMode(PDO::FETCH_OBJ);
     while ($uneSection = $lesSections->fetch())
     { ?>
      <h2 class="nomDeSectionPhoto"><?php echo $uneSection->nom_section; ?></h2>
          <?php

            $idSection = $uneSection->id_section;
            $lesImages = $cnx->query("SELECT * FROM image WHERE id_section =".$idSection);
            $lesImages->setFetchMode(PDO::FETCH_OBJ); ?>
            <div class="divImageGallerie">
            <?php while($uneImage = $lesImages->fetch())
              { ?>
                <img class="imageGallerie" src="imageGallerie/<?php echo $uneImage->nom_image; ?>">
            <?php }
            ?> </div> <?php
     } ?>
    <h1 class="titrePage">Page des Archives | Presse</h1>

      <script type="text/javascript" scr="include/script.js"></script>
  </body>
</html>
