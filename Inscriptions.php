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

    <div class="pageInscriptions">
      <div class="conteneurPrésentationClub">

        <h2 class="titrePresentationClub">Qu'est ce que Guipabad ?</h2>
        <p class="messagePresentationClub"> Guipabad est un club de Badminton bénévol de renomée (presque) mondiale situé au centre ville de Guipavas <br>
          Le club propose des entraînements réguliers pour jeunes et adultes tout au long de l'année ! Lors des periodes scolaires, les scéances jeunes <br>
          ont lieux tous les mardis de 18h30 à 20h. Pour les adultes les entraînements ont lieux tous les mardis et jeudi de 20H30 à 22H30. Durant les vacances <br>
          Les jeunes badistes sont le bienvenue aux entraînements adultes qui sont maintenus toute l'année (hors jours feriés, et encore !).</p>
      </div>

      <div class="conteneurTarifs">
          <h2 class="titreTarifs">Tarifs</h2>
          <div class="conteneurTableauEtTexte">
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
            <p class="messageTarifs"> Le tarif réduit de -25% s’applique aux demandeurs d’emploi, étudiants et -10% à partir du 2ème enfant inscrit à l’amicale.<br>
              Chèques vacances ou chèques sport de ANCV acceptés.<br>
              Coupon sport ou coupon culture du CCAS de Guipavas acceptés.<br>
              Possibilité de régler en plusieurs fois.</p>
          </div>
      </div>
        <div class="conteneurAmicaleUfolep">

          <h2 class="titreAmicaleUfolep">Amicale Laïque et Ufolep</h2>
          <p class="messageAmicaleUfolep"> Le club de Guipavas fait partit de deux organisations qui permettent à ses différents membres de bénéficier de plusieurs avantages :<br>
          - L'amicale laïque de Guipavas, dont dépend le club, permet notamment la possibilité des tarifs réduits vu plus haut, mais aussi la possibilité de bénéficier <br>
          de tarifs avantageux sur les activités multiples dans la mesure suivante : "Activité la plus chère au tarif plein, les activités suivantes à 50%". <br>
          - L'Ufolep, qui est la fédération du club, et qui permet à ses membres de participer à deux circuits tout au long de l'année. Les tournois, qui sont organisés <br>
          par les clubs membres et qui permettent d'aller affronter de nombreux badistes de la région le temps d'une journée (pour les jeunes) ou d'une soirée (pour les adultes). <br>
          Les championnats qui permettent à chaque club de s'affronter de manière régulière, avec des adversaires d'un niveau équivalent. Les inscriptions aux championnats se font <br>
          au début de l'année auprès de notre chère présidente, ou au cours de l'année sur demande exeptionnelle.</p>

        </div>



    </div>
      <script type="text/javascript" scr="include/script.js"></script>
  </body>
</html>
