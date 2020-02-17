<?php

include("include/connexion.php");

$mdp = $_POST["mdp"];
$identifiant = $_POST["identifiant"];
$test = $cnx->query("SELECT COUNT(*) AS resultat FROM utilisateur WHERE identifiant like '".$identifiant."'");
$test->setFetchMode(PDO::FETCH_OBJ);
$resultat = $test->fetch();
if($resultat->resultat == 1)
{
  $utilisateur = $cnx->query("SELECT * FROM utilisateur WHERE identifiant like '".$identifiant."'");
  $utilisateur->setFetchMode(PDO::FETCH_OBJ);
  $unUtilisateur = $utilisateur->fetch();
  echo "Vous êtes connecté<br>";
  echo "Bonjour ".$unUtilisateur->prenom." ".$unUtilisateur->nom;
}
else
{
  echo "Vous n'avez même pas réussi à entrer correctement votre identifiant et votre mot de passe";
}

/*while($unUtilisateur = $utilisateurs->fetch())
{
  if(($unUtilisateur->email == $identifiant OR $unUtilisateur->identifiant == $identifiant) AND $unUtilisateur->mdp == $mdp)
  {
    echo "Vous êtes connecté<br>";
    echo "Bonjour ".$unUtilisateur->prenom." ".$unUtilisateur->nom;
  }
}*/
