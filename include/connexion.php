<?php
$HOTE = "localhost";	// nom du serveur de données
$PORT = '3306';			// numéro du port
$USER = "root";			// nom de l'utilisateur
$PWD  = "";		// son mot de passe
$BDD  = "guipabad";		// nom de la base de données

try
{
	$cnx = new PDO('mysql:host='.$HOTE.';port='.$PORT.';dbname='.$BDD,$USER,$PWD);
}
// récupération et affichage d'un message en cas d'erreur de connexion
catch (Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'</br/>';
	echo 'N° : '.$e->getCode();
}
?>
