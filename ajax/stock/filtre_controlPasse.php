<?php
	require_once("../../modele/connection.php");
	require_once("../../modele/stock.class.php");

	$stock = new Stock();
	$condition = $_GET['condition'];
	$WEBROOT = $_GET['WEBROOT'];
	require_once('repFiltre_controlPasse.php');

	?>