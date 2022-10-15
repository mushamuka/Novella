<?php
require_once('modele/vente.class.php');
require_once('modele/production.class.php');
require_once('modele/vendeur.class.php');
require_once('modele/achat.class.php');
require_once('modele/utilisateur.class.php');
	
function inc_vente()
{
	$vente = new Vente();
	$vendeur = new Vendeur();
	$achat = new Achat();
	$production = new Production();
	$utilisateur = new Utilisateur();
	require_once('view/vente/vente.php');
}
function vente_dujour($ventejour)
{
	$vente = new Vente();
	if ($ventejour == date("Y-m-d")) 
	{
		require_once('printing/fiches/vente_journaliere.php');
	}
	else
	{
		require_once('printing/fiches/vente_journaliere.php');
	}
	//require_once('printing/fiches/vente_journaliere.php');
}
function dette_par_agent($agent,$mois,$annee)
{
	$vente = new Vente();
	$vendeur =new Vendeur();
	//echo $agent,$mois,$annee;
	require_once('printing/fiches/Dette_mensuelle_par_agent.php');
}
function vente_mensuelle($mois,$annee)
{
	$vente = new Vente();
	$vendeur =new Vendeur();
	
	if($mois == date('m'))
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
	}
	$reponse = $vente->get_vente_mensuelle($date_debut,$date_fin);
	require_once('printing/fiches/vente_mensuelle.php');
}
