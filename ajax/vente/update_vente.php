<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/vente.class.php');

	$vente = new Vente();
	if ($vente->updatevente($_GET['idvente'],$_GET['qtetotale'],$_GET['qtevendue'],$_GET['qteretour'],$_GET['montant'],$_GET['datevente'],$_GET['frais_divers'],$_GET['note']) >0) 
	{
		require_once('repVente.php');
		//echo "insertion reussie";
	}
	