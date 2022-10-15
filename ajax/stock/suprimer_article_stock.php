<?php
require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 

$stock = new Stock(); 
//echo $_GET['id_histock'];
if ($stock->supprimer_historique_stock($_GET['id_histock'])) 
{
	require_once('reponse_articleddans_stock.php'); 
}

?>