
<?php
//define('FPDF_FONTPATH','/opt/lampp/htdocs/novella/printing/fiches/font');
define('FPDF_FONTPATH',ROOT.'printing/fiches/font');
require('fpdf.php');
//define('FPDF_FONTPATH','fpdf/font/');

/**
 * 
 */
class myPDF extends FPDF
{
	var $date_control;
	var $libelle;
	function init($libelle,$date_control)
	{
		$this->date_control = $date_control;
		$this->libelle = $libelle;
	}
	function getlibelle()
	{
		return $this->libelle;
	}
	function getdate_control()
	{
		return $this->date_control;
	}
	


	function header()
	{
		$this->image('printing/fiches/alain.jpg',15.0,10,40);
		//$this->setMargins(10,100);
		$this->SetFont('Arial','',14);
		$this->Ln(2);
		$this->Cell(150,5,'Le '.date('d-m-Y'),0,1,'R');
		$this->Ln(5);
		//$this->Cell(100,10,'',0,1,'L');
		$this->Ln(30);
		$this->Cell(20,5,'',0,0,'C');
		$this->SetFont('Arial','B',12);
		
		$this->Cell(80,5,' DETAIL CONTROL POUR CATEGORIE '.$this->getlibelle().' du '. $this->getdate_control(),0,1,'C');
		
		
	}
	function footer()
	{	
	}
	function headerTable()
	{
			

		                	
		
		$this->Ln(10);
		$this->SetFont('Arial','',9);
		$this->Ln(5);

		$this->SetFillColor(102,205,170);

		$this->Cell(10,5,'No',1,0,'C',1);
		$this->Cell(25,5,'Article',1,0,'C',1);
		//$this->Cell(30,5,'Qte dispo apres control',1,0,'C',1);
		$this->Cell(25,5,'Quantite vendue',1,0,'C',1);
		//$this->Cell(25,5,'Gain',1,0,'C',1);
		$this->Cell(30,5,'Benefice',1,1,'C',1);
	}
	function viewTable($recuper_data)
	{
		$this->SetFont('Arial','',8); 
		$i =0;
 		$total =0;
		foreach ($recuper_data as $value)  
		{ $i++;
			$gain_b =($value->PRIX_VENTE * $value->NB_CASIER - $value->PRIX_ACHAT) / $value->NB_CASIER;

			$this->Cell(10,5,$i,1,0);
			$this->Cell(25,5,$value->ARTICLE,1,0);
			//$this->Cell(30,5,$value->quantite_rencontre,1,0);
			$this->Cell(25,5,$value->quantite_vendue,1,0);
			//$this->Cell(25,5,$gain_b,1,0);
			$this->Cell(30,5,$gain_b * $value->quantite_vendue.' FBU',1,1);

			$total += $gain_b * $value->quantite_vendue;
		}
		$this->Ln(5);
		$this->Cell(25,5,'Total',0,0,'C',1);
		$this->Cell(60,5,'',0,0);
		$this->Cell(80,5,$total." FBU",0,0);
		
	}
}

$pdf = new myPDF();
$pdf->SetLeftMargin(45.0);
$pdf->AliasNbPages();
$pdf->init($libelle,$date_control);
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($recuper_data);
$pdf->Output();
?>
