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
    <div class="col-lg-12 col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div id="retour"></div>
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4>Gestion utilisateur</h4>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                            </ol>
                           
                               
                           
                                <button type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus-circle"></i>Creer utilisateur</button>
                          

                            <!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Nouvel utislisateur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal p-t-20">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Nom *</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nomuser" placeholder="nom complet">
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Login *</label>
                                <div class="col-sm-9">   
                                    <div class="form-group">
                                        <input type="text" id="login" class="form-control">   
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div><!-- End row-->
                     <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Prenom *</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="prenom" placeholder="Prenom">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Mot de passe *</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" placeholder="password">
                                </div>
                            </div>
                        </div>
                  
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Profil</label>
                                <div class="col-sm-9">   
                                    <div class="form-group">
                                      <select class="form-control custom-select" id="profil_id">
                                        <option value=""></option>
                                        <?php
                                        foreach ($utilisateur->getAllProfilUser() as $value) 
                                        {
                                        ?>
                                            <option value="<?=$value->ID_profil?>"><?=$value->nom_profil?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>       
                                    </div>
                                </div>
                            </div>
                        </div>
                           <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">date</label>
                                <div class="col-sm-9">
                                    <input type="date" value="<?=date('Y-m-d')?>" class="form-control" id="datecreation" >
                                </div>
                            </div>
                        </div>
                     
                        
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <span id="msg-add-user"></span>
                <button type="button" onclick="new_user($('#nomuser').val(),$('#login').val(),$('#prenom').val(),$('#password').val(),$('#profil_id').val(),$('#datecreation').val())" class="btn btn-success waves-effect text-left">Ajouter utulisateur
                            </button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- / .modal-->

    <a href="<?= WEBROOT;?>voir_profil" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-eye"></i> Voir profil</a>

     <a href="<?= WEBROOT;?>voir_utilisateur" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-eye"></i> Voir utilisateur</a>

    
                        </div>
                    </div>
                </div>
                <hr>
                <form class="form-horizontal" action="<?= WEBROOT?>setprofiluser" method="post" id="form-profil-user" onsubmit="setProfilUser()">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <input type="text" class="form-control" name="nom_profil" id="nom_profil" placeholder="Nom du nouveau profil">
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="background-color: #87e7e1" class="text-dark">
                                        <tr>
                                            <th>Pages</th>
                                            <th>L</th>
                                            <th>C</th>
                                            <th>M</th>
                                            <th>S</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot style="background-color: #87e7e1" class="text-dark">
                                        <tr>
                                            <th>Pages</th>
                                            <th>L</th>
                                            <th>C</th>
                                            <th>M</th>
                                            <th>S</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="reponse">
                                        <?php
                                        $page = ['achat','vente','production'/*'achatdujour','achat_mensuel','production','vente','ventejour','rapport','dette_agent','ventemensuelle'*/,'vendeur','utilisateur',/*'production_journaliere','Changer_motpasse',*/'setprofiluser','dashboard','voir_profil','voir_utilisateur','stock','dashstock','article'];
                                        $_SESSION['page'] = $page;
                                        for ($i=0; $i < count($page); $i++) 
                                        { 
                                        ?>
                                            <tr>
                                                <td><?= $page[$i]?></td>
                                                <td><input type="checkbox" name="l<?=$i?>" id="l<?=$i?>"></td>
                                                <td><input type="checkbox" name="c<?=$i?>" id="c<?=$i?>"></td>
                                                <td><input type="checkbox" name="m<?=$i?>" id="m<?=$i?>"></td>
                                                <td><input type="checkbox" name="s<?=$i?>" id="s<?=$i?>"></td>
                                                <td><label class="btn">
                                                    <input type="checkbox" id="<?=$i?>" onclick="CocherLigneEntire(this.id)"> Cochez cette ligne
                                                </label></td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 offset-5">
                           
                                <button type="submit" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Valider</button>
                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$home_content = ob_get_clean();
require_once('view/home.view.php');
?>