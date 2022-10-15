
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
	var $mois;
	var $annee;
	function init($mois,$annee)
	{
		
		$this->mois = $mois;
		$this->annee = $annee;
	}
	
	function getMois()
	{
		return $this->mois;
	}
	function getAnnee()
	{
		return $this->annee;
	}


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
		
		$this->Cell(60,5,'VENTE MENSUELLE',0,1,'C');
		
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
		$this->Ln();
		$this->Cell(20,8,'Date vente',1,0);
		$this->Cell(34,8,'Agent',1,0);
		$this->Cell(20,8,'Produit',1,0);
		$this->Cell(18,8,'QteVendu',1,0);
		$this->Cell(19,8,'QteRetour',1,0);
		$this->Cell(20,8,'Manquant',1,0);
		$this->Cell(20,8,'Montant',1,0);
		$this->Cell(24,8,'Total produit',1,1);
	}
	function viewTable($vente)
	{
		$this->SetFont('Arial','',8);
		$QteVendu =0;
		$QteRetour =0;
		$Manquant =0;
		$Montant =0;
		$totalpro =0;

		foreach ($vente->get_vente_mensuelle($this->getMois(),$this->getAnnee()) as $value) 
		{
			$QteVendu += $value->quantite_vendue;
			$QteRetour += $value->quantite_retour;
			$Manquant += $value->manquant;
			$Montant += $value->montant;
			$totalpro += $value->totalproduit;
			
			$this->Cell(20,8,$value->date_vente,1,0);
			$this->Cell(34,8,$value->nomVendeur.'_'.$value->prenom,1,0);
			$this->Cell(20,8,$value->nom_categorie,1,0);
			$this->Cell(18,8,$value->quantite_vendue,1,0);
			$this->Cell(19,8,$value->quantite_retour,1,0);
			$this->Cell(20,8,$value->manquant .'_'.'FBU',1,0);
			$this->Cell(20,8,$value->montant .'_'.'FBU',1,0);
			$this->Cell(24,8,$value->totalproduit,1,1); 
		  	
		}

		$this->Cell(54,8,'Total produit ',1,0,'L');
		//$this->Cell(20,8,'',0,0);
		$this->Cell(20,8,'',1,0);
		$this->Cell(18,8,$QteVendu,1,0);
		$this->Cell(19,8,$QteRetour,1,0);
		$this->Cell(20,8,$Manquant .'_'.'FBU',1,0);
		$this->Cell(20,8,$Montant.'_'.'FBU',1,0);
		$this->Cell(24,8,$totalpro,1,1);
/*
		$this->Cell(54,8,'Total produit 300',1,0,'L');
		//$this->Cell(20,8,'',0,0);
		$this->Cell(20,8,'Produit',1,0);
		$this->Cell(18,8,'QteVendu',1,0);
		$this->Cell(19,8,'QteRetour',1,0);
		$this->Cell(20,8,'Manquant',1,0);
		$this->Cell(20,8,'Montant',1,0);
		$this->Cell(24,8,'55',1,1,'R');*/
		$this->Ln(15);
		
		
	}
}

$pdf = new myPDF();
$pdf->SetLeftMargin(18.0);
$pdf->AliasNbPages();
$pdf->init($mois,$annee);
$pdf->AddPage();
$pdf->headerTable();
//$pdf->SetWidths(array(20,30,20,15,15,20,20,24));
$pdf->viewTable($vente);
$pdf->Output();
?>
