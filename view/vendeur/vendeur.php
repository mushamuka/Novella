 <?php
ob_start();
$l = false;
$c = false;
$m = false;
$s = false;
if ($d = $utilisateur->verifierPermissionDunePage('vendeur',$_SESSION['ID_utilisateur'])->fetch()) 
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
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                <li class="breadcrumb-item active">Travailleur</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus-circle"></i> Ajouter un travailleur</button>

            <!-- sample modal content -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Travailleur</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body"> 
                            <form class="form-horizontal p-t-20">
                                        <div class="row">
                                            
                                           
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Nom</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" class="form-control" id="nom">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Prenom</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text"  class="form-control" id="prenom" onclick="test(this.prenom)">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Telephone</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="number" class="form-control"  id="fone">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                               <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Adresse</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" id="adresse" class="form-control" placeholder="adresse" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Age</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" class="form-control"  id="age">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="date" class="form-control" value="<?=date('Y-m-d')?>" id="datevenu">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Commission</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="number" class="form-control"  id="salaire">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Statut</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <select class="form-control"  id="statut">
                                                                <option>selectionnez la categorie</option>
                                                                <option value="DETAILLANT">DETAILLANT</option>
                                                                 <option value="GROSSISTE">GROSSISTE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                       
                                    </form>
                        </div>
                        <div class="modal-footer">
                            <span id="msg"></span>
                            <button class="btn btn-success waves-effect text-left" onclick="creer_vendeur($('#nom').val(),$('#prenom').val(),$('#fone').val(),$('#adresse').val(),$('#age').val(),$('#datevenu').val(),$('#salaire').val(),$('#statut').val())" data-dismiss="modal"><i class="fa fa-check"></i>Enregistrer
                            </button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="mdi mdi-close-circle-outline" ></i>Fermer</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


        </div>
    </div>
</div>
		    	<div class="row m-t-0">
		    		<div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="card">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">VOUS AVEZ AU TOTAL </h1>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="card">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><?php $nombre = $vendeur->nombredes_agents()->fetch();
                                    echo $nombre['nombre'] .' '.'AGENTS';
                                ?></h1>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="row" hidden="">
		            <div class="col-lg-2 col-md-2">
		                <div class="form-group">
		                    <input type="text" id="idclientFiltre" class="form-control" autocomplete="off" placeholder="ID et Nom client">
		                        <div id="modal"></div>
		                </div>
		            </div>
		            <div class="col-lg-2 col-md-2">
		                <div class="form-group">
		                	<select class="form-control custom-select" id="secteurfiltre">
		                    <option value="">Secteur</option>
		                </select>
		                </div>
		            </div>
		            <div class="col-lg-4 col-md-4 col-sm-6">
		                <div class="row">
		                    <label for="exampleInputEmail3" class="col-sm-3 control-label">Creation</label>
		                    <div class="col-sm-9">
		                        <div class="form-group">
		                            <input type="date" class="form-control" name="date1" id="date1">
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="col-lg-2 col-md-2 col-sm-6">
		                <div class="form-group">
		                    <input type="date" class="form-control" name="date2" id="date2">
		                </div>
		            </div>
		            <div class="col-lg-1 col-md-1">
		                <button type="button" class="btn waves-effect waves-light btn-rounded btn-sm btn-danger" onclick="filtreClient($('#idclientFiltre').val(),$('#secteurfiltre').val(),$('#date1').val(),$('#date2').val())"><i class="ti ti-filter"></i> Filtrer</button>
		            </div>
		            <div class="col-lg-1 col-md-1">
		                <button type="button" class="btn waves-effect waves-light btn-rounded btn-sm btn-danger" onclick="resetFiltreClient()"><i class="mdi mdi-refresh"></i> Reset</button>
		            </div>
		        </div>
		        <div class="table-responsive m-t-0">
		             <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th>Age</th>
                                <th>Commission</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th>Age</th>
                                <th>Commission</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="rep">
                            
                            <?php 
                            $i = 0;
                            foreach($vendeur->afficheTous_les_vendeurs() as $value)
                            {
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $value->nomVendeur?></td>
                                <td><?php echo $value->prenom?></td>
                                <td><?php echo $value->adresse?></td>
                                <td><?php echo $value->telephone?></td>
                                <td><?php echo $value->age?></td>
                                <td><?php echo $value->salaire.' fbu'?></td>
                                <td><?php echo $value->date_vendeur?></td>
                                <td class="text-nowrap">
                    <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                <!-- sample modal content -->
                <div class="modal fade bs-example-modal-lg<?= $i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Modifier ce vendeur</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                             <form class="form-horizontal p-t-20">
                                        <div class="row">
                                            
                                           
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Nom</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>

                                                            <input type="text" class="form-control" id="idvendeur<?=$i?>" value="<?php echo $value->ID_vendeur?>" hidden>
                                                            <input type="text" class="form-control" id="nom<?=$i?>" value="<?php echo $value->nomVendeur?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Prenom</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text"  class="form-control" id="prenom<?=$i?>" value="<?php echo $value->prenom?>">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Telephone</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="number" class="form-control"  id="fone<?=$i?>" value="<?php echo $value->telephone?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                               <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Adresse</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" id="adresse<?=$i?>" value="<?php echo $value->adresse?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Age</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" class="form-control"  id="age<?=$i?>" value="<?php echo $value->age?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="date" class="form-control"  id="datevenu<?=$i?>" value="<?php echo $value->date_vendeur?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Salaire</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" class="form-control"  id="salaire<?=$i?>" value="<?php echo $value->salaire?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                       
                                    </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" onclick="updatevendeur($('#idvendeur<?=$i?>').val(),$('#nom<?=$i?>').val(),$('#prenom<?=$i?>').val(),$('#fone<?=$i?>').val(),$('#adresse<?=$i?>').val(),$('#age<?=$i?>').val(),$('#datevenu<?=$i?>').val(),$('#salaire<?=$i?>').val())" data-dismiss="modal">Modifier
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
                            <h4 class="modal-title" id="mySmallModalLabel">Supprimer ce vendeur</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body"> 
                            <input type="text" class="form-control" id="refevendeur<?= $i?>" value="<?php echo $value->ID_vendeur?>" hidden>
                            Voulez-vous supprimer ce vendeur ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" onclick="suppression_vendeur($('#refevendeur<?= $i?>').val())" data-dismiss="modal"><i class="mdi mdi-delete-forever"></i></button>
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