<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/vendeur.class.php');

	$vendeur = new Vendeur();
	if ($vendeur->updatevendeur($_GET['idvendeur'],$_GET['nom'],$_GET['prenom'],$_GET['fone'],$_GET['adresse'],$_GET['age'],$_GET['datevenu'],$_GET['salaire']) >0) 
	{
		require_once('repVendeur.php');
		//echo "insertion reussie";
	}