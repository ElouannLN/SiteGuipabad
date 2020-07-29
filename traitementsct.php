<?php
  include("include/connexion.php");

  $nomSection = $_POST["nomSection"];
  $cnx->query("INSERT INTO section (nom_section) values ( '". $nomSection ."' )");
?>
