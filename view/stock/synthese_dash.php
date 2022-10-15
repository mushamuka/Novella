<?php
ob_start();
$date = date_parse(date('Y-m-d'));
  $mois = $date['month'];
  $annee = $date['year'];

$stock =new Stock();
$donne_stock =array();
$requete = $stock->rapport_stock_actuel();
foreach ($requete  as $value) 
{
    $donne_stock[] = array('label' =>$value->ARTICLE,'value' => $value->quantite);
}
$donne_stock = json_encode($donne_stock);


 // Qte vendue par mois

    $quantite_vendue = '';
    foreach ($stock->graph_quantiteTotalPar_articleVendue($mois,$annee) as $value) 
    {
        $quantite_vendue .= "{y:'".$value->ARTICLE."',a:".$value->quantite_vendue."}, ";
    }
    $quantite_vendue = substr($quantite_vendue, 0,-2);


?>

<div class="row">
    
  <script type="text/javascript">
     var solde_annuel_dun_client = <?php echo $donne_stock;?>;

     var graphe_qteVendue = [<?php echo $quantite_vendue?>];
  </script>
</div>
  <div class="row">
    <?php
      $dashbordNombreArticle = array();
      $i=0;
      foreach ($stock->nombre_darticle_par_categorie() as $value) 
        {
            $i++;
        $dashbordNombreArticle [] = $value;
    ?>
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card">
            <div class="box bg-success text-center">
              <h1 class="font-light text-white"><?=$value->nb?></h1>
              <h6 class="text-white">
                <form method="post" action="<?=WEBROOT?>generer_pdf">
                    <input type="text" id="in<?=$i?>" name="in" value="<?php echo $value->IDCAT?>"hidden>
                
                <button type="submit"  class="btn btn-sm btn-rounded btn-success" ><?=$value->LIBELLE?></button></h6>
                </form>
            </div>
        </div>
    </div>
    <?php
  }
    ?>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                 <h4 class="card-title">SYNTHESE</h4>
                <div class="row">
                    <div class="table-responsive">
                  <table class="table color-table nowrap success-table">
                      <thead>
                          <tr>
                           
                              <th class="font-bold">Article</th>
                              <th class="font-bold">Benefice unitaire</th>
                              <th class="font-bold">Stock en cours</th>
                             
                               <th class="font-bold">Benefice</th>
                           </tr>
                      </thead>
                      <tbody id="retour" class="font-bold">
                          <?php
                          //$mois = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                          //$tb_mois= [1=>'janvier',2=>'fevrier',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'aout',9=>'septembre',10=>'octobre',11=>'novembre',12=>'decembre'];
                          $i =0;
                          $bene_unitaire =0;
                          $benefice_total  =0;
                          $tg_b =0;
                          $gain_b =0;
                          $benefice_s =0;
                          $stock_semaine =0;
                          $bouteille_vendu = 0;
                          $bentotales =0;
                       foreach ($stock->rapport_synthese_stock($mois,$annee) as $value) 
                        {
                          $i++;
                          ?>
                              <tr> 
                                <td><?= $value->ARTICLE?></td>
                                <td>
                                  <?php 
                                    $bene_unitaire =($value->PRIX_VENTE * $value->NB_CASIER - $value->PRIX_ACHAT)/ /* $value->quantite_initiale*/$value->NB_CASIER;
                                                  //echo $bene_unitaire.'  BIF';
                                        echo number_format($bene_unitaire,2).'  BIF';
                                      $tg_b +=$bene_unitaire;
                                    ?>
                                      
                                    </td>
                                    <td>
                                      <?php
                                       echo  $value->quantite;
                                      
                                     ?>
                                  </td>
                                  <!--td>
                                    <php
                                      $bouteille_vendu = $stock_semaine-$value->quantite_rencontre ;
                                      echo  $bouteille_vendu;
                                      >
                                </td-->
                          <td>
                              <?php
                                  $gain_b =($value->PRIX_VENTE * $value->NB_CASIER - $value->PRIX_ACHAT) / $value->NB_CASIER;
                                          // echo $gain_b;
                                // $stock_semaine =$value->quantite_initiale * $value->NB_CASIER;
                                 $benefice_s = $value->quantite* $gain_b;
                                 $bentotales +=$benefice_s;

                                 echo number_format($benefice_s) ;
                              ?>
                          </td>
                      </tr>
                            <?php
                          }
                            ?>
                        <tr>
                          <td>Total</td>
                          <td><?php echo number_format($tg_b,2).'  BIF';?></td>
                          <td></td>
                        
                          <td><?=number_format($bentotales,2).'  BIF'?></td>
                        </tr>
                      </tbody>
                  </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                        <div class="col-lg-6">
                          <div class="card">
                              <div class="card-body">
                                  <h6 class="card-title">Total quantite vendue par article</h6>
                                  <div id="morris-donut-chart-quantite-stock-graph"></div>
                              </div>
                          </div>
                      </div>
              </div>
              <div class="row">
                  <div class="col-6">
                                      <div class="card">
                                          <div class="card-body">
                                             
                                              <!--h6 class="card-subtitle">Add<code>.table-bordered</code>for borders on all sides of the table and cells.</h6-->
                                              <h4 class="card-title">Quantite en stock</h4>
                                              <div class="table-responsive">
                                                  <table class="table table-bordered">
                                                      <thead>
                                                          <tr>
                                                              <!--th>Categorie</th-->
                                                              <th>Article</th>
                                                              <th>Quantite réelle</th>
                                                              <th>Seuil</th>
                                                              <th>Date entree</th>
                                                              <!--th>note</th>

                                                              <th class="text-nowrap">Action</th-->
                                                          </tr>
                                                      </thead>
                                                      <tbody id="retour">
                                                         <?php
                                    $i =0;

                                    foreach ($stock->Affiche_etat_stock_actuel($mois,$annee) as $value) 
                                    {
                                      $i++;
                                      ?>
                                                          <tr>
                                                            
                                                              <td><?= $value->ARTICLE?></td>
                                                              <td><?= $value->quantite?></td>
                                                              <td>
                                                                <?php 
                                                                if ($value->quantite <= $value->SEUIL) 
                                                                {
                                                                  ?>
                                                                  <span class="label label-danger">il vous reste <?= $value->quantite?></span>
                                                                  <?php
                                                                }
                                                                else
                                                                {
                                                                  echo "Vous avez encore les articles" ;
                                                                  }?>         
                                                                </td>
                                                              
                                                              <td><?= $value->date_stock?></td>

                                                             
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
                    <div class="col-lg-6">
                      <div class="card">
                          <div class="card-body">
                              <h6 class="card-title">Article disponible en stock</h6>
                              <div id="morris-donut-chart-quantite-stock"></div>
                          </div>
                      </div>
                  </div>
                </div>
                <?php
$home_content = ob_get_clean();
require_once('view/home.view.php');
?>