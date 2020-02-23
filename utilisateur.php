<?php
include("include/connexion.php");
if (isset($_POST["identifiant"]))
{
  $identifiant = $_POST["identifiant"];
  $mdp = $_POST["mdp"];
  $email = $_POST["email"];
  $nom = $_POST["mdp"];
  $prenom = $_POST["prenom"];
  $cnx->query("INSERT INTO utilisateur (identifiant,mdp,nom,prenom,email,date_naissance,ville,code_postal,privilege)
  VALUES ('loulou1','abricot','Le Nezeut','Elouann','mail.de.elouann@lenezet.fr',"0622-12-12",'Guipavas','29490','2')")
}
