<?php
ob_start();
$l = false;
$c = false;
$m = false;
$s = false;
if ($d = $utilisateur->verifierPermissionDunePage('production',$_SESSION['ID_utilisateur'])->fetch()) 
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
                 <button type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus-circle" class="modal fade" tabindex="-1" role="dialog"></i>Nouvelle production</button>
               <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title" id="myLargeModalLabel">Nouvelle production</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                <div class="modal-body">
                   <form class="form-horizontal p-t-20" name="formaddClient">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Categorie</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                    <select class="form-control"id="categorie">
                                                        <?php
                                                        $i =0;
                                                        foreach ($production->getcategorie_production() as $value) 
                                                            {$i++;
                                                                ?>
                                                            <option value="<?php echo $value->ID_categorieP?>"><?php echo $value->nom_categorie?></option>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                                    </select>

                                                    <!--input type="text" class="form-control" name="nom_cours" id="nom_cours"-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Heure debut</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                    

                                                   <input class="form-control" type="time" id="heuredebut" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- END ROW-->
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Heure fin</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                   <!--<input type="text" class="form-control" id="heurefin">-->
                                                   <input class="form-control" type="time"  id="heurefin" >
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
                                                   <input type="number" class="form-control"  id="qteproduite">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Date production*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                   <input type="date" class="form-control" value="<?=date('Y-m-d')?>" id="dateproduction">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                           
                            </form>
                </div>
                <div class="modal-footer">
                            <span id="msg"></span>
                            <button class="btn btn-success waves-effect text-left" onclick="cree_production($('#categorie').val(),$('#heuredebut').val(),$('#heurefin').val(),$('#qteproduite').val(),$('#dateproduction').val())" data-dismiss="modal"><i class="fa fa-check"></i>Enregistrer
                            </button>
                            <button type="button" class="btn btn-primary waves-effect text-left" data-dismiss="modal"><i class="mdi mdi-close-circle-outline" ></i>Fermer</button>
                        </div>
            </div>
        </div>
    </div>

        <button type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lgs-ancien"><i class="fa fa-plus-circle"></i> Ajouter produit</button>
          <!--sample modal content -->
<div class="modal fade bs-example-modal-lgs-ancien" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lgs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Ajouter categorie production</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal p-t-20" name="formaddClient">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">Nom de la categorie*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <input type="text" class="form-control"  id="catgopro">
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
                                        <div class="input-group-prepend"></div>
                                        <input type="text" class="form-control" id="des_catego" placeholder="note">
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Prix *</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                   <input type="text" class="form-control"  id="prixproduit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                           
                </form>
            </div>
            <div class="modal-footer">
                <span id="msg"></span>
                <button class="btn btn-success waves-effect text-left" onclick="newcategoriePro($('#catgopro').val(),$('#des_catego').val(),$('#prixproduit').val())" data-dismiss="modal"><i class="fa fa-check"></i>Enregistrer
                    </button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="mdi mdi-close-circle-outline" ></i>Fermer</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--a href="<= WEBROOT;?>production_journaliere" class="btn btn-primary d-none d-lg-block m-l-15"><i class="fa fa-file"></i> Rapport production journalier</a-->

 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mySmallModalLabel">Choisir la date du jour</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form class="form-horizontal p-t-20" id="produitjour" method="post" action="<?=WEBROOT;?>production_journaliere">
                        <div class="modal-body">
                             <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">Date production</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <input type="date" class="form-control" value="<?=date('Y-m-d')?>" name="jourproduction"  id="jourproduction">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                <button class="btn btn-success waves-effect text-left" onclick="production_du_jour($('#jourproduction').val())" data-dismiss="modal"><i class="fa fa-check"></i>Enregistrer
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
           
     <button type="button" class="btn btn-primary d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus-circle"></i>rapport production journalier</button>

    <button type="button" class="btn btn-primary d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lgs"><i class="fa fa-plus-circle"></i>rapport production mensuel</button>
                
    <div class="modal fade bs-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lgs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Generer rapport</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                     <form class="form-horizontal p-t-20" id="printRapport_mensuel" method="post" action="<?=WEBROOT;?>production_mensuelle">
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
              
               <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Date production</th>
                                <th>Article</th>
                                <th>Quantité produite</th>
                                <!--th>Heure debut</th>
                                <th>Heure fin</th>
                                <th>Heure totale</th-->
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr> <th>Date production</th>
                                <th>Article</th>
                                <th>Quantité produite</th>
                                <!--th>Heure debut</th>
                                <th>Heure fin</th>
                                <th>Heure totale</th-->
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="rep">
                            <?php 
                            $i = 0;
                            //$quantite_total =0;
                            foreach($production->affiche_production() as $value)
                            {
                                
                                $i++; 
                                //$quantite_total +=$value->quantite_produite;       
                            ?>
                            <tr>
                                <td><?php echo $value->date_production?></td>
                                <td><?php echo $value->nom_categorie?></td>
                                <td><?php echo $value->quantite_produite?></td>
                                <!--td><?php echo $value->heure_debut?></td>
                                <td><?php echo $value->heure_fin?></td>
                                <td><?php echo $value->heure_totale?></td-->
                                 <!--td><?php echo $value->quantite_total?></td-->
                                <td class="text-nowrap">
                    <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                <!-- sample modal content -->
                <div class="modal fade bs-example-modal-lg<?= $i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Modifier cette production</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                               <form class="form-horizontal p-t-20" name="formaddClient">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Categorie</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                    <input type="text" id="refpro<?=$i?>" class="form-control" value="<?php echo $value->ID_production?>"hidden>
                                                    <input class="form-control"id="cate<?=$i?>" class="form-control" value="<?php echo $value->nom_categorie?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Heure debut</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                    <input type="time" id="hdebut<?=$i?>" class="form-control" value="<?php echo $value->heure_debut?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- END ROW-->
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Heure fin</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                   <input type="time" class="form-control" id="hfin<?=$i?>" value="<?php echo $value->heure_fin?>">
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
                                                   <input type="number"  id="qteproduite<?=$i?>" class="form-control" value="<?php echo $value->quantite_produite?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label for="exampleInputuname3" class="col-sm-3 control-label">Date production*</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                   <input type="date"   id="dateproduction<?=$i?>" class="form-control" value="<?php echo $value->date_production?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>          
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" onclick="updateproduction($('#refpro<?=$i?>').val(),$('#hdebut<?=$i?>').val(),$('#hfin<?=$i?>').val(),$('#qteproduite<?=$i?>').val(),$('#dateproduction<?=$i?>').val())" data-dismiss="modal">Modifier
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
                            <h4 class="modal-title" id="mySmallModalLabel">Supprimer cette production</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body"> 
                            <input type="text" class="form-control" id="numpro<?= $i?>" value="<?php echo $value->ID_production?>" hidden>
                            Voulez-vous supprimer cette production ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" onclick="suppression_production($('#numpro<?= $i?>').val())" data-dismiss="modal"><i class="mdi mdi-delete-forever"></i></button>
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