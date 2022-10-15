<?php

require_once('modele/vente.class.php'); 
require_once('modele/production.class.php');
require_once('modele/achat.class.php'); 
require_once('modele/vendeur.class.php');

require_once('modele/utilisateur.class.php');



function inc_dashboard() 
{
	$production = new Production();
	$vente = new Vente();
	$achat = new Achat();
	$vendeur =new Vendeur();
	$utilisateur = new Utilisateur();

	 // DONNEE PRODUCTION 
	$data_production = array();
	$query_local = $production->rapport_production();
	foreach ($query_local as $value) 
	{
		$data_production[] = array(
		'label'  =>$value->nom_categorie,
		'value'  => $value->nb
		);
	}
	
	$data_production = json_encode($data_production);

	// DONNEE PRODUCTION 

	$data_vente =array();
	$query_local = $vente->rapport_vente();

	foreach ($query_local as $value) 
	{
		$data_vente[] = array('label'  =>$value->nom_categorie,'label'  =>$value->quantite_totale,'label' =>$value->quantite_vendue,'label' => $value->quantite_retour,'label' => $value->manquant,'label' =>$value->montant);
	}

	$data_vente = json_encode($data_vente);

	require_once 'view/dashboard/dashboard.php';
}
	
	