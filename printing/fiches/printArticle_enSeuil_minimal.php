
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
		$this->Cell(150,5,'Le '.date('d-m-Y'),0,1,'R');
		$this->Ln(5);
		$this->Cell(100,10,'',0,1,'L');
		$this->Ln(2);
		$this->Cell(60,5,'',0,0,'C');
		$this->SetFont('Arial','B',14);
		
		$this->Cell(40,5,' ARTICLE EN SEUIL MINIMAL ',0,1,'C');
		
		
	}
	function footer()
	{	
	}
	function headerTable()
	{
			

		                	
		
		$this->Ln(15);
		$this->SetFont('Arial','',10);
		$this->Ln(5);

		$this->SetFillColor(102,205,170);

		$this->Cell(10,8,'No',1,0,'C',1);
		$this->Cell(50,8,'Libelle',1,0,'C',1);
		$this->Cell(30,8,'Article',1,0,'C',1);
		$this->Cell(20,8,'Quantite',1,0,'C',1);
		$this->Cell(15,8,'Seuil',1,0,'C',1);
		$this->Cell(28,8,'Date stockage',1,1,'C',1);
	}
	function viewTable($stock)
	{
		$this->SetFont('Arial','',8);
		$i =0;
 
		foreach ($stock->article_en_seuil_minimal() as $value)  
		{ $i++;
			$this->Cell(10,8,$i,1,0);

			$this->Cell(50,8,$value->LIBELLE,1,0);
			$this->Cell(30,8,$value->ARTICLE,1,0);
			$this->Cell(20,8,$value->quantite,1,0);
			$this->Cell(15,8,$value->SEUIL,1,0);
			$this->Cell(28,8,$value->date_stock,1,1);
		}

		//$this->Ln(5);
		//$this->Cell(120,8,'Total general  :',0,0);
		//$this->Cell(120,8,'    '.$tot_gen.'FBU',0,0);
		
	}
}

$pdf = new myPDF();
$pdf->SetLeftMargin(30.0);
$pdf->AliasNbPages();
//$pdf->init();
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($stock);
$pdf->Output();
?>
