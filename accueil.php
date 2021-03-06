<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
      <title>Acceuil | Guipavas Badminton</title>
    <link rel="stylesheet" href="include/style.css">
  </head>

  <body>
    <?php include("include/menu.php"); ?>

    <div class="textebrefetinfosclub">
     <div class="caseactusbrefs">
       <div class="conteneurSlider">
         <figure class="SliderAcceuil">
          <img class="ImageSlider" src="image/ClubJeunes.jpg" alt="Image du slider d'accueil">
          <img class="ImageSlider" src="image/ClubAdultes.jpg" alt="Image du slider d'accueil">
         </figure>
       </div>
      <h2 class="actusbref">L'actu en bref !</h2>
        <p class="textactusbref">Le club de Coatodon est enfin dissous ! <br/>
                                 Plumy enfin dèrrière les barreaux ? <br/>
                                 Le badminton, nouveau symbole du communisme.</p>
     </div>

     <div class="Carteetinfosclub">
        <p class="Questionclub">Où nous trouver ?<br/></p>
        <iframe class="Carteinfosclub" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1112.951534708599!2d-4.408116750624529!3d48.43619267272253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4816b14d3a1b66c9%3A0x3d8da919d817dc80!2sSalle%20Omnisports%20de%20Keranna!5e0!3m2!1sfr!2sfr!4v1587860299407!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <p class="Reponseclub"> Salle de Keranna, à Guipavas !<br/>(proche du superU)</p>
        <p class="Questionclub">Quelles sont les horaires ?<br/></p>
        <p class="Categorieinfosclub">Pour les jeunes :<br/></p>
        <p class="Reponseclub">Le mardi, de 18H30 à 20H.<br/></p>
        <p class="Categorieinfosclub">Pour les Adultes : </br></p>
        <p class="Reponseclub">Les mardis et jeudis, de 20H30 à 22H30.<br/></p>
        <p class="Plusdinfosclub">- Plus d'informations <a href="inscriptions.php">ici</a>. -</p>

     </div>
    </div>

     <h1 class="actualites">Actualités</h1>
      <p class="news">
      </p>
      <script type="text/javascript" scr="include/script.js"></script>
  </body>
</html>
