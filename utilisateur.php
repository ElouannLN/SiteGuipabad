<?php
include("include/connexion.php");
if (isset($_POST["identifiant"]))
{
  $identifiant = $_POST["identifiant"];
  $mdp = $_POST["mdp"];
  $email = $_POST["email"];
  $nom = $_POST["mdp"];
  $prenom = $_POST["prenom"];
  $email = $_POST["email"];
  $date = $_POST["date"];

  $verif = $cnx->query("SELECT COUNT(*) AS test FROM utilisateur WHERE identifiant like '".$identifiant."'");
  $verif->setFetchMode(PDO::FETCH_OBJ);
  $resultat = $verif->fetch();
  if ($resultat->test == 0)
  {
    $cnx->query("INSERT INTO utilisateur (identifiant,mdp,nom,prenom,email,date_naissance,privilege)
    VALUES ('".$identifiant."','".$mdp."','".$nom."','".$prenom."','".$email."','".$date."','0')");
    echo "INSERT INTO utilisateur (identifiant,mdp,nom,prenom,email,date_naissance,privilege)
    VALUES ('".$identifiant."','".$mdp."','".$nom."','".$prenom."','".$email."','".$date."','0')";
  }
  else
  {
    header('Location: authentification.php?errorcreation=1');
  }
}
