<?php
session_start();
if(isset($_SESSION["privilege"]))
{
    if($_SESSION["privilege"] == 2) //Si l'utilisateur est administrateur
    {
        if(isset($_GET["modifier"]))
        {
        ?>
            <!DOCTYPE html>
            <html lang="en" dir="ltr">
            <head>
                <meta charset="utf-8">
                <title>Tournois | Guipavas Badminton</title>
                <link rel="stylesheet" href="include/style.css">
            </head>
            <body>
                <?php include("include/menu.php"); ?>
                <h1 class="titrePageTournoi">Modifier Tournois</h1>
            </body>
            </html>
        <?php
        }
    }
}