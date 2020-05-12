<?php

class Message
{
    private $id;
    private $idAuteur;
    private $idReceveur;
    private $contenu;
    private $date;
    private $heure;

    public function __construct($unId,$unIdAuteur,$unidReceveur,$unContenu,$uneDate,$uneHeure)
    {
        $this->id = $unId;
        $this->idAuteur = $unIdAuteur;
        $this->idReceveur = $unidReceveur;
        $this->contenu = $unContenu;
        $this->date = $uneDate;
        $this->heure = $uneHeure;
    }

    public function getId(){return $this->id;}
    public function setId($unid) {$this->id = $unId;}
    
    public function getIdAuteur(){return $this->idAuteur;}
    public function setIdAuteur($unidAuteur) {$this->idAuteur = $unIdAuteur;}

    public function getIdReceveur(){return $this->idReceveur;}
    public function setIdReceveur($unidReceveur) {$this->idReceveur = $unIdReceveur;}

    public function getContenu(){return $this->contenu;}
    public function setContenu($unContenu) {$this->contenu = $unContenu;}

    public function getDate(){return $this->date;}
    public function setDate($uneDate) {$this->date = $uneDate;}

    public function getHeure(){return $this->heure;}
    public function setHeure($uneHeure) {$this->heure = $uneHeure;}

    public function toString()
    {
        $message = "Ceci est un message :<br>";
        $message .= "id : ".$this->id."<br>";
        $message .= "idAuteur : ".$this->idAuteur."<br>";
        $message .= "idReceveur : ".$this->idReceveur."<br>";
        $message .= "Contenu : ".$this->contenu."<br>";
        $message .= "Date : ".$this->date."<br>";
        $message .= "Heure : ".$this->heure."<br>";
        return $message;
    }
}

?>