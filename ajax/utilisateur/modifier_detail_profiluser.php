 
<?php
	require_once("../../modele/connection.php");
	require_once("../../modele/utilisateur.class.php");

		$utilisateur = new Utilisateur();
		
	if($utilisateur->modif_detailprofil($_GET['identifiant'],$_GET['nomuser'],$_GET['prenomuser'],$_GET['loginuser']) > 0)
	{?>
	     <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <h3 class="text-success"><i class="fa fa-check-circle"></i> Vous venez</h3> de modifier votre détails profil avec succès
        </div>
    <?php
   
    }
  
     