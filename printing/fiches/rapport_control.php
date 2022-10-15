
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
		$this->Cell(160,5,'Le '.date('d-m-Y'),0,1,'R');
		$this->Ln(5);
		$this->Cell(100,10,'',0,1,'L');
		$this->Ln(2);
		$this->Cell(60,5,'',0,0,'C');
		$this->SetFont('Arial','B',14);
		
		$this->Cell(60,5,' ACHAT JOURNALIER',0,1,'C');
		
		//$this->Line(24,40,186,40);
	}
	function footer()
	{	
	}
	function headerTable()
	{
			

		                	
		
		$this->Ln(30);
		$this->SetFont('Arial','',10);
		//$this->Cell(70,8,'Generer le '.date("F j, Y, g:i a"), 0,1,'C');
		$this->Ln(5);
		$this->Cell(24,8,'Date achat',1,0);
		$this->Cell(30,8,'Article',1,0);
		$this->Cell(38,8,'Quantite',1,0);
		$this->Cell(32,8,'Prix unitaire',1,0);
		$this->Cell(24,8,'Prix total',1,1);
		//$this->Cell(42,8,'Date production',1,1);
	}
	function viewTable($achat,$jourachat_selectionne)
	{
		$this->SetFont('Arial','',8);
		$tot_gen =0;
 
		/*foreach ($achat->rapport_achatpar_mois($jourachat_selectionne) as $value) 
		{
			$this->Cell(24,8,$value->date_achat,1,0);
			$this->Cell(30,8,$value->nom,1,0);
			$this->Cell(38,8,$value->quantite,1,0);
			$this->Cell(32,8,$value->prix.'FBU',1,0);
			$this->Cell(24,8,$value->total.'FBU',1,1);
			$tot_gen +=$value->total;
		}*/

		$this->Ln(5);
		$this->Cell(120,8,'Total general  :',0,0);
		$this->Cell(120,8,'    '.$tot_gen.'FBU',0,0);
		
	}
}

$pdf = new myPDF();
$pdf->SetLeftMargin(30.0);
$pdf->AliasNbPages();
//$pdf->init();
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable(/*$achat,$jourachat_selectionne*/);
$pdf->Output();
?>
