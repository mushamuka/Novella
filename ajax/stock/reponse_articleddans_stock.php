<?php $i =0;
                      foreach ($stock->Affiche_historique_en_stock() as $value) 
                      {
                        $i++;
                        ?>
                        <tr> 
                          <td><?= $value->LIBELLE?></td>
                          
                          <td><?= $value->ARTICLE?></td>
                         
                          <td><?= $value->quantite.'   Bouteilles'?></td>
                          <td><?= $value->description?></td>
                          
                          <td><?= $value->date_stock?></td>
                           
                            <td class="text-nowrap">
                              <!--a href="<=WEBROOT;?>detailprospect-<php echo $value->ID?>" data-toggle="tooltip" data-original-title="Voir"> <i class="fa fa-eye text-inverse m-r-10"></i></a-->
                             
                      <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                             
          
              <div class="modal fade bs-example-modal-lg<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="myLargeModalLabel">Modifier ce stock</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          </div>
                      <div class="modal-body">
                            <form class="form-horizontal p-t-20">
                             
                             <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label" class="btn  active">Categorie</label>
                <div class="col-sm-9">
                  <input class="form-control"  value="<?php echo $value->LIBELLE?>"disabled>
                        <input type="text" id="ref<?=$i?>" value="<?php echo $value->ID_histo?>"hidden>
                </div>
              </div>
            </div>
           <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Quantite</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="quantite_b<?=$i?>" value="<?=$value->quantite?>">
                </div>
              </div>
            </div>
          </div>
        
         
            <div class="row">
            
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="note<?=$i?>" value="<?php echo $value->description?>">
                </div>
              </div>
            </div>
             <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-9">
                   <input type="date" class="form-control" id="date_stock<?=$i?>" value="<?php echo $value->date_stock?>" >
                </div>
              </div>
            </div>
          </div>
     
                            </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success" onclick="modifier_stock($('#ref<?=$i?>').val(),$('#quantite_b<?=$i?>').val(),$('#note<?=$i?>').val(),$('#date_stock<?=$i?>').val())" data-dismiss="modal">Modifier
                 </button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
            </div>
        </div>
        
    </div>

</div>



  <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-sm<?=$i?>" data-original-title="Supprimer"> <i class="ti-trash text-inverse m-r-10"></i> </a>


<!-- sample modal content -->
<div class="modal fade bs-example-modal-sm<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Supprimer Ce stock</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"> 
              <input type="text" class="form-control" id="id_histock<?=$i?>" value="<?php echo $value->ID_histo?>" >
              Voulez-vous supprimer ce stock?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" onclick="suprimer_histo_stock($('#id_histock<?=$i?>').val())" data-dismiss="modal"><i class="ti-trash"></i></button>
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