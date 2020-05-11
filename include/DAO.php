<?php
class DAO
{
    // ------------------------------------------------------------------------------------------------------
    // ---------------------------------- Membres privés de la classe ---------------------------------------
    // ------------------------------------------------------------------------------------------------------
    
    private $cnx;				// la connexion à la base de données
    
    // ------------------------------------------------------------------------------------------------------
    // ---------------------------------- Constructeur et destructeur ---------------------------------------
    // ------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $HOTE = "localhost";	// nom du serveur de données
        $PORT = '3306';			// numéro du port
        $USER = "root";			// nom de l'utilisateur
        $PWD  = "";		// son mot de passe
        $BDD  = "guipabad";		// nom de la base de données

        try
        {	$this->cnx = new PDO ("mysql:host=" . $HOTE . ";port=" . $PORT . ";dbname=" . $BDD, $USER, $PWD);
            return true;
        }
        catch (Exception $ex)
        {
            echo ("Echec de la connexion a la base de donnees <br>");
            echo ("Erreur numero : " . $ex->getCode() . "<br />" . "Description : " . $ex->getMessage() . "<br>");
            echo ("PARAM_HOTE = " . $PARAM_HOTE);
            return false;
        }
    }
    
    public function __destruct()
    {
        // ferme la connexion à MySQL :
        unset($this->cnx);
    }


    public function existePseudoUtilisateur($pseudo)
    {
        $requeteSQLText = "SELECT COUNT(*) AS nbUtilisateur FROM utilisateur WHERE identifiant = :pseudo";
        $requete = $this->cnx->prepare($requeteSQLText);
        $requete->bindValue("pseudo",$pseudo,PDO::PARAM_STR);
        $requete->execute();
        $laLigne = $requete->fetch(PDO::FETCH_OBJ);
        $nbUtilisateur = $laLigne->nbUtilisateur;
        if($nbUtilisateur == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getNiveauConnexion($pseudo,$mdp)
    {
        $requeteSQLText = "SELECT * FROM utilisateur ";
        $requeteSQLText .= "WHERE identifiant = :pseudo AND mdp = :mdpSha256";
        $requete = $this->cnx->prepare($requeteSQLText);
        $requete->bindValue("pseudo",$pseudo,PDO::PARAM_STR);
        $requete->bindValue("mdpSha256",$mdp,PDO::PARAM_STR);
        $requete->execute();
        $uneLigne = $requete->fetch(PDO::FETCH_OBJ);
        $niveauConnexion = $uneLigne->privilege;
        $requete->closeCursor();
        return $niveauConnexion;
    }
    
}
?>