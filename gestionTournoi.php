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
            // SQL1 et SQL2 sont des chaînes de caractères qui vont être complétées
            // en fonction des input remplis ou non (certains sont facultatifs).
            // Assemblées ces 2 chaînes de caractères sont une requête INSERT INTO

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

            $affiche = $_FILES['affiche']['name'];
            $SQL1 = $SQL1 . ",affiche";
            $SQL2 = $SQL2 . ",\"".$affiche."\"";
            if(isset($_FILES['affiche'])) //Test si l'input file a été utilisé.
            {
                $dossier = 'afficheTournoi/'; //Le dossier de destination du fichier.
                //basename() sépare le nom du fichier et le nom du dossier.
                $fichier = basename($_FILES['affiche']['name']); //récupère le nom du fichier.
                if(move_uploaded_file($_FILES['affiche']['tmp_name'], $dossier . $fichier))
                {
                    //move_uploaded_file() déplace le fichier du répertoire temporaire vers le dossier voulu.
                    //move_uploaded_file() renvoie TRUE si le fichier a bien été déplacé.
                    //move_uploaded_file() prend 2 paramètres.
                    //Le nom du fichier dans le répertoire temporaire et le chemin du dossier de destination
                    //dans le répertoire temporaire le fichier prend un nom différent de celui à l'upload.
                    //$_FILES['affiche']['tmp_name'] permet d'obtenir le nom du fichier dans le répertoire temporaire.
                    //Ne pas oublier l'attribut enctype="multipart/form-data" du formulaire.
                }
                else //Sinon (la fonction renvoie FALSE).
                {
                    echo 'Echec de l\'upload !';
                }
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
