<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
      <title>Inscriptions | Guipavas Badminton </title>
    <link rel="stylesheet" href="include/style.css">
  </head>

  <body>
    <?php include("include/menu.php"); ?>

    <h1 class="titreInscriptions">Modalités d'inscriptions</h1>
     <p class="texteAmicale">
     </p>

    <table class="tableauTarifs">
      <tr>
        <th>Catégorie</th>
        <th>Tarif plein</th>
        <th>Tarif réduit</th>
      </tr>

      <tr>
        <td>Jeunes</td>
        <td>45€</td>
        <td>41€</td>
      </tr>

      <tr>
        <td>Adultes</td>
        <td>73€</td>
        <td>54€</td>
      </tr>
    </table>


      <script type="text/javascript" scr="include/script.js"></script>
  </body>
</html>
