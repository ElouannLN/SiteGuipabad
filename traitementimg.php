<?php
$idSection = $_POST['selectSection'];
$envoiimage = $_FILES['envoiimage']['name'];
if(isset($_FILES['envoiimage'])) //Test si l'input file a été utilisé.
{
    $dossier = 'imageGallerie/'; //Le dossier de destination du fichier.
    //basename() sépare le nom du fichier et le nom du dossier.
    $fichier = basename($_FILES['envoiimage']['name']); //récupère le nom du fichier.
    if(move_uploaded_file($_FILES['envoiimage']['tmp_name'], $dossier . $fichier))
    {
      include("include/connexion.php");
      $cnx->query("INSERT INTO image (nom_image, id_section) values ('". $fichier ."','". $idSection ."')");

        //move_uploaded_file() déplace le fichier du répertoire temporaire vers le dossier voulu.
        //move_uploaded_file() renvoie TRUE si le fichier a bien été déplacé.
        //move_uploaded_file() prend 2 paramètres.
        //Le nom du fichier dans le répertoire temporaire et le chemin du dossier de destination
        //dans le répertoire temporaire le fichier prend un nom différent de celui à l'upload.
        //$_FILES['affiche']['tmp_name'] permet d'obtenir le nom du fichier dans le répertoire temporaire.
        //Ne pas oublier l'attribut enctype="multipart/form-data" du formulaire.
    }
    else //Sinon (la fonction renvoie FALSE).
    {
        echo 'Echec de l\'upload !';
    }
}





















 ?>
