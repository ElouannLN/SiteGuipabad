<?php
session_start();
if(isset($_SESSION["privilege"]))
{
    if($_SESSION["privilege"] == 2) //Si l'utilisateur est administrateur
    {
        if(isset($_GET["modifier"]))
        {
            include("include/connexion.php");
            $leTournoi = $cnx->query("SELECT * FROM tournoi WHERE id =".$_GET["modifier"]);
            $leTournoi->setFetchMode(PDO::FETCH_OBJ);
            $leTournoi = $leTournoi->fetch();
            ?>
            <!DOCTYPE html>
            <html lang="en" dir="ltr">
                <head>
                    <meta charset="utf-8">
                    <title>Modifier Tournois | Guipavas Badminton</title>
                    <link rel="stylesheet" href="include/style.css">
                </head>
                <body>
                    <?php include("include/menu.php"); ?>
                    <h1 class="titrePageTournoi">Modification du tournoi : <?php echo $leTournoi->tournoi; ?></h1>
                    <form enctype="multipart/form-data" action="gestionTournoi.php" method="POST" class="formAjouterTournoi" >
                        <table>
                            <tr>
                                <td><label for="tournoi">Nom du tournoi :</label></td>
                                <td><input type="text" id="tournoi" name="ajouterTournoi" required value="<?php echo $leTournoi->tournoi; ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="club">Nom du club</label></td>
                                <td><input type="text" id="club" name="club" value="<?php echo $leTournoi->club; ?>"></td>
                            </tr>
                            <tr>
                            <td><label for="categorie">Catégorie :</label></td>
                                <td>
                                <select name="categorie" id="categorie">
                                    <?php
                                    if($leTournoi->categorie == 0)
                                    {
                                    ?>
                                        <option value="0">Jeune</option>
                                        <option value="1">Adulte</option>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <option value="1">Adulte</option>
                                        <option value="0">Jeune</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="date">Date :</label></td>
                                <td><input type="date" id="date" name="date" required value="<?php echo $leTournoi->date; ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="adresse">Adresse :</label></td>
                                <td><input type="text" id="adresse" name="adresse" value="<?php echo $leTournoi->adresse; ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="cout">Coût d'inscription :</label></td>
                                <td><input type="number" id="cout" name="cout" value="<?php echo $leTournoi->inscription; ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="affiche">Affiche :</label></td>
                                <td><input type="file" id="affiche" name="affiche"></td>
                            <input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit"></td>
                            </tr>
                            </table>
                        </form>
                    </body>
            </html>
        <?php
        }
    }
}