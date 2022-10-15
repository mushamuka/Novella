<?php
ob_start(); 
 $i = 1;
?>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
             <div class="card-subtitle">
              <a href="<?=WEBROOT?>ancien_control" class="btn btn-success waves-effect waves-light" type="button" ><i class="fa fa-fast-backward"></i></a><span class="btn-label"></span></a></button>
                 <a href="<?=WEBROOT?>pdf_control_anterieur_aunedate-<?= $idcontrol;?>" class="btn btn-success waves-effect waves-light" type="button" ><i class="icon-printer text-inverse m-r-10"></i>detail control</a></button>
                <!--form class="form-horizontal p-t-0" action="<?=WEBROOT?>print_controlpasse" method="post" id="form-control"><input type="text" id="cond" name="cond" hidden="" >
                </form-->
             </div>

                                 <!-- FILTRE -->
                <div class="row">
                
                                <div class="table-responsive">
                                    <!--table class="table table-bordered"-->
                                         <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Article</th>
                                              
                                                <th>Qte Totale</th>
                                                <th>Qte existante</th>
                                                <th>Qte vendue</th>
                                                <th>Date Controle</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody id="retour">
                                           <?php
                                         
                      foreach ($stock->detail_pour_chaque_ArticleContol($idcontrol) as $value) 
                      { 
                        $i++;
                            ?>
                                <tr>
                                    <td><?= $value->ARTICLE?></td>
                                    <td><?= $value->quantite_initiale?></td>
                                    <td><?= $value->quantite_rencontre?></td>
                                    <td><?= $value->quantite_vendue?></td>
                                    <td><?= $value->date_control?></td>
                                </tr>
                                      <?php
                                    }
                                    ?>
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