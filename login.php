<?php

include("include/connexion.php");

$utilisateurs = $cnx->query("SELECT * FROM utilisateur");
$utilisateurs->setFetchMode(PDO::FETCH_OBJ);
while($unUtilisateur = $utilisateurs->fetch())
{
  echo $unUtilisateur->nom;
}
