<?php
session_start();
if(isset($_SESSION["privilege"]))
{
    if($_SESSION["privilege"] == 2)
    {
        if(isset($_POST["ajouterTournoi"]))
        {
            include("include/connexion.php");

            $SQL1 = "INSERT INTO tournoi (tournoi,club";
            $SQL2 = " VALUES (";

            $tournoi = $_POST["ajouterTournoi"];
            $SQL2 = $SQL2 . "\"".$tournoi."\"";

            $club = $_POST["club"];
            $SQL2 = $SQL2 . ",\"".$club."\"";

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
