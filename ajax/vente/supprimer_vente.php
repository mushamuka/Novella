<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/vente.class.php');

	$vente = new Vente();

	if ($vente->suppression_vente($_GET['numvente']) >0) 
	{
		require_once('repVente.php');
		//echo "insertion reussie";
	}