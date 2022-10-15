<?php
ob_start();
date('Y-m-d');
$l = false;
$c = false;
$m = false;
$s = false;
if ($d = $utilisateur->verifierPermissionDunePage('vente',$_SESSION['ID_utilisateur'])->fetch()) 
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
<div class="row">
<div class="col-lg-12 col-md-12 col-xl-12"> 
   <div class="card">
     <div class="card-body">
       <div class="row page-titles">
            <div class="col-md-5 align-self-center">
            </div>
         <div class="col-md-7 align-self-center">
            <div class="d-flex justify-content-end align-items-center">
                 <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus-circle" class="modal fade" tabindex="-1" role="dialog"></i>Nouvelle vente</button>
               <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title" id="myLargeModalLabel">Nouvelle vente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                <div class="modal-body">
                   <form class="form-horizontal p-t-20">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputEmail3" class="col-sm-3 control-label">Produit</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                             <select class="form-control"id="produit">
                                                        <?php
                                                        $i =0;
                                                        foreach ($production->getcategorie_productiondans_vente() as $value) 
                                                            {$i++;
                                                                ?>
                                                            <option value="<?php echo $value->ID_categorieP.'_'.$value->quantite.'_'.$value->ID_production.'_'.$value->prix?>"><?php echo $value->nom_categorie?></option>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                                    </select>
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
                                                                 <select class="form-control"id="vendeur">
                                                        <?php
                                                        $i =0;
                                                        foreach ($vendeur->afficheTous_les_vendeurs() as $value) 
                                                            {$i++;
                                                                ?>
                                                            <option value="<?php echo $value->ID_vendeur?>"><?php echo $value->nomVendeur." - " .$value->statut?></option>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                                    </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group row">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Quantite recu</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="number" class="form-control" id="qtetotale">
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
                                                            <input type="number"  class="form-control" id="qtevendue">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Dette</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend"></div>
                                                <input type="text" class="form-control"  id="dette" >
                                                <!--input type="button" onclick="calculretour($('#qtetotale').val(),$('#qtevendue').val())"-->
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
                                                            <input type="number" id="montant" class="form-control" placeholder="montant" >
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
                                                            <input type="date" class="form-control" value="<?=date('Y-m-d')?>" id="datevente">
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
                                                            <input type="text" class="form-control" value="0" id="frais_divers">
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
                                                            <textarea class="form-control" id="note" cols="60" wrap="soft"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                </div>
                  <div class="modal-footer">
                            <span id="msg"></span>
                            <button class="btn btn-success waves-effect text-left" onclick="creer_vente($('#produit').val(),$('#vendeur').val(),$('#qtetotale').val(),$('#qtevendue').val(),$('#dette').val(),$('#montant').val(),$('#datevente').val(),$('#frais_divers').val(),$('#note').val())" data-dismiss="modal"><i class="fa fa-check"></i>Enregistrer
                            </button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="mdi mdi-close-circle-outline" ></i>Fermer</button>
                        </div>
            </div>
        </div>
    </div>

        <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lgs-ancien"><i class="fa fa-file"></i> rapport dette agent</button>
          <!--sample modal content -->
<div class="modal fade bs-example-modal-lgs-ancien" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lgs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Dette agent</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                  <form class="form-horizontal p-t-20" id="rapport_dette" method="post" action="<?=WEBROOT;?>dette_agent">
                   <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Agent </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                           <select class="form-control" name="agent" id="agent">
                                                        <?php
                                                        $i =0;
                                                        foreach ($vendeur->afficheTous_les_vendeurs() as $value) 
                                                            {$i++;
                                                                ?>
                                                            <option value="<?php echo $value->ID_vendeur?>"><?php echo $value->nomVendeur?></option>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                             </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Mois</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <select class="form-control" name="mois" id="mois">
                                            <option value="1">Janvier</option>
                                            <option value="2">Fevrier</option>
                                            <option value="3">Mars</option>
                                            <option value="4">Avril</option>
                                            <option value="5">Mai</option>
                                            <option value="6">Juin</option>
                                            <option value="7">Juillet</option>
                                            <option value="8">Aout</option>
                                            <option value="9">Septembre</option>
                                            <option value="10">Octobre</option>
                                            <option value="11">Novembre</option>
                                            <option value="12">Decembre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Année </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <input type="text" data-mask="9999" class="form-control" name="annee" id="annee" value="<?php echo date('Y')?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                
            </div>
            <div class="modal-footer">
                <span id="msg"></span>
                <button type="button" class="btn btn-info waves-effect text-left" onclick="rapportdette_agent($('#agent').val(),$('#mois').val(),$('#annee').val())" data-dismiss="modal"><i class="fa fa-check"></i>Generer
                    </button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="mdi mdi-close-circle-outline" ></i>Fermer</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--a href="<?= WEBROOT;?>vente_dujour" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-file"></i>vente du jour</a-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mySmallModalLabel">Choisir la date du vente</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form class="form-horizontal p-t-20" id="rapport_ventejour" method="post" action="<?=WEBROOT;?>vente_dujour">
                        <div class="modal-body">
                             <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">Date vente</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <input type="date" class="form-control" name="ventejour" value="<?=date('Y-m-d')?>"  id="ventejour">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                <button class="btn btn-info waves-effect text-left" onclick="getventejour($('#ventejour').val())" data-dismiss="modal"><i class="fa fa-check"></i>Enregistrer
                    </button>
                <button type="button" class="btn btn-dark waves-effect text-left" data-dismiss="modal" ><i class="mdi mdi-close-circle-outline" ></i>Fermer</button>
            </div>
        </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
           
     <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus-circle"></i>rapport vente journalier</button>

    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lgs"><i class="fa fa-file"></i>raport mensuel</button>
                
    <div class="modal fade bs-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lgs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Generer rapport vente mensuelle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                     <form class="form-horizontal p-t-20" id="rapport_vente_mensuelle" method="post" action="<?=WEBROOT;?>ventemensuelle">
                    <div class="row">
                       
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Mois</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <select class="form-control" name="mois" id="mois">
                                            <option value="1">Janvier</option>
                                            <option value="2">Fevrier</option>
                                            <option value="3">Mars</option>
                                            <option value="4">Avril</option>
                                            <option value="5">Mai</option>
                                            <option value="6">Juin</option>
                                            <option value="7">Juillet</option>
                                            <option value="8">Aout</option>
                                            <option value="9">Septembre</option>
                                            <option value="10">Octobre</option>
                                            <option value="11">Novembre</option>
                                            <option value="12">Decembre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Année </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                        <input type="text" data-mask="9999" class="form-control" name="annee" id="annee" value="<?php echo date('Y')?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            <div class="modal-footer">
                <button type="button"  onclick="getvente_mensuelle($('#mois').val(),$('#annee').val())"  class="btn btn-success waves-effect text-left">Generer rapport de vente
                </button>
                <button type="button" class="btn btn-dark waves-effect text-left" data-dismiss="modal">Fermer</button>
            </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</div>
</div>
        </div>
        <div class="row">
    <div class="col-lg-12 col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <!-- FILTRE -->
                <div class="row">
                
                <div class="col-lg-2 col-md-3">
                    <div class="form-group">
                     <select class="form-control form-control-sm"  id="categorie">
                      <option>categorie vendeur</option>
                      <?php 
                     foreach ($vendeur->get_categorie_vendeur() as $value) 
                       {
                          ?>
                        <option value="<?php echo $value->statut?>"><?php echo $value->statut?></option>
                        <?php
                    }
                      ?>
                    </select>
                    </div>
                </div>
<div class="form-group row">
   
    <div class="col-sm-9">
        <div class="input-group">
            <div class="input-group-prepend"></div>
            <select class="form-control form-control-sm"id="idvendeur">
                <option>vendeur</option>
                <?php
                //$i =0;
                foreach ($vendeur->afficheTous_les_vendeurs() as $value) 
                {
                   // $i++;
                ?>
                
                <option value="<?php echo $value->ID_vendeur?>"><?php echo $value->nomVendeur." - " .$value->statut?></option>
                <?php
                }

                ?>
            </select>
            </div>
        </div>
    </div>
                 <div class="col-lg-2 col-md-3">
                    <div class="form-group">
                     <input type="date" class="form-control form-control-sm"  id="datecreation">
                      
                    </div>
                </div>
                       <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="row">
                                           
                                            <div class="form-group col-sm-9">
                                                <select id="mois_vente" name="mois_vente" class="form-control form-control-sm">
                                                    <option>Mois</option>
                                                    <option value="1">Janvier</option>
                                                    <option value="2">Fevrier</option>
                                                    <option value="3">Mars</option>
                                                    <option value="4">Avril</option>
                                                    <option value="5">Mai</option>
                                                    <option value="6">Juin</option>
                                                    <option value="7">Juillet</option>
                                                    <option value="8">Aout</option>
                                                    <option value="9">Septembre</option>
                                                    <option value="10">Octobre</option>
                                                    <option value="11">Novembre</option>
                                                    <option value="12">Decembre</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="row">
                                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Annee</label>
                                            <div class="form-group col-sm-9">
                                                <input type="number" id="annee_vente" name="annee_vente" value="<?php echo date('Y')?>" class="form-control form-control-sm" min="<?=$annee?>" max="<?=$annee+1?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
               
                <div class="col-lg-1 col-md-1">
                    <button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onclick="filtre_ventes($('#categorie').val(),$('#idvendeur').val(),$('#datecreation').val(),$('#mois_vente').val(),$('#annee_vente').val())"><i class="ti ti-filter"></i> Filtrer</button>
                </div>
                <div class="col-lg-1 col-md-1">
                    <button type="button" class="btn waves-effect waves-light  btn-sm btn-dark" onclick="resetFiltrevente()"><i class="mdi mdi-refresh"></i> Reset</button>
                </div>
            </div>
                <input type="text" id="page" value="paiement" hidden="">
        <div class="table-responsive m-t-0">
            <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                 <th>Categorie</th>
                                 <th>Vendeur</th>
                                <th>Produit</th>
                               
                                <th>Quanté recu </th>
                                <th>Quantité vendue</th>
                                <th>Quantité remise</th>
                                <th>Montant</th>
                                  <th>Autre frais</th>
                                   <th>Manquant</th>
                                   <th>Dette</th>
                   
                                  <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                               
                               <th>Categorie</th>
                                 <th>Vendeur</th>
                                <th>Produit</th>
                               
                                <th>Quanté recu </th>
                                <th>Quantité vendue</th>
                                <th>Quantité remise</th>
                                <th>Montant</th>
                                  <th>Autre frais</th>
                                   <th>Manquant</th>
                                   <th>Dette</th>
                   
                                  <th>Date</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="rep">
                            <?php 
                            
                            $i = 0;
                            foreach($vente->getVentes() as $value)
                            {
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $value->statut?></td>
                                <td><?php echo $value->nomVendeur?></td>
                                <td><?php echo $value->nom_categorie?></td>
                                
                                <td><?php echo $value->quantite_totale?></td>
                                <td><?php echo $value->quantite_vendue?></td>
                                <td><?php echo $value->quantite_retour?></td>
                                <td><?php echo $value->montant?>    FBU</td>
                                <td><?php echo $value->frais_divers?>    FBU</td>
                                <td><?php echo $value->manquant?>    FBU</td>
                                <td><?php echo $value->dette?></td>
                          

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
                           <!-- php   END FOREACH-->
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