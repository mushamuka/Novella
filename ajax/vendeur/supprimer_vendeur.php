<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/vendeur.class.php');

	$vendeur = new Vendeur();

	if ($vendeur->suppression_vendeur($_GET['refevendeur']) >0) 
	{
		require_once('repVendeur.php');
		//echo "insertion reussie";
	}