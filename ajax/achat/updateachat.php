<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/achat.class.php');

	$achat = new Achat();

	if ($achat->updateachat($_GET['refchat'],$_GET['refprix'],$_GET['quantite']) >0) 
	{
		require_once('repAchat.php');
		//echo "insertion reussie";
	}