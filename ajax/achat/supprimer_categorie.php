	<?php
	require_once('../../modele/connection.php');
	require_once('../../modele/achat.class.php');

	$achat = new Achat();

	if ($achat->suppression_categorie($_GET['numcat']) >0) 
	{
		require_once('rep_categorie.php');
		//echo "insertion reussie";
	}
	?>