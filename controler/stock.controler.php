<?php

require_once('modele/achat.class.php');

require_once("modele/utilisateur.class.php"); 

require_once("modele/stock.class.php");

require_once('modele/production.class.php');
require_once('modele/vente.class.php');
require_once('modele/vendeur.class.php');

function inc_cree_article()
{
	$stock = new Stock();
	$utilisateur = new Utilisateur();
	$vente = new Vente();
	$production = new Production();
	$vendeur =new Vendeur();

	require_once('view/stock/nos_articles.php');
}
function aliment()
{
	$stock = new Stock();
	$utilisateur = new Utilisateur();
	require_once('view/stock/aliment.php');
}

function nouveau_stock()
{
	$utilisateur = new Utilisateur();	
	$stock = new Stock();
	require_once('view/stock/entreStock.php');
}
function etat_stock()
{
	$stock = new Stock();
	$utilisateur = new Utilisateur();
	require_once('view/stock/synthese_dash.php');
}
function voir_ancien_control()
{
	$stock = new Stock();
	$utilisateur = new Utilisateur();
	require_once('view/stock/ancien_control.php');
}
function imprimer_rapport($cond)
{
	$stock = new Stock();
	$utilisateur = new Utilisateur();
	require_once 'printing/fiches/printFiltrerapportArticle.php';
}
function generer_pdf($idarticle)
{
	$stock = new Stock();
	$utilisateur = new Utilisateur();
	require_once 'printing/fiches/printarticle.php';
}
function pint_Rapport_stock($cond)
{
	$stock = new Stock();
	$utilisateur = new Utilisateur();
	require_once 'printing/fiches/printFiltre_stock.php';
}
function print_article_stock_minimal()
{
	$stock = new Stock();
	$utilisateur = new Utilisateur();
	require_once 'printing/fiches/printArticle_enSeuil_minimal.php';
}
function print_controlpasse($cond)
{
	$stock =new Stock();
	$utilisateur = new Utilisateur();
	require_once 'printing/fiches/printControl_precedent.php';
}
function inclure_toutControl($idcontrol)
{
	$stock =new Stock();
	$utilisateur = new Utilisateur();
	require_once('view/stock/detail_control.php');
}
function imprimer_rapport_control($idcat)
{
	$stock =new Stock();
	$utilisateur = new Utilisateur();
	require_once 'printing/fiches/imprimer_rapport_control.php'; 
}
function imprimer_detail_control($idcontrol)
{
	$stock =new Stock();
	$utilisateur = new Utilisateur();
	$recuper_data = array();
	foreach ($stock->detail_pour_chaque_ArticleContol($idcontrol) as $valeur ) 
	{
		$libelle = $valeur->LIBELLE;
		$date_control = $valeur->date_control;
		$recuper_data[] = $valeur;
	}
	//echo "Bonjour  ".$libelle,$date_control ; die();
	require_once 'printing/fiches/pdf_rapport_detaller.php'; 
}