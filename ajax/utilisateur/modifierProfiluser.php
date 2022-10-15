<?php

require_once("../../modele/connection.php");
require_once("../../modele/utilisateur.class.php");

$utilisateur = new Utilisateur();

if ($utilisateur->modifier_profil($_GET['idprof'],$_GET['nomprofil']))  
{
	require_once('repoMprofil.php');
}
?>
