<?php

include("include/connexion.php");

$mdp = $_POST["mdp"];
$identifiant = $_POST["identifiant"];
$test = $cnx->query("SELECT COUNT(*) AS resultat FROM utilisateur WHERE identifiant like '".$identifiant."' OR email like '".$identifiant."'");
$test->setFetchMode(PDO::FETCH_OBJ);
$resultat = $test->fetch();
if($resultat->resultat == 1)
{
  $utilisateur = $cnx->query("SELECT * FROM utilisateur WHERE identifiant like '".$identifiant."' OR email like '".$identifiant."'");
  $utilisateur->setFetchMode(PDO::FETCH_OBJ);
  $unUtilisateur = $utilisateur->fetch();
  if($unUtilisateur->mdp == $mdp)
  {
    echo "Vous êtes connecté<br>";
    echo "Bonjour ".$unUtilisateur->prenom." ".$unUtilisateur->nom;
    session_start();
    $_SESSION ["privilege"] = $unUtilisateur->privilege;
    header('Location: accueil.php');
  }
  else
  {
    header('Location: authentification.php?error=1');
  }
}
else
{
  header('Location: authentification.php?error=1');
}
