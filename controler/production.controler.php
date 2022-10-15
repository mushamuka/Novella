<?php
require_once('modele/connection.php');
require_once('modele/production.class.php');
require_once('modele/vente.class.php');
require_once('modele/vendeur.class.php');
require_once('modele/utilisateur.class.php');


	
function inc_production() 
{	$utilisateur = new Utilisateur();
	$vente = new Vente();
	$production = new Production();
	$vendeur =new Vendeur();
	require_once('view/production/production.php');
}

function production_journaliere($jourproduction)
{
	$production = new Production();
	
	if ($jourproduction == date('Y-m-d')) 
	{
		require_once('printing/fiches/production_journaliere.php');
	}
	else
	{
		require_once('printing/fiches/production_journaliere.php');
	}
	
	
}

/*function production_journaliere()
{
	$production = new Production();
	require_once('printing/fiches/production_journaliere.php');
}*/
function production_mensuelle($mois,$annee)
{
	$production = new Production();
	if ($mois == date('m')) 
	{
		$date_debut = $annee.'/'.$mois.'/1';
		$dernierJour = date('d');
		$date_fin = $annee.'/'.$mois.'/'.$dernierJour;
	}
	else
	{
		$nombre_jour = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
		$date_debut = $annee.'/'.$mois.'/1';
		$date_fin = $annee.'/'.$mois.'/'.$nombre_jour;
		//echo $date_debut.' '.$date_fin;
	}
	$res = $production->affichage_production_Mensuelle($date_debut,$date_fin);
	require_once('printing/fiches/rapportProduction_mensuelle.php');
}