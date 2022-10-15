 
<?php
	require_once("../../modele/connection.php");
	require_once("../../modele/utilisateur.class.php");

	$utilisateur = new Utilisateur();

	if($utilisateur->update_profil($_GET['iduser'],$_GET['profil_id']) > 0)
	{
	    require_once('repprofil.php');
	}
