<?php

if(isset($_GET["id"]))
{
    include("include/connexion.php");
    $infoTournoi = $cnx->query("SELECT * FROM tournoi WHERE id = ".$_GET["id"]);
    $infoTournoi->setFetchMode(PDO::FETCH_OBJ);
    $infoTournoi = $infoTournoi->fetch();
    //Creation du document XML
    header("Content-Type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
    echo "<tournoi>";
    echo "<nom>".$infoTournoi->tournoi."</nom>";
    echo "<club>".$infoTournoi->club."</club>";
    echo "<categorie>".$infoTournoi->categorie."</categorie>";
    echo "<date>".$infoTournoi->date."</date>";
    echo "<adresse>".$infoTournoi->adresse."</adresse>";
    echo "<inscription>".$infoTournoi->adresse."</inscription>";
    echo "</tournoi>";
}

?>