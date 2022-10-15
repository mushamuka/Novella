<?php

require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 
$stock = new Stock();
if($stock->delete_article($_GET['ref_boisson']) > 0)
	{
		require_once('reponse_boisson.php');
	}
?>