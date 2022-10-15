<?php
require_once('modele/production.class.php');
require_once('modele/vente.class.php');
require_once('modele/vendeur.class.php');
require_once('modele/achat.class.php');
require_once('modele/utilisateur.class.php'); 
	
function inc_utilisateur()
{   
	$utilisateur = new Utilisateur();
	$achat = new Achat();
	$vente = new Vente();
	$production = new Production();
	$vendeur =new Vendeur();
	require_once('view/utilisateur/utilisateur.php');
}

function monprofil()
{
	$utilisateur = new Utilisateur();
	require_once('view/utilisateur/mon_profil.php');
}
function afficherMessage($message,$url)
{
	$utilisateur = new Utilisateur();
	require_once $url;
}
function Changer_motpasse()
{
	$utilisateur = new Utilisateur();
	require_once('view/utilisateur/update_mot_passe.php');
}
function setProfilUser($nom_profil,$page,$l,$c,$m,$s,$i,$page_accept,$nb)
{
	$utilisateur = new Utilisateur();

	$res = $utilisateur->setProfil_user($nom_profil);
	if ($res[1] == 1062) 
	{
		$profil = $utilisateur->getMaxProfilIdUser()->fetch();
		if ($utilisateur->setProfil_user_permession($profil['ID_profil'],$page,$l,$c,$m,$s,$page_accept))
		{
			if ($i == $nb - 1) 
			{
				$msg = 'Le profil :'.$profile_name.' cree avec succes';
				header('location:utilisateur');
			}
		}
	}
	else
	{
		$profil = $utilisateur->getMaxProfilIdUser()->fetch();
		if ($utilisateur->setProfil_user_permession($profil['ID_profil'],$page,$l,$c,$m,$s,$page_accept))
		{
			if ($i == $nb - 1) 
			{
				$msg = 'Le profil :'.$profile_name.' cree avec succes';
				header('location:utilisateur');
			}
		}
	}
}
function voir_profil()
{
	$utilisateur = new Utilisateur();

	require_once('view/utilisateur/affiche_profil.php');
}
function modification()
{
	$utilisateur = new Utilisateur();

	require_once('view/utilisateur/modification_suppression_profil.php');
}
function voir_utilisateur()
{
	$utilisateur = new Utilisateur();

	require_once('view/utilisateur/affiche_utilisateur.php');
}
function gestion_dashboard()
{
	$utilisateur = new Utilisateur();
	require_once 'view/utilisateur/gestion_dashboard.php';
}
function creerphoto_profil($idutilisateur,$fileTmpName,$uploadPath,$fileName)
{
	
	$utilisateur = new Utilisateur();
	//echo "Bonjour".$idutilisateur.$nomphoto.$fileTmpName.$uploadPath.$fileName;
	//$iduser = preg_split("#[-]+#", $idutilisateur);
	 
    //$idutilisateur[0];

	$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
	if ($didUpload) 
	{
		
		$photo = basename($fileName);
		//echo "idutilisateur : ".$idutilisateur." nom :".$nom." fichier : ".$fichier;
		if ($utilisateur->modifierphotoprofil($idutilisateur,$photo))
		{
			//echo 'upload reussie';
			$utilisateur = new Utilisateur();
			//$msg = "La creation reussie";
			header("location:monprofil-".$_SESSION['ID_user']);
			//require_once('vue/admin/utilisateur/mon_profil.php');
		}
	}
	else
	{	$utilisateur = new Utilisateur();
		$message = "La photo ".basename($fileName)." n'est pas chargé";
		require_once('view/utilisateur/mon_profil.php');
	}
}