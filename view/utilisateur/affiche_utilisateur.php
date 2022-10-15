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
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h6>Liste des utilisateurs</h6>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="<?=WEBROOT?>utilisateur">Retour</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <hr>
                <form class="form-horizontal" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            
                                            <th>Login</th>
                                            <th>Profil</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                          
                                            <th>Login</th>
                                            <th>Profil</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="reponse">
                    <?php $i =0;
                    foreach ($utilisateur->affiche_user_avec_profil() as $value) 
                        {
                            $i++;?>
                            <tr>
                       <td><?php echo $value->nom_utilisateur?></td>
                       <td><?php echo $value->prenom?></td>
                       
                       <td><?php echo $value->login?></td>
                       <td><?php echo $value->nom_profil?></td>
                       <td class="text-nowrap">
                    <?php
                    if ($m) 
                    {?>
                        <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lgs<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                    <?php
                    }
                    ?>
                <!-- sample modal content -->
                <div class="modal fade bs-example-modal-lgs<?= $i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lgs">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Changer le profil d'un utilisateur</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                        <div class="modal-body">
                            <form class="form-horizontal p-t-20">
                <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Profil</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="iduser<?= $i?>" value="<?php echo $value->ID_user?>"hidden>
                            <select  id="profil_id<?= $i?>" class="form-control">    
                                <?php foreach ($utilisateur->getAllProfilUser() as  $value2)
                                {
                                ?>
                                    <option value="<?=$value2->ID_profil?>"><?php echo $value2->nom_profil?></option>
                                <?php   
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
                </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" onclick="update_profil($('#iduser<?=$i?>').val(),$('#profil_id<?=$i?>').val())" data-dismiss="modal">changer le profil
                            </button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <?php
                if ($m) 
                {?>
                    <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-sm<?=$i?>" data-original-title="Supprimer"> <i class="ti-trash text-inverse m-r-10"></i> </a>
                <?php
                }
                ?>

                <!-- sample modal content -->
                <div class="modal fade bs-example-modal-sm<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="mySmallModalLabel">Supprimer cet utilisateur</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body"> 
                                <input type="text" class="form-control" id="iduser_delete<?=$i?>" value="<?=$value->ID_user?>" hidden>
                                Voulez-vous supprimer ce utilisateur?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" onclick="deletecet_utilisateur($('#iduser_delete<?= $i?>').val())" data-dismiss="modal"><i class="mdi mdi-delete-forever"></i></button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
        </td>
                                   
                                    </tr>
                                     <?php
                                }
                                ?>
                                    </tbody>
                                </table>
                            </div>
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