<?php

require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 

$stock = new Stock();

$rultat = $stock->creation_stock($_GET['id_article'],$_GET['quantite'],$_GET['note'],$_GET['datestock']);
if ($rultat != "duplicate") 
{														
		if ($stock->inserer_historisque_stock($_GET['id_article'],$_GET['quantite'],$_GET['note'],$_GET['datestock'])) 
		{
			 require_once('reponse_articleddans_stock.php');
		}
	
}
else
{
	 if ($stock->agmente_quantite($_GET['id_article'],$_GET['quantite'])) 
		  {								
  	
		
			if ($stock->inserer_historisque_stock($_GET['id_article'],$_GET['quantite'],$_GET['note'],$_GET['datestock'])) 
			{
				 require_once('reponse_articleddans_stock.php');
			}
		   
		
		  }
}
 

?>