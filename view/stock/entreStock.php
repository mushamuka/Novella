<?php
ob_start(); 
$l = false;
$c = false;
$m = false;
$s = false;
if ($d = $utilisateur->verifierPermissionDunePage('stock',$_SESSION['ID_utilisateur'])->fetch()) 
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
}
?>
<div class="row"> 
  <div class="col-lg-12 col-md-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div id="control"></div>
          
          <div class="row page-titles">
    <div class="col-md-5 align-self-center">
    </div>
    <div class="col-md-7 align-self-center">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                <!--<li class="breadcrumb-item active">Client</li>-->
            </ol>
            <a href="<?= WEBROOT;?>ancien_control" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-check"></i>Control precedent</a>
  <button type="button" class="btn d-none d-lg-block m-l-15 btn-success" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus-circle" class="modal fade" tabindex="-1" role="dialog"></i>Nouveau Control
                               </button>
                                <!-- sample modal content -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Control</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form-horizontal p-t-20">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label" class="btn  active">categorie</label>
                <div class="col-sm-9">
                  <select class="form-control" onchange="getcategorie($(this).val())">  
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
            </div>
             <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Date controle</label>
                <div class="col-sm-9">
                  
                   <input type="date" class="form-control" name="datecreation" id="datecontrol">
                   <input type="date" id="today" value="<?php echo date('Y-m-d');?>" hidden>
                   
                </div>
              </div>
            </div>
          </div>
          <div id="rep"></div>
          <!-- END ROW-->
        </div>
             <div class="modal-footer">
              <!--button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Controller</button-->
                <button class="btn btn-success" data-dismiss="modal"  type="button"  onclick="control($('#datecontrol').val(),$('#today').val())"> <i class="fa fa-check"></i>Controller</button>
              <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
            </div>

           </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!--/.modal-dialog -->
  </div>


 <button type="button" class="btn d-none d-lg-block m-l-15 btn-success" data-toggle="modal" data-target=".bs-example-modal-lgs"><i class="fa fa-plus-circle" class="modal fade" tabindex="-1" role="dialog"></i>Entree stock
                               </button>


                                <!-- sample modal content -->
<div class="modal fade bs-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Creer stock</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal p-t-20" enctype="multipart/form-data" action="<?=WEBROOT?>stock_boisson" method="POST">
                    
                    <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label" class="btn  active">Categorie</label>
                <div class="col-sm-9"> 
                   <select class="form-control" onchange="getcategoris($(this).val())" id="refcategorie_stock">
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
            </div>
            
             <div class="col-lg-6 col-md-6"> 
             <div  id="reponse"></div>
            </div>
          


          </div>
          <div class="row">
           
             <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Quantite</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="quantite" >
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="datestock" value="<?php echo date('d-m-Y')?>">
               
                </div>
              </div>
            </div>
         
          
          </div>
          <div class="row">
           
             <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="note">
                </div>
              </div>
            </div>
          </div>
        </div>
              <div class="modal-footer">
                      <button class="btn btn-success" data-dismiss="modal"  type="button"  onclick="nouvelle_stock($('#refcategorie_stock').val(),$('#quantite').val(),$('#note').val(),$('#datestock').val())"> <i class="fa fa-check"></i>Ajouter en stock</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
              </div>
             
        </div>
        <!-- /.modal-content -->
    </div>
    <!--/.modal-dialog -->
     </form>
</div>



      <button type="button" class="btn btn-success d-none d-lg-block m-l-15" onclick="printFiltre_stock()"><i class="fa fa-file"></i> Générer pdf</button>
        <a href="<?= WEBROOT;?>seuil_minimal" class="btn btn-success d-none d-lg-block m-l-15"><i class="icon-printer text-inverse m-r-10"></i> print stock minimal</a>
       

      <form class="form-horizontal p-t-0" action="<?=WEBROOT?>printArticle_stock" method="post" id="form-filtre_stock">
              <input type="text" id="cond" name="cond"hidden>
            </form>
        </div>
    </div>
</div>
                <!-- FILTRE -->
                <div class="row">
                
                <div class="col-lg-3 col-md-3">
                    <div class="form-group">
                     <select class="form-control"  id="categorie">
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
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Creation</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date1" id="date1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="form-group">
                        <input type="date" class="form-control" name="date2" id="date2">
                    </div>
                </div>
                <div class="col-lg-1 col-md-1">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-sm btn-success" onclick="filtre_stock($('#categorie').val(),$('#date1').val(),$('#date2').val())"><i class="ti ti-filter"></i> Filtrer</button>
                </div>
                <div class="col-lg-1 col-md-1">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-sm btn-danger" onclick="resetFiltrestock()"><i class="mdi mdi-refresh"></i> Reset</button>
                </div>
            </div>
            <!--div class="table-responsive m-t-0">
                <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%"-->
                  <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                             <th>CATEGORIE</th>
                             <th>Article</th>
                             <th>Quantite</th>
                             <th>Description</th>
                             <th>DATE</th>
                              
                              <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                       <tr>
                             <th>CATEGORIE</th>
                             <th>Article</th>
                             <th>Quantite</th>
                             <th>Description</th>
                             <th>DATE</th>
                              
                              <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="res">
                      <?php
                      $i =0;
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

                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>


<?php
$home_content = ob_get_clean();
require_once('view/home.view.php');
?>