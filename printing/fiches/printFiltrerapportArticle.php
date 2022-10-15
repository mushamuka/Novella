
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
		$this->Cell(40,5,'',0,0,'C');
		$this->SetFont('Arial','B',14);
		
		$this->Cell(40,5,' ARTICLE DISPONIBLE ',0,1,'C');
		
		//$this->Line(24,40,186,40);
	}
	function footer()
	{	
	}
	function headerTable()
	{
			

		                	
		
		$this->Ln(10);
		$this->SetFont('Arial','',10);
		$this->Ln(5);

		$this->SetFillColor(102,205,170);

		$this->Cell(8,8,'No',1,0,'C',1);
		$this->Cell(22,8,'Date creation',1,0,'C',1);
		$this->Cell(30,8,'LIBELLE',1,0,'C',1);
		$this->Cell(20,8,'Article',1,0,'C',1);
		$this->Cell(18,8,'Nb/casier',1,0,'C',1);
		$this->Cell(22,8,'Prix achat',1,0,'C',1);
		$this->Cell(22,8,'Prix de vente',1,0,'C',1);
		$this->Cell(30,8,'Commentaire',1,1,'C',1);
		
		//$this->Cell(42,8,'Date production',1,1);
	}
	function viewTable($stock,$cond)
	{
		$this->SetFont('Arial','',8);
		$i =0;
 
		foreach ($stock->filtre_article($cond) as $value)  
		{ $i++;
			$this->Cell(8,8,$i,1,0);

			$this->Cell(22,8,$value->DATECREAT,1,0);
			$this->Cell(30,8,$value->LIBELLE,1,0);
			$this->Cell(20,8,$value->ARTICLE,1,0);
			$this->Cell(18,8,$value->NB_CASIER,1,0);
			$this->Cell(22,8,$value->PRIX_ACHAT,1,0);
			$this->Cell(22,8,$value->PRIX_VENTE,1,0);
			$this->Cell(30,8,$value->DESCRIPTION,1,1);
		}

		//$this->Ln(5);
		//$this->Cell(120,8,'Total general  :',0,0);
		//$this->Cell(120,8,'    '.$tot_gen.'FBU',0,0);
		
	}
}

$pdf = new myPDF();
$pdf->SetLeftMargin(25.0);
$pdf->AliasNbPages();
//$pdf->init();
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($stock,$cond);
$pdf->Output();
?>
