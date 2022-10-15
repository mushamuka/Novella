<?php 
require_once("../../modele/stock.class.php");
require_once("../../modele/connection.php");
$stock = new Stock();
?>

<div class="row">
    <div class="col-lg-12 col-md-6">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Article</th>
                        
                        <th>Quantite</th>


                    </tr>
                </thead> 
               
                <tbody id="rep">
                    <?php $i =0;
                    foreach ($stock->recupereTout_article_par_categorie($_GET['categorie']) as $value) 
                    {
                       
                            ?>
                            <tr>
                            <td><input type="text" class="form-control" value="<?php echo $value->ID?>" id="id_article<?=$i?>" hidden><?php echo $value->ARTICLE?></td>
                           
                            <td>
                                 <input type="text" class="form-control" value="<?php echo $value->quantite?>" id="qte_disponible_en_stcok<?=$i?>" hidden >
                                <input type="number" class="form-control" id="quantite_ajoute<?=$i?>">
                            </td>
                        </tr>
                            <?php
                        
                   
                        ?>
                        
                    <?php
                        $i++;
                    }
                    ?>
                   <!-- COMPTEUR I--><input type="text" value="<?=$i?>" id="nb_article"hidden>
                </tbody>
            </table>
        </div>
    </div>
</div>