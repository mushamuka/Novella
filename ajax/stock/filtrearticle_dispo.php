<?php
	require_once("../../modele/connection.php");
	require_once("../../modele/stock.class.php");

	$stock = new Stock();
	$condition = $_GET['condition'];
	$WEBROOT = $_GET['WEBROOT'];
	require_once('repFiltre_article.php');

	/*$condition1 = null;
    $condition2 = null;
    $condition3 = null;
    $condition4 = null;
    $query = '';
    $url = $_GET['url'];
    $session_user = $_GET['session_user'];
    if ($_GET['idarticle'] == '') 
    {
	    $valIdclient = '';
	    $condition1 = '';
    }
    else
    {
	    $valIdclient = $_GET['idarticle'];
	    $condition1 = " article.ID='".$valIdclient."' ";
	}
	if ($_GET['categorie'] == '') 
	{
		$valsecteur = '';
		$condition2 = '';
		if ($_GET['idarticle'] != '') 
	    {
		    $condition1 = " ID='".$valIdclient."' ";
	    }
	}
	else
	{
		$valsecteur = $_GET['categorie'];
		$condition2 = " categorie.IDCAT='".$valsecteur."' ";
	}
	if ($_GET['date1'] == '') 
	{
		$valDate1 = '';
		$condition3 = '';
	}
	else
	{
		$valDate1 = $_GET['date1'];
		$condition3 = " DATECREAT='".$valDate1."' ";
	}
	if ($_GET['date2'] == '') 
	{
		$valDate2 = '';
		$condition4 = '';
	}
	else
	{
		if ($_GET['date1'] != '') 
		{
			$valDate2 = $_GET['date2'];
			$condition4 = " DATECREAT BETWEEN '".$valDate1."' AND '".$valDate2."'";
			$condition3 = '';
		}
		else $condition4 = " DATECREAT='".$_GET['date2']."' ";
	}

	$condition1 = ($condition1 == '' ? '' : 'AND' .$condition1);
	$condition2 = ($condition2 == '' ? '' : 'AND' .$condition2);
	$condition3 = ($condition3 == '' ? '' : 'AND' .$condition3);
	$condition4 = ($condition4 == '' ? '' : 'AND' .$condition4);

	//on met ensemble les condition pour pouvoir constituer une seule condition
	$condition = $condition1.$condition2.$condition3.$condition4;
	if ($_GET['categorie'] != '') 
	{
		$query = 'SELECT article.ID,ARTICLE,LIBELLE,NB_CASIER,PRIX_ACHAT,PRIX_VENTE,SEUIL,DESCRIPTION,article.DATECREAT FROM article,categorie WHERE article.IDCAT = categorie.IDCAT '.$condition;
	}
	else
	{
		$query = 'SELECT ID,ARTICLE,LIBELLE,NB_CASIER,PRIX_ACHAT,PRIX_VENTE,SEUIL,DESCRIPTION,article.DATECREAT FROM article WHERE '.substr($condition, 3);
	}
	if ($query == '') 
	{
		echo ' Un filtre efectuer';
	}
	else
	{ 
		require_once('repFiltre_article.php');
	}
	*/
	