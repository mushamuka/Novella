<?php


$i =0;
                      foreach ($stock->filtre_article($condition) as $value) 
                      {
                        $i++;
                        ?>
                        <tr> 
                          <td><?= $value->ID?></td>
                          <td><?= $value->LIBELLE?></td>
                          <td><?= $value->ARTICLE?></td>
                          
                         
                          <td><?= $value->PRIX_ACHAT?></td>
                          <td><?= $value->PRIX_VENTE?></td>
                       
                          <td><?= $value->DESCRIPTION?></td>
                          <td><?= $value->DATECREAT?></td>
                           
                            <td class="text-nowrap">
                           
                      <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                             
          
              <div class="modal fade bs-example-modal-lg<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="myLargeModalLabel">Modifier cette boisson du stock</h4>
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
                        
                </div>
              </div>
            </div>
             <div class="col-lg-6 col-md-6"> 
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Article</label>
                <div class="col-sm-9">
                  <input type="text" id="numarticle<?=$i?>" value="<?=$value->ID?>"hidden>
                  <input class="form-control" type="text" id="article<?=$i?>" value="<?php echo $value->ARTICLE?>">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
           
             <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">PA unitaire</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="pa_unitaire<?=$i?>" value="<?=$value->PRIX_ACHAT?>">
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">PV unitaire</label>
                <div class="col-sm-9">
                   <input type="text" class="form-control" id="pv_unitaire<?=$i?>" value="<?php echo $value->PRIX_VENTE?>">
                </div>
              </div>
            </div>
          
          </div>
         
            <div class="row">
            
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">NB_casier</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nb_casier<?=$i?>" value="<?php echo $value->NB_CASIER?>">
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Seuil</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="seuil<?=$i?>" value="<?php echo $value->SEUIL?>">
                </div>
              </div>
            </div>
             
          </div>
           <div class="row">
        
             <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">commentaire</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="note<?= $i?>" value="<?php echo $value->DESCRIPTION ?>" >
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-9">
                   <input type="date" class="form-control" id="date_article<?=$i?>" value="<?php echo $value->DATECREAT?>" >
                </div>
              </div>
            </div>
          </div>
                            </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success" onclick="modifier_article($('#numarticle<?=$i?>').val(),$('#article<?=$i?>').val(),$('#pa_unitaire<?=$i?>').val(),$('#pv_unitaire<?=$i?>').val(),$('#nb_casier<?=$i?>').val(),$('#seuil<?=$i?>').val(),$('#note<?=$i?>').val(),$('#date_article<?=$i?>').val())" data-dismiss="modal">Modifier
                 </button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
            </div>
        </div>
        
    </div>

</div>



  <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-sm<?=$i?>" data-original-title="Supprimer"> <i class="ti-trash text-inverse m-r-10"></i> </a>



<div class="modal fade bs-example-modal-sm<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Supprimer Cette boisson</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"> 
              <input type="text" class="form-control" id="ref_boisson<?=$i?>" value="<?php echo $value->ID?>" hidden>
              Voulez-vous supprimer cette boisson?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" onclick="delete_boisson($('#ref_boisson<?=$i?>').val())" data-dismiss="modal"><i class="ti-trash"></i></button>
            </div>
        </div>
    
    </div>

</div>
 --
                            </td>
                       </tr>
                       <?php
                     }
                       ?>