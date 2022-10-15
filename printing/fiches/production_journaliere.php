
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
		$this->Cell(190,5,'Le '.date('d-m-Y'),0,1,'R');
		$this->Ln(5);
		$this->Cell(100,10,'',0,1,'L');
		$this->Ln(2);
		$this->Cell(60,5,'',0,0,'C');
		$this->SetFont('Arial','B',14);
		
		$this->Cell(60,5,' PRODUCTION JOURNALIERE ',0,1,'C');
		
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
		$this->Cell(24,8,'Article',1,0);
		$this->Cell(30,8,'Quantite produite',1,0);
		$this->Cell(38,8,'heure_debut',1,0);
		$this->Cell(32,8,'heure_fin',1,0);
		$this->Cell(24,8,'heure_totale',1,0);
		$this->Cell(42,8,'Date production',1,1);
	}
	function viewTable($production,$jourproduction)
	{
		$this->SetFont('Arial','',8);
		$total = 0;
		foreach ($production->affichage_productio_journaliere($jourproduction) as $value)  
		{
			//$total += $value->montant;
			$this->Cell(24,8,$value->nom_categorie,1,0);
			$this->Cell(30,8,$value->quantite_produite,1,0);
			$this->Cell(38,8,$value->heure_debut,1,0);
			$this->Cell(32,8,$value->heure_fin,1,0);
			$this->Cell(24,8,$value->heure_totale,1,0);
			$this->Cell(42,8,$value->date_production,1,1);
			//$this->Cell(22,8,'    BIF',1,0);
		  	//$this->Cell(22,8,'    USD',1,1);
		  	
		}
		
	}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
//$pdf->init();
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($production,$jourproduction);
$pdf->Output();
?>
