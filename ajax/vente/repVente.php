  <?php 
                            $i = 0;
                            foreach($vente->getVentes() as $value)
                            {
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $value->nom_categorie?></td>
                                <td><?php echo $value->nomVendeur?></td>
                                <td><?php echo $value->quantite_totale?></td>
                                <td><?php echo $value->quantite_vendue?></td>
                                <td><?php echo $value->quantite_retour?></td>
                                <td><?php echo $value->montant?>    FBU</td>
                                <td><?php echo $value->frais_divers?>    FBU</td>
                                <td><?php echo $value->manquant?>    FBU</td>
                                <td><?php echo $value->note?></td>

                                <td><?php echo $value->date_vente?></td>
                               
                                <td class="text-nowrap">
                    <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                <!-- sample modal content -->
                <div class="modal fade bs-example-modal-lg<?= $i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Modifier cette vente</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                             <form class="form-horizontal p-t-20">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputEmail3" class="col-sm-3 control-label">Article</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" id="idvente<?=$i?>" value="<?php echo $value->ID_vente?>"hidden>
                                                             <input class="form-control"id="article<?=$i?>" value="<?php echo $value->nom_categorie?>" disabled>
                                                      
                                                        </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Vendeur</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" class="form-control" id="vendeur<?=$i?>" value="<?php echo $value->nomVendeur?>" disabled>
                                                               
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Quantite total</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="number" class="form-control" id="qtetotale<?=$i?>" value="<?php echo $value->quantite_totale?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Quantite vendu</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="number"  class="form-control" id="qtevendue<?=$i?>" value="<?php echo $value->quantite_vendue?>">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Quantite retour</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="number" class="form-control"  id="qteretour<?=$i?>" value="<?php echo $value->quantite_retour?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                               <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Montant recu</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="number" class="form-control" id="montant<?=$i?>" value="<?php echo $value->montant?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Date vente</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="date" class="form-control"  id="datevente<?=$i?>" value="<?php echo $value->date_vente?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Autres frais</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" class="form-control"  id="frais_divers<?=$i?>" value="<?php echo $value->frais_divers?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-12 col-md-12">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label"></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">note</span></div>
                                                            <!--input type="text" class="form-control"  id="datefin"-->
                                                            <textarea class="form-control" id="note<?=$i?>" cols="60" wrap="soft"><?php echo $value->note?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" onclick="updatevente($('#idvente<?=$i?>').val(),$('#qtetotale<?=$i?>').val(),$('#qtevendue<?=$i?>').val(),$('#qteretour<?=$i?>').val(),$('#montant<?=$i?>').val(),$('#datevente<?=$i?>').val(),$('#frais_divers<?=$i?>').val(),$('#note<?=$i?>').val())" data-dismiss="modal">Modifier
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
                            <h4 class="modal-title" id="mySmallModalLabel">Supprimer cette vente</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body"> 
                            <input type="text" class="form-control" id="numvente<?= $i?>" value="<?php echo $value->ID_vente?>" hidden>
                            Voulez-vous supprimer cette vente ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" onclick="suppression_vente($('#numvente<?= $i?>').val())" data-dismiss="modal"><i class="mdi mdi-delete-forever"></i></button>
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