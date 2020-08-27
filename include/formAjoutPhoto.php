<form class="tableAjoutPhoto" action="traitementimg.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td></td>
            <td> <input type="file" name="envoiimage"> </td>        
        </tr>
        <tr>
            <td> <label for="selectSection">Section de l'image :</label> </td>
            <td>         
                <select name="selectSection" id="selectSection">
                            <?php
                                $lesSections = $cnx->query("SELECT * FROM section");
                                $lesSections->setFetchMode(PDO::FETCH_OBJ);
                                while($uneSection = $lesSections->fetch())
                            { ?>
                                <option value="<?php echo $uneSection->id_section; ?>">
                                    <?php echo $uneSection->nom_section; ?>
                                </option>
                            <?php } ?> 
            </td>        
        </tr>
        <tr>
            <td></td>
            <td> <input type="submit" value="Envoyer"> </td>        
        </tr>
        <tr>
            <td></td>
            <td>  <input type="reset" value="Supprimer"> </td>        
        </tr>
        <tr>
            <td></td>
            <td>  <input type="hidden" name="MAX_FILE_SIZE" value="5000000"> </td>        
        </tr>
    </table>
</form>