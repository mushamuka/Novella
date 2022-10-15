<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/production.class.php');

	$production = new Production();

	if ($production->updateproduction($_GET['refpro'],$_GET['hdebut'],$_GET['hfin'],$_GET['qteproduite'],$_GET['dateproduction']) >0) 
	{
		require_once('repProduction.php');
		//echo "insertion reussie";
	}