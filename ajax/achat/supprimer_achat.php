<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/achat.class.php');

	$achat = new Achat();

	if ($achat->suppression_achat($_GET['numachat']) >0) 
	{
		require_once('repAchat.php');
		//echo "insertion reussie";
	}