<?php
	require_once("../../modele/connection.php");
require_once("../../modele/utilisateur.class.php");

$utilisateur = new Utilisateur();

	if ($utilisateur->updateproduction($_GET['refpro'],$_GET['hdebut'],$_GET['hfin'],$_GET['qteproduite'],$_GET['dateproduction']) >0) 
	{
		require_once('repProduction.php');
		//echo "insertion reussie";
	}