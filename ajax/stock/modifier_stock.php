<?php
require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 

$stock = new Stock();


if($stock->update_stock($_GET['ref'],$_GET['quantite_b'],$_GET['note'],$_GET['date_stock']) > 0)
	{
		require_once('reponse_articleddans_stock.php');
	}
?>