<?php
require_once('modele/vendeur.class.php');
require_once('modele/utilisateur.class.php');
	
function inc_vendeur()
{
	$vendeur = new Vendeur();
	$utilisateur = new Utilisateur();
	require_once('view/vendeur/vendeur.php');
}