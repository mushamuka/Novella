<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/vendeur.class.php');

	$vendeur = new Vendeur();

	if ($vendeur->creer_vendeur($_GET['nom'],$_GET['prenom'],$_GET['fone'],$_GET['adresse'],$_GET['age'],$_GET['datevenu'],$_GET['salaire'],$_GET['statut']) >0) 
	{
		require_once('repVendeur.php');
		//echo "insertion reussie";
	}