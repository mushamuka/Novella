<?php
ob_start();
$l = false;
$c = false;
$m = false;
$s = false;
if ($d = $utilisateur->verifierPermissionDunePage('article',$_SESSION['ID_utilisateur'])->fetch()) 
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

<input type="text" id="WEBROOT" value="<?=WEBROOT?>" hidden>
<input type="text" id="url" value="<?=WEBROOT?>article" hidden>
<input type="text" id="session_user" value="<?=$_SESSION['ID_utilisateur']?>" hidden>


<div class="row">
  <div class="col-lg-12 col-md-12 col-xl-12">
    <div class="card">
        <div class="card-body">
         
          <div class="row page-titles">
    <div class="col-md-5 align-self-center">
    </div>
    <div class="col-md-7 align-self-center">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                <!--<li class="breadcrumb-item active">Client</li>-->
            </ol>
             <button type="button" class="btn d-none d-lg-block m-l-15 btn-success" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus-circle" class="modal fade" tabindex="-1" role="dialog"></i>ajouter categorie
                               </button>
                                <!-- sample modal content -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Nouvelle categorie</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal p-t-20">
                  <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label" class="btn  active">Libelle</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="libelle">
                </div>
              </div>
            </div>
             <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Date creation</label>
                <div class="col-sm-9">
                  
                   <input type="date" class="form-control" id="datecreation" value="<?php echo date('Y-m-d')?>">
                </div>
              </div>
            </div>
          </div>
            <!-- END ROW-->
          </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success waves-effect text-left" onclick="Nouvellecategorie($('#libelle').val(),$('#datecreation').val())" data-dismiss="modal"><i class="fa fa-check"></i>Ajouter categorie</button>
              <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!--/.modal-dialog -->
</div>


                              &nbsp;&nbsp;&nbsp;
<button type="button" class="btn waves-effect waves-light btn-block-sm  btn-success" data-toggle="modal" data-target=".bs-example-modal-lgs"><i class="fa fa-plus-circle"></i> Ajouter boisson</button>

                                <!-- sample modal content -->
<div class="modal fade bs-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Nouvelle Boisson</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal p-t-20" enctype="multipart/form-data" action="<?=WEBROOT?>stock_boisson" method="POST">
                    
                    <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label" class="btn  active">Categorie</label>
                <div class="col-sm-9">
                    <select class="form-control"  id="categorie_stock">
                      <option>faire le choix</option>
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
                <label for="exampleInputuname3" class="col-sm-3 control-label">Article</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="article" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
           
             <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label"> PA/casier</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="prix_achat">
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">PV unitaire</label>
                <div class="col-sm-9">
                   <input type="number" class="form-control" id="prix_vente">
                </div>
              </div>
            </div>
          
          </div>
         
            <div class="row">
            
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Nbr/casier</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nbrpar_casier">
                </div>
              </div>
            </div>
             <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-9">
                   <input type="date" class="form-control" id="date_achat" value="<?php echo date('Y-m-d')?>" >
                </div>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="form-group row">
                <label for="exampleInputuname3" class="col-sm-3 control-label">Seuil</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="seuil">
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xlg-6">
              <div class="form-group">
                <input type="text" class="form-control" id="note" placeholder="DESCRIPTION" >
              </div>
            </div>
          </div>
                        
                
            </div>
              <div class="modal-footer">
                      <button class="btn btn-success" data-dismiss="modal"  type="button"  onclick="creestock_boisson($('#categorie_stock').val(),$('#article').val(),$('#prix_achat').val(),$('#prix_vente').val(),$('#nbrpar_casier').val(),$('#date_achat').val(),$('#seuil').val(),$('#note').val())"> <i class="fa fa-check"></i>Ajouter article</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
              </div>
             
        </div>
        <!-- /.modal-content -->
    </div>
    <!--/.modal-dialog -->
     </form>
</div>
<button type="button" class="btn btn-success d-none d-lg-block m-l-15" onclick="print_article()"><i class="fa fa-file"></i> Générer rapport article</button>
      <form class="form-horizontal p-t-0" action="<?=WEBROOT?>print_rapport_article" method="post" id="form-article">
              <input type="text" id="cond" name="cond" hidden="" >
            </form>
        </div>
    </div>
</div>
                <!-- FILTRE -->
                <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="form-group">
                      <select class="form-control" id="idarticle">
                        <option></option>
                        <?php
                        foreach ($stock->get_article_filtre() as $value) 
                        {
                          ?>
                          <option value="<?php echo $value->ID?>"><?php echo $value->ARTICLE?></option>
                         
                          <?php
                        }
                        ?>
                        
                      </select>
                       
                    </div>
                </div>
                <div class="col-lg-2 col-md-2">
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
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Creation</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date1" id="date1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6">
                    <div class="form-group">
                        <input type="date" class="form-control" name="date2" id="date2">
                    </div>
                </div>
                <div class="col-lg-1 col-md-1">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-sm btn-success" onclick="filtre_article($('#idarticle').val(),$('#categorie').val(),$('#date1').val(),$('#date2').val())"><i class="ti ti-filter"></i> Filtrer</button>
                </div>
                <div class="col-lg-1 col-md-1">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-sm btn-danger" onclick="resetFiltrearticle()"><i class="mdi mdi-refresh"></i> Reset</button>
                </div>
            </div>
            <div class="table-responsive m-t-0">
                <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                             <th>ID</th>
                            
                            <th>Categorie</th>
                            <th>Article</th>
                            <th>Prix d'achat</th>
                            <th>PV unitaire</th>
                            <th>Description</th>
                              <th>Date creation</th>
                              <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            
                             <th>ID</th>
                            
                            <th>Categorie</th>
                            <th>Article</th>
                            <th>Prix d'achat</th>
                            <th>PV unitaire</th>
                            <th>Descriptio</th>
                              <th>Date creation</th>
                              <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="rep">
                      <?php
                      $i =0;
                      foreach ($stock->produit_en_stock() as $value) 
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
                              <!--a href="<=WEBROOT;?>detailprospect-<php echo $value->ID?>" data-toggle="tooltip" data-original-title="Voir"> <i class="fa fa-eye text-inverse m-r-10"></i></a-->
                             
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


<!-- sample modal content -->
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