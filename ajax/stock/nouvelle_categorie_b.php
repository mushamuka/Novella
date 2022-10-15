<?php

require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 

$stock = new Stock();

if($stock->ajouter_categorie($_GET['libelle'],$_GET['datecreation']) > 0)
	{
		
	}
?>