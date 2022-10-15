<?php
require_once("../../modele/connection.php");
require_once("../../modele/utilisateur.class.php");

$utilisateur = new Utilisateur();

//$idUser = preg_split("#[-]+#", $_GET['idUser']);

if ($utilisateur->supprimeprofil($_GET['numprof'])) 
{
	require_once('repoMprofil.php');
}
?>


