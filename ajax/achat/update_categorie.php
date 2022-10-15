<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/achat.class.php');

	$achat = new Achat();

	if ($achat-> updatecategorie($_GET['refcat'],$_GET['refnom'],$_GET['description']) >0) 
	{
		require_once('rep_categorie.php');
		//echo "insertion reussie";
	}