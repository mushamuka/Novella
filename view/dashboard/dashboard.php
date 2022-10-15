<?php
 ob_start();   
 $date = date_parse(date('Y-m-d'));

$l = false;
$c = false;
$m = false;
$s = false;
if ($d = $utilisateur->verifierPermissionDunePage('dashboard',$_SESSION['ID_utilisateur'])->fetch()) 
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Quantité produite par categorie</h6>
                <div id="morris-donut-chart_production"></div>
            </div>
        </div>
    </div>
    
    <!--div class="col-lg-3" >
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Quantite recu et montant vendue--Total autre frais pour le Boss--</h6>
                <div id="morris-donut-chart-vente"></div>
            </div>
        </div>
    </div-->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Etat de vente</h4>
                <div id="histogramme_vente"></div>
            </div>
        </div>
    </div>
   
  
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Synthese de quantite produite</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mois</th>
                                <th>Production 200</th>
                                <th>Production 300</th>
                                <th>Retour 200</th>
                                <th>Retour 300</th>
                            </tr>
                        </thead>
                        <tbody id="rep">
                        <?php                        
                            $resulta = array();

                             $mois = ['1','2','3','4','5','6','7','8','9','10','11','12'];

                            $tb_mois= [1=>'janvier',2=>'fevrier',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'aout',9=>'septembre',10=>'octobre',11=>'novembre',12=>'decembre'];
                            for ($i=1; $i < $date['month'] +1; $i++) 
                            { ?>
                                <tr>
                                    <td>
                                        <?php 
                                        echo $tb_mois[$i];
                                        ?>   
                                    </td>
                                <td>
                                    
                                    <?php
                                    $qteproduite = $production->production200($i,$annee = date('Y'))->fetch();
                                     if (!empty($qteproduite)) 
                                    {
                                        echo number_format($qteproduite['quantite'],);
                                    }
                                    else echo "0 ";

                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $qteproduite300 = $production->production300($i,$annee = date('Y'))->fetch();
                                    if (!empty($qteproduite300)) 
                                    {
                                        echo number_format($qteproduite300['quantite'],);
                                    }
                                    else echo "0 ";
                                    ?>
                                </td>
                                <td> 
                                    <?php
                                    $qtretour200 = $vente->retourvente200($i,$annee = date('Y'))->fetch();
                                     if (!empty($qtretour200)) 
                                    {
                                        echo number_format($qtretour200['quantite'],);
                                    }
                                    else echo "0 ";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $qtretour300 = $vente->retourvente300($i,$annee = date('Y'))->fetch();
                                     if (!empty($qtretour300)) 
                                    {
                                        echo number_format($qtretour300['quantite'],);
                                    }
                                    else echo "0 ";
                                    ?>  
                                </td>
                       <?php
                        }?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rapport vente mensuelle par agent</h4>
                <div id="histogramme_ventePar_agent"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail de depense</h4>
              
                <div class="table-responsive">
                    <table class="table full-color-table full-info-table hover-table">
                        <thead>
                            <tr>
                                <th>Mois</th>
                                <th>Achat</th>
                                <th>Production</th>
                                <th>Salaire</th>
                                <th>Autres frais</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                         <tbody id="reponse">
                            <input type="text" id="url" value="<?=WEBROOT?>rapportProduction" hidden>
                            <?php
                            $mois = ['1','2','3','4','5','6','7','8','9','10','11','12'];

                            $tb_mois= [1=>'janvier',2=>'fevrier',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'aout',9=>'septembre',10=>'octobre',11=>'novembre',12=>'decembre'];
                            $depenseTotale = 0;
                            for ($i=1; $i < $date['month'] +1; $i++) 
                            { ?>
                                <tr>
                                    <td>
                                        <?php 
                                        echo $tb_mois[$i];
                                        ?>   
                                    </td>
                                    <td>
                                    <?php
                                    $Total_achat = $achat->getmontant_achat_mensuel($i,$date['year'])->fetch();
                                    if (!empty($Total_achat)) 
                                    {
                                        echo number_format($Total_achat['montant'],) .' BIF';
                                        $depenseTotale +=$Total_achat['montant'];
                                    }
                                    else echo "0 BIF"; 
                                    ?>
                                    </td>
                                    <td>
                                    <?=$production->gretTempsTotalDeProductionParMois($i,$date['year'])?>
                                    </td>
                                    <td>
                                    
                                     <?php
                                    $Salaire_mensuel = $vendeur->getsalaire_vendeur($i,$date['year'])->fetch();
                                    if (!empty($Salaire_mensuel['salaire'])) 
                                    {
                                        $depenseTotale+=$Salaire_mensuel['salaire'];
                                        echo number_format($Salaire_mensuel['salaire'],) .'FBU';
                                    }
                                        else echo "0 FBU"; 
                                    ?>
                                    </td>
                                    <td>
                                    <?php
                                    $autrefrais = $vente->getdepense_autrefrais($i,$date['year'])->fetch();
                                    if (!empty($autrefrais)) 
                                    {
                                        echo number_format($autrefrais['frais_divers'],) .'FBU';
                                        $depenseTotale +=$autrefrais['frais_divers'];
                                    }
                                        //else echo "0 FBU"; 
                                    ?>
                                    </td>
                                    <td><?=number_format($depenseTotale).' BIF'?></td>
                            </tr>  
                            <?php
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
             <!--h4 class="card-title">Rapport mensuel de dette pour les travailleurs</h4>
                <form class="form-horizontal p-t-20">
                    <div class="row">
                        <div class="col-lg-5 col-md-10">
                            <div class="row">
                                <label for="exampleInputEmail3" class="col-sm-5 col-lg-4 control-label">Mois</label>
                                <div class="form-group col-sm-10 col-lg-8">
                                <select id="rapor_mois_courant" class="form-control">
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
                        <div class="col-lg-5 col-md-10">
                            <div class="row">
                                <label for="exampleInputEmail3" class="col-sm-5 col-lg-4 control-label"> Annee</label>
                                <div class="form-group col-sm-9 col-lg-8">
                                   <?php
                                     $date = date_parse(date('Y-m-d'));
                                     $annee = $date['year'];
                                    ?>
                                     <input type="text" id="rapor_annee_courant" value="<?=$annee?>" class="form-control">
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-2 col-md-10">
                            <div class="row">
                                
                                 <div class="form-group col-sm-9">
                                  <button type="button" class="btn waves-effect waves-light btn-md btn-info" _msthash="2884232" _msttexthash="299910"onclick="dette_vendeur($('#rapor_mois_courant').val(),$('#rapor_annee_courant').val())">valider</button>
                                 </div>
                            </div>
                        </div>
                    </div>
                </form-->
           
             <div class="card-body">
                <h4 class="card-title">Rapport mensuel de dette pour les travailleurs</h4>
                <div class="table-responsive">
                    <table class="table full-color-table full-info-table hover-table">
                        <thead>
                            <tr>
                                <!--th>Mois</th-->
                                <th>Agent</th>
                                <th>Dette</th>       
                            </tr>
                        </thead>
                        <tbody id="dette_vendeur">
                            <!--php/*
                             $rs =array();
                             
                            $mois = ['1','2','3','4','5','6','7','8','9','10','11','12'];

                            $tb_mois= [1=>'janvier',2=>'fevrier',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'aout',9=>'septembre',10=>'octobre',11=>'novembre',12=>'decembre'];
                            for ($i=1; $i < $date['month'] +1; $i++) 
                            { */-->
                                 <?php 
                                 $i =0;
                                foreach ($vente->dette_paragent($date['month'],$annee = date('Y')) as $rs) 
                                 {
                                    $i++;
                                    //$rs = $value;
                                    ?>
                                <tr>
                                    <td><?php echo $rs->nomVendeur;?></td>
                                    <td><?php echo $rs->dette;?></td>
                                </tr> 
                                     <?php
                                        }
                                     ?>     
                                     <tr>
                                        <td>Total dette par mois</td>
                                        <td><?php $total_dette = $vente->get_detteTotal_mensuelle($date['month'],$annee = date('Y'))->fetch();
                                                if (!empty($total_dette)) 
                                            {
                                                echo number_format($total_dette['dette'],) .' BIF';
                                            }
                                            else echo "0 BIF"; 
                                            ?>
                                        
                                        </td>
                                        
                                     </tr>      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> 
   

</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Synthese d'entreés</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mois</th>
                                <th>Production 200</th>
                                <th>Production 300</th>
                                <th>Depense</th>
                                <th>Vente</th>
                                <th>Solde</th>
                            </tr>
                        </thead>
                        <tbody id="rep">
                        <?php                        
                            $resulta = array();
                             $mois = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                            $tb_mois= [1=>'janvier',2=>'fevrier',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'aout',9=>'septembre',10=>'octobre',11=>'novembre',12=>'decembre'];
                            for ($i=1; $i < $date['month'] +1; $i++) 
                            { ?>
                                <tr>
                                    <td>
                                        <?php 
                                        echo $tb_mois[$i];
                                        ?>   
                                    </td>
                                <td>
                                    <?php
                                    $qteproduite = $production->production200($i,$annee = date('Y'))->fetch();
                                    if (!empty($qteproduite)) 
                                    {
                                        echo number_format($qteproduite['quantite']*200,).' BIF';
                                        //echo $qteproduite['quantite'];
                                    }
                                    else echo "0 BIF";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $qteproduite300 = $production->production300($i,$annee = date('Y'))->fetch();
                                    if (!empty($qteproduite300)) 
                                    {
                                        echo number_format($qteproduite300['quantite']*300,).' BIF';
                                    }
                                    else echo "0 BIF";
                                    ?>
                                </td>
                                <td> 
                                    <?php
                                    $qtretour200 = $vente->retourvente200($i,$annee = date('Y'))->fetch();
                                    if (!empty($qtretour200)) 
                                    {
                                        echo number_format($qtretour200['quantite'],);
                                    }
                                    else echo "0 ";
                                    ?>  
                                </td>
                                <td>
                                    <?php
                                    $qtretour300 = $vente->retourvente300($i,$annee = date('Y'))->fetch();
                                    if (!empty($qtretour300)) 
                                    {
                                        echo number_format($qtretour300['quantite'],);
                                    }
                                    else echo "0 BIF";
                                    ?>  
                                </td>
                                <td>
                                    <?php
                                   
                                     echo number_format($qteproduite300['quantite']*300,).' BIF';
                                     ?>
                                </td>
                        <?php
                        }?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Salaire mensuel par agent</h4>
                <div id="histogramme_salaire"></div>
            </div>
        </div>
         <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rapport retour mensuelle par agent</h4>
                <div id="histogramme_retour_par_agent"></div>
            </div>
        </div>
    </div>
    
</div>


<?php
$home_content = ob_get_clean();
require_once('view/home.view.php');
?>