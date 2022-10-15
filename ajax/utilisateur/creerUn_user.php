<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/utilisateur.class.php');

	$utilisateur = new Utilisateur();
	//echo $_GET['nomuser'].'/'.$_GET['login'].'/'.$_GET['prenom'].'/'.$_GET['password'].'/'.$_GET['profil_id'].'/'.$_GET['datecreation'];

	if ($utilisateur->new_user($_GET['nomuser'],$_GET['login'],$_GET['prenom'],$_GET['password'],$_GET['profil_id'],$_GET['datecreation']) >0) 
	{
		require_once('rep_utilisateur.php');
		//echo "insertion reussie";
	}