
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
	/*var $nomBanque;
	var $montant;
	function init()
	{
		$this->nomBanque = $nomBanque;
		$this->montant = $montant;
	}
	function getNombanque()
	{
		return $this->nomBanque;
	}
	function getMontant()
	{
		return $this->montant;
	}
	*/


	function header()
	{
		$this->image('printing/fiches/alain.jpg',15.0,10,40);
		//$this->setMargins(10,100);
		$this->SetFont('Arial','',14);
		$this->Ln(2);
		$this->Cell(150,5,'Le '.date('d-m-Y h:m:s'),0,1,'R');
		$this->Ln(5);
		$this->Cell(100,10,'',0,1,'L');
		$this->Ln(2);
		$this->Cell(40,5,'',0,0,'C');
		$this->SetFont('Arial','B',14);
		
		$this->Cell(40,5,' CONTROL BRARUDI ',0,1,'C');
		
		
	}
	function footer()
	{	
	}
	function headerTable()
	{
		              	
		
		$this->Ln(10);
		$this->SetFont('Arial','',9);
		

		$this->SetFillColor(102,205,170);

		$this->Cell(10,8,'No',1,0,'C',1);
		
		$this->Cell(25,8,'Article',1,0,'C',1);
		$this->Cell(25,8,'Quantite total',1,0,'C',1);
		$this->Cell(25,8,'Quantite existante',1,0,'C',1);
		$this->Cell(25,8,'Quantite vendue',1,0,'C',1);
		$this->Cell(28,8,'Gain',1,1,'C',1);
	}
	function viewTable($stock,$idcat)
	{
		$this->SetFont('Arial','',8); 
		$i =0;
		$total =0;
 
		foreach ($stock->Affiche_detail_control($idcat) as $value)  
		{ $i++;
			$this->Cell(10,5,$i,1,0);

			//$this->Cell(24,5,$value->LIBELLE,1,0);
			$this->Cell(25,5,$value->ARTICLE,1,0);
			$this->Cell(25,5,$value->quantite_initiale,1,0);
			$this->Cell(25,5,$value->quantite_rencontre,1,0);
			$this->Cell(25,5,$value->quantite_vendue,1,0);
			$this->Cell(28,5,'',1,1);
			$total += $value->quantite_vendue;
		}
		$this->Ln(5);
		$this->SetFont('Arial','B',10);
		$this->Cell(30,8,'Total vendue :',0,0);
		$this->Cell(79,8,'-------------------------------------------->',0,0);
		$this->Cell(25,5,$total.' Bouteilles',1,0,'C',1);
		
	}
}

$pdf = new myPDF();
$pdf->SetLeftMargin(30.0);
$pdf->AliasNbPages();
//$pdf->init();
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($stock,$idcat);
$pdf->Output();
?>
