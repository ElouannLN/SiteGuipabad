<?php
session_start();
if(isset($_GET["identifiant"]) && isset($_GET["mdp"]))
{
    if(isset($_GET["id1"]) && isset($_GET["id2"]))
    {
        include("connexion.php");
        $nbMessage = $cnx->query("SELECT COUNT(*) AS nb FROM message WHERE idAuteur = ".$_GET["id1"]." AND idReceveur = ".$_GET["id2"]);
        //echo "SELECT COUNT(*) AS nb FROM message WHERE idAuteur = ".$_GET["id1"]." AND idReceveur = ".$_GET["id2"];
        $nbMessage->setFetchMode(PDO::FETCH_OBJ);
        $nbMessage = $nbMessage->fetch();
        header("Content-Type: text/xml");
        echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
        echo "<conversation>";
        if($nbMessage->nb > 0)
        {
            $lesMessages = $cnx->query("SELECT * FROM message WHERE idAuteur = ".$_GET["id1"]." AND idReceveur = ".$_GET["id2"]);
            $lesMessages->setFetchMode(PDO::FETCH_OBJ);
            while($leMessage = $lesMessages->fetch())
            {
                echo "<message>";
                echo "<auteur>".$leMessage->idAuteur."</auteur>";
                echo "<receveur>".$leMessage->idReceveur."</receveur>";
                echo "<contenu>".$leMessage->contenu."</contenu>";
                echo "<date>".$leMessage->date."</date>";
                echo "<heure>".$leMessage->heure."</heure>";
                echo "</message>";
            }
        }
        else
        {

        }
        echo "</conversation>";
    }
}
else
{
    echo "Le mot de passe et l'identifiant ne sont pas renseignés";
}
/*
INSERT INTO message (idAuteur,idReceveur,contenu,date,heure) VALUES
(1,2,'Le message','2020-11-11','11:11:11')
localhost/Guipabad/include/envoyerMessage.php?id1=1&id2=2
*/
?>