<?php $i=0;  foreach ($utilisateur->getAllProfilUser() as $value) 
                                        {$i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $value->nom_profil?></td>
                                                 <td> <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i>                    
                          </a>
                <!-- sample modal content -->
                <div class="modal fade bs-example-modal-lg<?= $i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-slg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Modifier ce profil</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                        <div class="modal-body">
                             <form class="form-horizontal p-t-20">
                                
                    <div class="row">                       
                        <div class="col-lg-12 col-md-12">
                          <div class="form-group row">
                                  <label for="exampleInputEmail3" class="col-sm-3 control-label">Nom</label>
                              <div class="col-lg-6 form-group">
                                  <div class="input-group">
                                      <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                      <input type="text" id="nomprofil<?=$i?>" value="<?php echo $value->nom_profil?>" class="form-control" class="col-lg-6 ">
                                      <input type="text" id="idprof<?=$i?>" value="<?php echo $value->ID_profilprofil?>" class="form-control" hidden>
                                  </div>
                             </div>
                          </div>
                        </div>
                       
                     
                    </div><!-- END ROW-->
                    </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-info" data-dismiss="modal" onclick="modifier_profil($('#idprof<?=$i?>').val(),$('#nomprofil<?=$i?>').val())"> <i class="fa fa-check"></i>modifier ce profil</button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
                <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-sm<?=$i?>" data-original-title="Supprimer"> <i class="ti-trash text-inverse m-r-10"></i> </a>

                <!-- sample modal content -->
                <div class="modal fade bs-example-modal-sm<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="mySmallModalLabel">Supprimer ce profil</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body"> 
                            <input type="text" class="form-control" id="numprof<?= $i?>" value="<?php echo $value->ID_profil?>"hidden ><br>
                            <br>
                            Voulez-vous supprimer ce profil?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" onclick="supprimeprofil($('#numprof<?= $i?>').val())" data-dismiss="modal"><i class="mdi mdi-delete-forever"></i></button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                       