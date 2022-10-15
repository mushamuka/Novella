 
<?php
	require_once("../../modele/connection.php");
    require_once("../../modele/utilisateur.class.php");

   $utilisateur = new Utilisateur();
	if($utilisateur->changemp($_GET['nomss'],$_GET['nouveaupassword']) > 0)
	{
		echo "Vous venez de changer votre mot de passe avec succès";
	   
   
    }
  
     
