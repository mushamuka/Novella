 <?php 
                            $i = 0;
                            foreach($production->affiche_production() as $value)
                            {
                                
                                $i++;        
                            ?>
                            <tr>
                                <td><?php echo $value->date_production?></td>
                                <td><?php echo $value->nom_categorie?></td>
                                <td><?php echo $value->quantite_produite?></td>
                                <td><?php echo $value->heure_debut?></td>
                                <td><?php echo $value->heure_fin?></td>
                                <td><?php echo $value->heure_totale?></td>
                                <!--td><$_SESSIONtotal;?></td-->
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