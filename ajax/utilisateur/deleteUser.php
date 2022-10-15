 
<?php
	require_once("../../modele/connection.php");
    require_once("../../modele/utilisateur.class.php");

$utilisateur = new Utilisateur();

	if($utilisateur->deleteUser($_GET['iduser']) > 0)
	{
	    require_once('rep.php');
	}

     