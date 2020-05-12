<?php
include("DAO.class.php");
$message = new Message (1,2,3,"Salut les gens ","2020-12-12","12:12:12");
$connexion = new DAO();
//echo $connexion->getNiveauConnexion("imiszczu","1a541a576e22e57ad6a1e5e60494ec36c3d480bf09fe7b52970b6ae5a5f0688e");
//echo $connexion->existePseudoUtilisateur("imiszczu");
$lesMessages = $connexion->getToutLesMessages();
for($i = 0;$i < sizeof($lesMessages);$i++)
{
    echo $lesMessages[$i]->toString();
}