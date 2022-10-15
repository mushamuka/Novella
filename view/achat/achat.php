<?php
ob_start();
date('Y-m-d');

$l = false;
$c = false;
$m = false;
$s = false;
if ($d = $utilisateur->verifierPermissionDunePage('achat',$_SESSION['ID_utilisateur'])->fetch()) 
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
            </div>
         <div class="col-md-7 align-self-center">
            <div class="d-flex justify-content-end align-items-center">
                 <button type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus-circle" class="modal fade" tabindex="-1" role="dialog"></i>Nouveau achat</button>
               <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title" id="myLargeModalLabel">Nouveau achat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                <div class="modal-body">
                    <form class="form-horizontal p-t-20" >
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Nom article*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                    <select class="form-control"id="article">
                                                        <?php
                                                        $i =0;
                                                        foreach ($achat->getCategorie_achat() as $value) 
                                                            {$i++;
                                                                ?>
                                                            <option value="<?php echo $value->ID_categorie_achat?>"><?php echo $value->nom?></option>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Quantite</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                    <input type="number" class="form-control"  id="quantite">
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- END ROW-->
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Prix d'achat</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                  <input type="number" class="form-control" id="prix_achat">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Date achat</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                   <input type="date" class="form-control" class="form-control" value="<?=date('Y-m-d')?>" id="date_achat">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                      
                            </form>
                </div>
                 <div class="modal-footer">
                            <span id="msg"></span>
                            <button class="btn btn-success waves-effect text-left" onclick="enregistreAchat($('#article').val(),$('#quantite').val(),$('#prix_achat').val(),$('#date_achat').val())" data-dismiss="modal"><i class="fa fa-check"></i>Enregistrer
                            </button>
                            <button type="button" class="btn btn-primary waves-effect text-left" data-dismiss="modal"><i class="mdi mdi-close-circle-outline" ></i>Fermer</button>
                        </div>
            </div>
        </div>
    </div>

        <button type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lgs-ancien"><i class="fa fa-plus-circle"></i> categorie d'article</button>
          <!--sample modal content -->
<div class="modal fade bs-example-modal-lgs-ancien" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lgs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Ajouter categorie d'article</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                 <form class="form-horizontal p-t-20" name="formaddClient">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">Nom de l'article*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <input type="text" class="form-control"  id="categorie_achat">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">Description*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <input type="text" class="form-control" id="description">
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </form>
            </div>
            <div class="modal-footer">
                <span id="msg"></span>
                <button class="btn btn-success waves-effect text-left" onclick="ajoutCategorie($('#categorie_achat').val(),$('#description').val())" data-dismiss="modal"><i class="fa fa-check"></i>Enregistrer
                    </button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="mdi mdi-close-circle-outline" ></i>Fermer</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<a href="<?= WEBROOT;?>categorie" class="btn btn-primary d-none d-lg-block m-l-15"><i class="fa fa-file"></i> modifier et supprimer categorie</a>
 <!-- sample modal content -->
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mySmallModalLabel">Choisir la date du jour</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form class="form-horizontal p-t-20" id="print_rapport_du_jour" method="post" action="<?=WEBROOT;?>achatdujour">
                        <div class="modal-body">
                             <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">Date achat</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <input type="date" class="form-control" value="<?=date('Y-m-d')?>" name="jourachat_selectionne"  id="jourachat_selectionne">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                <button class="btn btn-success waves-effect text-left" onclick="achatdujour($('#jourachat_selectionne').val())" data-dismiss="modal"><i class="fa fa-check"></i>Enregistrer
                    </button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal" ><i class="mdi mdi-close-circle-outline" ></i>Fermer</button>
            </div>
        </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
           
     <button type="button" class="btn btn-primary d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus-circle"></i>Rapport journalier</button>
                          
                        

    <button type="button" class="btn btn-primary d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lgs"><i class="fa fa-plus-circle"></i>Rapport mensuel</button>
                
    <div class="modal fade bs-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lgs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Generer rapport d'achat mensuel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                     <form class="form-horizontal p-t-20" id="printRapport_mensuel" method="post" action="<?=WEBROOT;?>achat_mensuel">
                    <div class="row">
                       
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Mois</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <select class="form-control" name="mois" id="mois">
                                            <option value="1">Janvier</option>
                                            <option value="2">Fevrier</option>
                                            <option value="3">Mars</option>
                                            <option value="4">Avril</option>
                                            <option value="5">Mai</option>
                                            <option value="6">Juin</option>
                                            <option value="7">Juillet</option>
                                            <option value="8">Aout</option>
                                            <option value="9">Septembre</option>
                                            <option value="10">Octobre</option>
                                            <option value="11">Novembre</option>
                                            <option value="12">Decembre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Année </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <input type="text" data-mask="9999" class="form-control" name="annee" id="annee" value="<?php echo date('Y')?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <div class="modal-footer">
                <button type="button"  onclick="production_mensuelle($('#nombanque_versement').val(),$('#annee').val(),$('#mois').val())"  class="btn btn-success waves-effect text-left">Generer rapport
                </button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
        </div>
        <div class="row">
    <div class="col-lg-12 col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                
                <input type="text" id="page" value="paiement" hidden="">
        <div class="table-responsive m-t-0">
            <!--table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%"-->
               <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Date d'achat</th>
                                <th>Nom de l'article</th>
                                <th>Quantite entre</th>
                                <th>Prix d'achat</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Date d'achat</th>
                                <th>Nom de l'article</th>
                                <th>Quantite entre</th>
                                <th>Prix d'achat</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody id="rep">
                            <?php 
                            $i = 0;
                            foreach($achat->getAchats() as $value)
                            {
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $value->date_achat?></td>
                                <td><?php echo $value->nom?></td>
                                <td><?php echo $value->quantite?></td>
                                <td><?php echo $value->prix?></td>
                                <td class="text-nowrap">
                    <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                <!-- sample modal content -->
                <div class="modal fade bs-example-modal-lg<?= $i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Modifier cet achat</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                               <form class="form-horizontal p-t-20">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Prix</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                    <input type="text" id="refchat<?=$i?>" class="form-control" value="<?php echo $value->ID_achat?>"hidden>
                                                    <input type="text" id="refprix<?=$i?>" class="form-control" value="<?php echo $value->prix?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Quantite</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                    <input type="number" id="quantite<?=$i?>" value="<?php echo $value->quantite?>" class="form-control" >
                                                     <input type="text" id="idstockmarketing<?=$i?>" value="<?php echo $value->ID_stock?>" class="form-control" hidden>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div><!-- END ROW-->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" onclick="updateachat($('#refchat<?=$i?>').val(),$('#refprix<?=$i?>').val(),$('#quantite<?=$i?>').val())" data-dismiss="modal">Modifier
                            </button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-sm<?=$i?>" data-original-title="Supprimer"> <i class="ti-trash text-inverse m-r-10"></i> </a>

            <!-- sample modal content -->
            <div class="modal fade bs-example-modal-sm<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mySmallModalLabel">Supprimer cet achat</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body"> 
                            <input type="text" class="form-control" id="numachat<?= $i?>" value="<?php echo $value->ID_achat?>" hidden>
                            Voulez-vous supprimer cet achat ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" onclick="suppression_achat($('#numachat<?= $i?>').val())" data-dismiss="modal"><i class="mdi mdi-delete-forever"></i></button>
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
                           <!-- php   END FOREACH-->
                        </tbody>
                    </table>
        </div>
    </div>
</div>
</div>
</div>

<?php
$home_content = ob_get_clean();
require_once('view/home.view.php');
?>