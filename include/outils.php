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
        $dateProchainTournoi = $cnx->query("SELECT MIN(date) AS dateProchainTournoi FROM `tournoi` WHERE date > CURRENT_DATE AND categorie = ".$categorie);
        $dateProchainTournoi->setFetchMode(PDO::FETCH_OBJ);
        $dateProchainTournoi = $dateProchainTournoi->fetch();
        $nomAfficheProchainTournoi = $cnx->query("SELECT affiche FROM tournoi WHERE date = '".$dateProchainTournoi->dateProchainTournoi."'");
        $nomAfficheProchainTournoi->setFetchMode(PDO::FETCH_OBJ);
        $affiche = $nomAfficheProchainTournoi->fetch();
        return $affiche->affiche;
    }
};

?>