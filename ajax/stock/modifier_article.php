<?php

require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 

$stock = new Stock();


if($stock->update_article($_GET['numarticle'],$_GET['articles'],$_GET['pa_unitaire'],$_GET['pv_unitaire'],$_GET['nb_casier'],$_GET['seuil'],$_GET['note'],$_GET['date_article']) > 0)
	{
		require_once('reponse_boisson.php');
	}
?>