<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/production.class.php');

	$production = new Production();

	if ($production->suppression_production($_GET['numpro']) >0) 
	{
		require_once('repProduction.php');
		//echo "insertion reussie";
	}