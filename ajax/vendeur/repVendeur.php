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
                                <td><?php echo $value->salaire?></td>
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