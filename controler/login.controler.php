<?php
require_once('modele/connection.php');
require_once('modele/utilisateur.class.php');

function login()
{
	
	require_once('view/login.php');
}
function traiterLogin($login,$password)
{
	$utilisateur = new Utilisateur();
	
	if ($data = $utilisateur->recupererUnUser($login,$password)->fetch()) 
	{
		$_SESSION['ID_utilisateur'] = $data['ID_utilisateur'];
		$_SESSION['nom_utilisateur'] = $data['nom_utilisateur'];
		//$_SESSION['dashboardInclude'] = $data['page'];
		//header('location:ok');
		header('location:dashboard');
		//$_SESSION['role'] = 'admin';
		/*if ($_SESSION['role'] == 'admin') 
		{
			header('location:dashboard');
		}
		elseif ($_SESSION['role'] == 'commercial') 
		{
			header('location:commercial');
		}*/
	}
	else login();
}


function inc_homeAdmin()
{
	$utilisateur = new Utilisateur();
	require_once('view/home.view.php');
}

function deconnexion()
	{
		session_destroy();
		login();
		//in_login();
	}
?>