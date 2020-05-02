<?php

function dateProchainTournoi($categorie)
{
    include("connexion.php");
    $nbTournoi = $cnx->query("SELECT COUNT(*) AS nbTournoi FROM `tournoi` WHERE date > CURRENT_DATE AND categorie = ".$categorie);
    $nbTournoi->setFetchMode(PDO::FETCH_OBJ);
    $nbTournoi = $nbTournoi->fetch();
    if($nbTournoi->nbTournoi == 0)
    {
        return "";
    }
    else
    {
        $dateProchainTournoi = $cnx->query("SELECT MIN(date) AS dateProchainTournoi FROM `tournoi` WHERE date > CURRENT_DATE AND categorie = ".$categorie);
        $dateProchainTournoi->setFetchMode(PDO::FETCH_OBJ);
        $dateProchainTournoi = $dateProchainTournoi->fetch();
        return $dateProchainTournoi->dateProchainTournoi;
    }
}

function afficheProchainTournoi($categorie)
{
    include("connexion.php");
    $nbTournoi = $cnx->query("SELECT COUNT(*) AS nbTournoi FROM `tournoi` WHERE date > CURRENT_DATE AND categorie = ".$categorie);
    $nbTournoi->setFetchMode(PDO::FETCH_OBJ);
    $nbTournoi = $nbTournoi->fetch();
    if($nbTournoi->nbTournoi == 0)
    {
        return "";
    }
    else
    {
        $dateProchainTournoi = $cnx->query("SELECT MIN(date) AS dateProchainTournoi FROM `tournoi` WHERE (date > CURRENT_DATE) AND categorie = ".$categorie);
        $dateProchainTournoi->setFetchMode(PDO::FETCH_OBJ);
        $dateProchainTournoi = $dateProchainTournoi->fetch();
        $nomAfficheProchainTournoi = $cnx->query("SELECT affiche FROM tournoi WHERE date = '".$dateProchainTournoi->dateProchainTournoi."' AND categorie = ".$categorie);
        $nomAfficheProchainTournoi->setFetchMode(PDO::FETCH_OBJ);
        $affiche = $nomAfficheProchainTournoi->fetch();
        return $affiche->affiche;
    }
};


//Fonction qui permet de verifier si 2 tournois utilisent le meme fichier d'affiche
//Retourne true si le tournoi passé en paramètre partage son affiche avec un autre tournoi
function verificationMemeAfficheTournoi($id)
{
    include("connexion.php");
    $leTournoi = $cnx->query("SELECT * FROM `tournoi` WHERE id =".$id);
    $leTournoi->setFetchMode(PDO::FETCH_OBJ);
    $leTournoi = $leTournoi->fetch();
    $nbTournoi = $cnx->query("SELECT COUNT(*) AS nbTournoi FROM `tournoi` WHERE affiche = ".$leTournoi->affiche);
    $nbTournoi->setFetchMode(PDO::FETCH_OBJ);
    $nbTournoi = $nbTournoi->fetch();
    if($nbTournoi->nbTournoi > 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

?>