<?php
ob_start();
date('Y-m-d');

$l = false;
$c = false;
$m = false;
$s = false;

/*if ($d = $utilisateur->verifierPermissionDunePage('achat',$_SESSION['ID_utilisateur'])->fetch()) 
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
}*/
?>

 <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xlg-3">
        <div class="card">
            
            <div class="card-body">
                <!--ul class="nav nav-tabs customtab2" role="tablist">
                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#entree" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Achat</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sorties" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Categorie</span></a> </li>
                    
                </ul-->
            <div class="tab-content">
                <div class="tab-pane active show" id="entree" role="tabpanel">
                    <div class="p-20">

                        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
            </div>
         <div class="col-md-7 align-self-center">
            <div class="d-flex justify-content-end align-items-center"></div>
        </div>
    </div>
    </div>
</div>
</div>

                         <div class="table-responsive m-t-0">
            <!--table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%"-->
               <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nom categorie</th>
                            <th>Description</th>
                            <th>Action</th>   
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>  
                            <th>Nom categorie</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="reponse"> 
                        <?php
                        $i =0;
                        foreach ($achat->getCategorie_achat() as $value) 
                            { $i++;?>
                                <tr>
                            <td><?php echo $value->nom?></td>
                            <td><?php echo $value->description?></td>
                            <td class="text-nowrap">
                    <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                <!-- sample modal content -->
                <div class="modal fade bs-example-modal-lg<?= $i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Modifier cette categorie</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                               <form class="form-horizontal p-t-20">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Nom</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                    <input type="text" id="refcat<?=$i?>" class="form-control" value="<?php echo $value->ID_categorie_achat?>"hidden>
                                                    <input type="text" id="refnom<?=$i?>" class="form-control" value="<?php echo $value->nom?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                                    <input type="text" id="description<?=$i?>" value="<?php echo $value->description?>" class="form-control" >
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div><!-- END ROW-->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" onclick="updatecategorie($('#refcat<?=$i?>').val(),$('#refnom<?=$i?>').val(),$('#description<?=$i?>').val())" data-dismiss="modal">Modifier
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
                            <h4 class="modal-title" id="mySmallModalLabel">Supprimer cette categorie</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body"> 
                            <input type="text" class="form-control" id="numcat<?= $i?>" value="<?php echo $value->ID_categorie_achat?>" hidden>
                            Voulez-vous supprimer cette categorie?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" onclick="suppression_categorie($('#numcat<?= $i?>').val())" data-dismiss="modal"><i class="mdi mdi-delete-forever"></i></button>
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
        <div class="tab-pane p-20" id="sorties" role="tabpanel">


            <div class="table-responsive m-t-0">
               
            </div>
        </div>
        <div class="tab-pane p-20" id="messages7" role="tabpanel">3</div>
        </div>
    </div>
</div>
</div>
</div>
<?php
$home_content = ob_get_clean();
require_once('view/home.view.php');
?>