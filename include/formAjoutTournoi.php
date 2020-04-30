<form enctype="multipart/form-data" action="gestionTournoi.php" method="POST" class="formAjouterTournoi" >
  <table>
    <tr>
      <td><label for="tournoi">Nom du tournoi :</label></td>
      <td><input type="text" id="tournoi" name="ajouterTournoi" required value="La Revanche"></td>
    </tr>
    <tr>
      <td><label for="club">Nom du club</label></td>
      <td><input type="text" id="club" name="club" value="Guipabad"></td>
    </tr>
    <tr>
      <td><label for="categorie">Catégorie :</label></td>
      <td>
        <select name="categorie" id="categorie">
          <option value="0">Jeune</option>
          <option value="1">Adulte</option>
        </select>
        </td>
    </tr>
    <tr>
      <td><label for="date">Date :</label></td>
      <td><input type="date" id="date" name="date" required></td>
    </tr>
    <tr>
      <td><label for="adresse">Adresse :</label></td>
      <td><input type="text" id="adresse" name="adresse"></td>
    </tr>
    <tr>
      <td><label for="cout">Coût d'inscription :</label></td>
      <td><input type="number" id="cout" name="cout"></td>
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