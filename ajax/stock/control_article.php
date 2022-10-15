<?php

require_once("../../modele/connection.php");
require_once("../../modele/Stock.class.php"); 

$stock = new Stock();

if ($_GET['quantite_ajoute'] < $_GET['qte_disponible_en_stcok']) 
{
	$qte_vendu=$_GET['qte_disponible_en_stcok'] - $_GET['quantite_ajoute']; 
	if ($stock->update_quantite_stock($_GET['id_article'],$_GET['quantite_ajoute'])) 
	{
		if($stock->inserer_control($_GET['id_article'],$_GET['quantite_ajoute'],$_GET['datecontrol']))
		{		
			$idcontrol = $stock->getmaxID_control()->fetch()['ID_control'];

			if ($stock->artcle_dans_control($idcontrol,$_GET['id_article'],$_GET['quantite_ajoute'],$_GET['qte_disponible_en_stcok'],$qte_vendu)) 
			{
				
			}
		}
	}
	
}
 

?>