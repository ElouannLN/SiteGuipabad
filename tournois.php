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
            <th>Modifier</th>
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
          <td class="caseModifierTournoi">
            <div>
                <p>Modifier</p>
            </div>
          </td>
          <td class="caseSupprimerTournoi">
            <div>
              <a href="gestionTournoi.php?suppression=<?php echo $unTournoi->id; ?>">
                <p>Supprimer</p>
              </a>
            </div>
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
            <th>Modifier</th>
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
          <td class="caseModifierTournoi">
            <div>
              <a href="gestionTournoi.php?suppression=<?php echo $unTournoi->id; ?>">
                <p>Modifier</p>
              </a>
            </div>
          </td>
          <td class="caseSupprimerTournoi">
            <div>
              <a href="gestionTournoi.php?suppression=<?php echo $unTournoi->id; ?>">
                <p>Supprimer</p>
              </a>
            </div>
          </td>
          <?php } ?>
        </tr>
        <?php } ?>
        </table>
      </div>
    </div>
    <script>
        var unObjetXHR = new XMLHttpRequest();
        unObjetXHR.open('GET',"envoyerTournoi.php?id=42");
        unObjetXHR.send(null);
        unObjetXHR.addEventListener("readystatechange",function(){
            if(unObjetXHR.readyState === XMLHttpRequest.DONE)
            {
              //Stock le document dans une variable
              var leDocXML = unObjetXHR.responseXML;
              var leTournoi = leDocXML.childNodes[0].childNodes;
              var data = "";
              for(var i = 0;i < leTournoi.length;i++)
              {
                if(leTournoi[i].childNodes[0] != undefined)
                {
                  data = leTournoi[i].childNodes[0].nodeValue;
                }
              }
            }


            //nextSibling
            //getElementsByTagName('tournoi')
            //hasChildNodes()
            //nodeType
        });
    </script>
  </body>
</html>
