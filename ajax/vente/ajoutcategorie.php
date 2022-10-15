<?php 
    require_once('../../modele/connection.php');
	require_once('../../modele/production.class.php');

	$production = new Production();
	

	if ($production->newcategoriePro($_GET['catgopro'],$_GET['des_catego']) >0) 
	{
		//echo "insertion reussie";
	}