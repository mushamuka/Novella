<?php
require_once('modele/achat.class.php');
require_once('modele/vendeur.class.php');
require_once('modele/production.class.php');
require_once('modele/utilisateur.class.php');
	
function inc_achat()
{	
	$achat = new Achat();
	$utilisateur = new Utilisateur();
	$vendeur =new Vendeur();
	require_once('view/achat/achat.php');
}
function modifiercategorie()
{
	$achat = new Achat();
	require_once('view/achat/categorie_achat.php');

}

function achat_par_jour($jourachat_selectionne)
{
	$achat = new Achat();
	if ($jourachat_selectionne == date('Y-m-d')) 
	{
		require_once('printing/fiches/achat_journalier.php');

	}
	else
		//echo "vous n'avez pas reccuperez la date";
	//$production = new Production();
	require_once('printing/fiches/achat_journalier.php');
}
function achat_mensuel($mois,$annee)
{
	$achat = new Achat();
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
	$res = $achat->get_achatdu_mois($date_debut,$date_fin);
	require_once('printing/fiches/achat_mensuel.php');
}
?>