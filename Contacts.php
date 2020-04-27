<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include ("include/connexion.php");
    $hentai = $cnx->query("SELECT * FROM tournoi");
    $hentai->setFetchMode(PDO::FETCH_OBJ);
    $furry = $hentai->fetch();
    echo $furry->tournoi;


    ?>

    <p>Hello the world !</p>
  </body>
</html>
