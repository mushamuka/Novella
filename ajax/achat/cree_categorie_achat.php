<?php 
    require_once('../../modele/connection.php');
	require_once('../../modele/achat.class.php');

	$achat = new Achat();

	if ($achat->ajoutCategorie($_GET['categorie_achat'],$_GET['description']) >0) 
	{
		//echo "insertion reussie";
	}