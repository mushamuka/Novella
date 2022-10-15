<?php

function getconnection()
{
	try{

		$bdd= new PDO('mysql:host=localhost;dbname=novella',"root","");
		return $bdd;
	}
	catch(Exception $e)
	{
		echo 'erreur trouver '.$e->getMessage();
	}
}