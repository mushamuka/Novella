<?php 
    require_once("../../modele/connection.php");
require_once("../../modele/utilisateur.class.php");

$utilisateur = new Utilisateur();
	

	if ($production->newcategoriePro($_GET['catgopro'],$_GET['des_catego']) >0) 
	{
		//echo "insertion reussie";
	}