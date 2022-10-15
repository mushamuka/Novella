<?php
	require_once("../../modele/connection.php");
	require_once("../../modele/vente.class.php");

	$vente = new Vente();
	$condition = $_GET['condition'];
	$WEBROOT = $_GET['WEBROOT'];
	require_once('rep_filtre_vente.php');

	?>