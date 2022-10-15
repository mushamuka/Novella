<?php
ob_start();
$l = false;
$c = false;
$m = false;
$s = false;
if ($d = $utilisateur->verifierPermissionDunePage('utilisateur',$_SESSION['ID_utilisateur'])->fetch()) 
{
    if ($d['L'] == 1) 
    {
        $l = true;
    }
    if ($d['C'] == 1) 
    {
        $c = true;
    }
    if ($d['M'] == 1) 
    {
        $m = true;
    }
    if ($d['S'] == 1) 
    {
        $s = true;
    }
}

?>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
		<div class="card">
            <div class="card-header">
                Enregistrement de la photo
            </div>
            <div class="card-body">
                <form class="form-horizontal p-t-0" enctype="multipart/form-data" action="index.php" method="POST">

                    <div class="row">
                    	<div class="col-lg-12 col-md-12">
                    		<div class="row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Entreez le nom </label>
                                <div class="form-group col-sm-9">
                 					<input type="text" class="form-control" id="nomphoto" name="nomphoto" >
                                </div>
                            </div>
                    	</div>
                    </div>
                     <div class="row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Utilisateur</label>
                                <div class="col-sm-9">   
                                    <div class="form-group">

                                    <select class="form-control custom-select" id="idutilisateur">
                                        <option value=""></option>
                                        <?php

                                        foreach ($utilisateur->afficheUser() as $value) 
                                        {
                                        ?>
                                            <option value="<?=$value->ID_utilisateur?>"><?=$value->login.'-'.$value->prenom?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>    
                                    </div>
                                </div>
                            </div>
                    <div class="row">
                    	<div class="col-lg-12 col-md-12">
                    		<div class="row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Photo </label>
                                <div class="form-group col-sm-9">
                 					<input type="file" class="form-control" id="photo" name="photo">
                                </div>
                            </div>
                    	</div>
                    </div>
                      
                	<span id="rep"></span>
              
            </div>
            <div class="card-footer text-center text-muted">

                <button class="btn btn-primary waves-effect text-left" type="submit" name="POST" id="POST"><i class="fa fa-check"></i>Enregistrer
                </button>
               
            </div>
              </form>
        </div>
	</div>
</div>

<?php
$home_content = ob_get_clean();
require_once('view/home.view.php');
?>