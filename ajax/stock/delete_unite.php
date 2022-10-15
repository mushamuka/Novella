<?php

require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 

$stock = new Stock();

if($stock->supprimer_unite($_GET['id_unite']) > 0)
	{
		require_once('reponse_unite.php');
	}
?>