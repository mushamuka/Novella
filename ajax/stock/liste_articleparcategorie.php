 <?php
require_once("../../modele/stock.class.php");
require_once("../../modele/connection.php");
$stock = new Stock();

if ($_GET['article'] > 0)
{
	?>
<div class="form-group row">
	<label for="exampleInputuname3" class="col-sm-3 control-label">Article</label>
	<div class="col-sm-9">
		<select class="form-control" id="id_article">
			<?php $i =0;
			foreach ($stock->get_article($_GET['article']) as $data)
				{ 
					$i++;
					?>
					<option></option>
					<option value="<?php echo $data->ID?>">
						<?php echo  $data->ARTICLE?>
							
						</option>
						<?php
					}
					?>
					</select>
					</div>
					</div>
					<?php
				}
				?>

 