<?php
ob_start(); 
?>

<input type="text" id="WEBROOT" value="<?=WEBROOT?>" hidden>
<input type="text" id="url" value="<?=WEBROOT?>article" hidden>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <div class="card-subtitle">
                <button type="button" class="btn btn-success d-none d-lg-block m-l-15" onclick="pdf_control()"><i class="fa fa-file"></i>PDF Control passé
                </button>
                <form class="form-horizontal p-t-0" action="<?=WEBROOT?>print_controlpasse" method="post" id="form-control"><input type="text" id="cond" name="cond" hidden="" >
                </form>
            </div>

                                 <!-- FILTRE -->
                <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="form-group">
                      <select class="form-control" id="categorie">
                        <option></option>
                        <?php
                        foreach ($stock->get_categorie_boisson() as $value) 
                        {
                          ?>
                          <option value="<?php echo $value->IDCAT?>"><?php echo $value->LIBELLE?></option>
                         
                          <?php
                        }
                        ?>
                        
                      </select>
                       
                    </div>
                </div>
         
                <div class="col-lg-2 col-md-2 col-sm-6">
                    <div class="form-group">
                        <input type="date" class="form-control" name="date1" id="date1">
                    </div>
                </div>
                <div class="col-lg-1 col-md-1">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-sm btn-success" onclick="filtre_controlPasse($('#categorie').val(),/*$('#mois').val(),$('#annee').val(),*/$('#date1').val())"><i class="ti ti-filter"></i> Filtrer</button>
                </div>
                <div class="col-lg-1 col-md-1">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-sm btn-danger" onclick="resetFiltre_control()"><i class="mdi mdi-refresh"></i> Reset</button>
                </div>
            </div>
                                <div class="table-responsive">
                                    <!--table class="table table-bordered"-->
                                         <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Categorie</th>
                                                <th>Control lié</th>
                                                <th>Qte existante</th>
                                                <th>Qte vendue</th>
                                                <th>Date Controle</th>
                                                 <th>Gain par control</th>

                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="retour">
                                           <?php
                      $i =0;
                      $gain_parcontol =0;
                      $gain_b =0; 
                      foreach ($stock->Affiche_ancien_control() as $value) 
                      { 
                        $i++;
                    ?> <tr>
                                            <td><?= $value->LIBELLE?></td>
                                     <!--control_lie()-->
                                            <!--td><?= $value->nombre?></td-->
                                            <?php

                                            foreach ($stock->control_lie($value->ID_control,$value->IDCAT) as $value2) 
                                            {
                                              ?>
                                               <td><?= $value2->nombre?></td>
                                               <?php
                                            }
                                            ?>
                                            <td>
                                              <?= $value->quantite_rencontre?>        
                                              </td>
                                            <td><?= $value->quantite_vendue?> </td>
                                             <td><?= $value->date_control?></td>
                                            <td>
                                                <?php
                                                   
                                                      $gain_b =($value->PRIX_VENTE * $value->NB_CASIER - $value->PRIX_ACHAT) / $value->NB_CASIER;
                                                        $gain_parcontol =$gain_b* $value->quantite_vendue;
                                                        echo number_format($gain_parcontol) ;
                                                    
                                                ?>
                                            </td>
                                            
                                           

                                            <td class="text-nowrap">

                                                <a href="<?= WEBROOT;?>detailControl-<?= $value->ID_control;?>" data-toggle="tooltip" data-original-title="Edit">  <i class="fa fa-eye text-inverse m-r-10"></i></a>
                                                <a href="<?= WEBROOT;?>print_detail_control-<?= $value->ID_control;?>" data-toggle="tooltip" data-original-title="Print"> <i class="mdi mdi-printer text-inverse m-r-10"></i> </a>
                                              
                                            </td>
                                        </tr>
                                      <?php
                                    }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

     

<?php
$home_content = ob_get_clean();
require_once('view/home.view.php');
?>