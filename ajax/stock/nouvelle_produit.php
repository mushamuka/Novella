<?php

require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 

$stock = new Stock();


if($stock->ajouter_article($_GET['categorie_stock'],$_GET['article'],$_GET['prix_achat'],$_GET['prix_vente'],$_GET['nbrpar_casier'],$_GET['date_achat'],$_GET['seuil'],$_GET['note']) > 0)
	{
		//echo "bien";
	}
?>