<?php

require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 

$stock = new Stock();

if($stock->ajouter_unite($_GET['unite'],$_GET['note'],$_GET['dateajout']) > 0)
	{
		require_once('reponse_unite.php');
	}
?>