<?php 
    require_once('../../modele/connection.php');
	require_once('../../modele/production.class.php');

	$production = new Production();
	

	if ($production->newcategorieProduit($_GET['catgopro'],$_GET['des_catego'],$_GET['prixproduit']) >0) 
	{
		//echo "insertion reussie";
	}