<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/vente.class.php');
	require_once('../../modele/production.class.php');

	$vente = new Vente();
	$production = new Production();


//echo 'idarticle'.$_GET['produit']/*.$_GET['vendeur'].$_GET['qtetotale'].$_GET['qtevendue'].$_GET['qteretour'].$_GET['montant'].$_GET['datevente'].$_GET['frais_divers'].$_GET['note']*/.'qte'.$_GET['quantite'].'idpro=>'.$_GET['idproduction'];
	//$_GET['dette']
	$qteretour =0;

	$qteretour = $_GET['qtetotale'] - $_GET['qtevendue'];

if ($_GET['produit'] == 1) 
{
	$manquant = ($_GET['qtevendue']*200)-($_GET['frais_divers']+$_GET['montant']);
	//echo $manquant;
	if ($vente->creevente($_GET['produit'],$_GET['vendeur'],$_GET['qtetotale'],$_GET['qtevendue'],$qteretour,$_GET['montant'],$manquant,$_GET['datevente'],$_GET['frais_divers'],$_GET['note']) >0) 
	{
		if($production->diminuer_quantite_produite($_GET['idproduction'],$_GET['qtevendue']))
		{
			require_once('repVente.php');
		}
		
	}

}
elseif ($_GET['produit'] == 2) 
{
	//$manquant = ($_GET['frais_divers']+$_GET['montant'])-($_GET['qtevendue']*300);
	$manquant = ($_GET['qtevendue']*300)-($_GET['frais_divers']+$_GET['montant']);
	//echo $manquant;
	if ($vente->creevente($_GET['produit'],$_GET['vendeur'],$_GET['qtetotale'],$_GET['qtevendue'],$qteretour,$_GET['montant'],$manquant,$_GET['datevente'],$_GET['frais_divers'],$_GET['note']) >0) 
	{
		if($production->diminuer_quantite_produite($_GET['idproduction'],$_GET['qtevendue']))
		{
			require_once('repVente.php');
		}
	}

}
	