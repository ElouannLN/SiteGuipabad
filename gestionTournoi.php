<?php
session_start();
if(isset($_SESSION["privilege"]))
{
    if($_SESSION["privilege"] == 2)
    {
        include("include/connexion.php");

        
        if(isset($_POST["ajouterTournoi"]))
        {
            //Ajout d'un tournoi dans la BDD

            $SQL1 = "INSERT INTO tournoi (tournoi,club,categorie";
            $SQL2 = " VALUES (";

            $tournoi = $_POST["ajouterTournoi"];
            $SQL2 = $SQL2 . "\"".$tournoi."\"";

            $club = $_POST["club"];
            $SQL2 = $SQL2 . ",\"".$club."\"";

            $categorie = $_POST["categorie"];
            $SQL2 = $SQL2 . ",".$categorie;

            if(isset($_POST["date"]))
            {
                $date = $_POST["date"];
                $SQL1 = $SQL1 . ",date";
                $SQL2 = $SQL2 . ",\"".$date."\"";
            }

            if($_POST["adresse"] != "")
            {
                $adresse = $_POST["adresse"];
                $SQL1 = $SQL1 . ",adresse";
                $SQL2 = $SQL2 . ",\"".$adresse."\"";
            }

            if($_POST["cout"] != "")
            {
                $cout = $_POST["cout"];
                $SQL1 = $SQL1 . ",inscription";
                $SQL2 = $SQL2 . ",".$cout;
            }

            if($_POST["affiche"] != "")
            {
                $affiche = $_POST["affiche"];
                $SQL1 = $SQL1 . ",affiche";
                $SQL2 = $SQL2 . ",\"".$affiche."\"";
            }

            $SQL1 = $SQL1 . ") ";
            $SQL2 = $SQL2 . ")";

            $cnx->query($SQL1.$SQL2);
            echo $SQL1.$SQL2;
            header("Location: tournois.php");
        }
        elseif (isset($_GET["suppression"]))
        {
            //Suppression d'un tournoi de la BDD
            $idSupprimer = $_GET["suppression"];
            $cnx->query("DELETE FROM tournoi WHERE id =".$idSupprimer);
            header("Location: tournois.php");
        }
        else
        {
          header("Location: tournois.php");
        }
    }
    else
    {
        header("Location: tournois.php");
    }
}
else
{
    header("Location: tournois.php");
}
