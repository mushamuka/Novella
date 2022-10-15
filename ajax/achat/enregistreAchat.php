<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/achat.class.php');

	$achat = new Achat();

	if ($achat->enregistreAchat($_GET['article'],$_GET['quantite'],$_GET['prix_achat'],$_GET['date_achat']) >0) 
	{
		require_once('repAchat.php');
		//echo "insertion reussie";
	}