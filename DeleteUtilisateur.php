<?php
include '../Controller/Utilisateur.php';
$Utilisateur = new Utilisateur();
$Utilisateur->deleteUtilisateur($_GET["ID"]);
header('Location:ListUtilisateur.php');
?>