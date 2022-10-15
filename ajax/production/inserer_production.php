<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/production.class.php');

	$production = new Production();

$res = $production->cree_production($_GET['categorie'],$_GET['heuredebut'],$_GET['heurefin'],$_GET['qteproduite'],$_GET['dateproduction']);


if ($res == 'duplicate') 
{ 
	if($production->augmenter_quantite_produite($_GET['categorie'],$_GET['qteproduite']) > 0)
	{
		if ($production->Ajouter_historique_production($_GET['categorie'],$_GET['heuredebut'],$_GET['heurefin'],$_GET['qteproduite'],$_GET['dateproduction'])) 
		{
			require_once('repProduction.php');
		}
	}
}
else
{
	if ($production->Ajouter_historique_production($_GET['categorie'],$_GET['heuredebut'],$_GET['heurefin'],$_GET['qteproduite'],$_GET['dateproduction'])) 
	{
		require_once('repProduction.php');
	}
}
