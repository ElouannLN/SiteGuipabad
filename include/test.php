<?php
session_start();
include("connexion.php");

$categorie = 1;

$req = $cnx->prepare("SELECT * FROM tournois WHERE categorie = :categorie");
$req->bindValue(':categorie',$categorie,PDO::PARAM_INT);
$resultats = $req->execute();
$resultats->setFetchMode(PDO::FETCH_OBJ);
$resultats = $resultats->fetch();
echo $resultats->tournoi;