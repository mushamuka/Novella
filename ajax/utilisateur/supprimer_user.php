<?php
	require_once("../../modele/connection.php");
require_once("../../modele/utilisateur.class.php");

$utilisateur = new Utilisateur();

	if ($utilisateur->suppression_production($_GET['numpro']) >0) 
	{
		require_once('repProduction.php');
		//echo "insertion reussie";
	}