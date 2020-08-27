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

    <div class="adminPageArchives">
      <?php include("include/formAjoutSection.php");?>
      <?php include("include/formAjoutPhoto.php");?>
    </div>

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
