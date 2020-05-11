<?php

include("include/connexion.php");

$mdp = hash("sha256",$_POST["mdp"]); //Récupération du mot de passe venant du formulaire
echo $mdp;
$identifiant = $_POST["identifiant"]; //Récupération de l'identifiant venant du formulaire
//Récupération des résultats de la requête SQL qui retourne le nombre
//d'utilisateur correspondant à un identifiant ou un email
$donnees = $cnx->query("SELECT COUNT(*) AS resultat FROM utilisateur WHERE identifiant like '".$identifiant."' OR email like '".$identifiant."'");
$donnees->setFetchMode(PDO::FETCH_OBJ);
$resultat = $donnees->fetch();
//Vérifie si un utilisateur correspond au pseudo ou au mail
if($resultat->resultat == 1)
{
  $utilisateur = $cnx->query("SELECT * FROM utilisateur WHERE identifiant like '".$identifiant."' OR email like '".$identifiant."'");
  $utilisateur->setFetchMode(PDO::FETCH_OBJ);
  $unUtilisateur = $utilisateur->fetch();
  //Vérifie le mot de passe entrer correspond à l'utilisateur
  if($unUtilisateur->mdp == $mdp)
  {
    echo "Vous êtes connecté<br>";
    echo "Bonjour ".$unUtilisateur->prenom." ".$unUtilisateur->nom;
    session_start();
    $_SESSION ["privilege"] = $unUtilisateur->privilege;
    $_SESSION ["identifiant"] = $unUtilisateur->identifiant;
    $_SESSION ["prenom"] = $unUtilisateur->prenom;
    $_SESSION ["nom"] = $unUtilisateur->nom;
    $_SESSION ["mdp"] = $unUtilisateur->mdp;
    header('Location: accueil.php');
  }
  else
  {
    header('Location: authentification.php?error=2');
  }
}
else
{
  header('Location: authentification.php?error=1');
}
