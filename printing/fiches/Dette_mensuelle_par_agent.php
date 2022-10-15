
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
	var $agent;
	var $mois;
	var $annee;
	function init($agent,$mois,$annee)
	{
		$this->agent = $agent;
		$this->mois = $mois;
		$this->annee = $annee;
	}
	function getAgent()
	{
		return $this->agent;
	}
	function getMois()
	{
		return $this->mois;
	}
	function getAnnee()
	{
		return $this->annee;
	}
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
		$this->Cell(140,5,'Le '.date('d-m-Y'),0,1,'R');
		$this->Ln(5);
		$this->Cell(80,10,'',0,1,'L');
		$this->Ln(20);
		//$this->Cell(60,5,'',0,0,'C');
		$this->SetFont('Arial','B',14);
		
		$this->Cell(120,5,"DETTE DE L'AGENT",0,1,'C');
		
		//$this->Line(24,40,186,40);
	}
	function footer()
	{	
	}
	function headerTable()
	{
			

		                	
		
		$this->Ln(20);
		$this->SetFont('Arial','',10);
		//$this->Cell(70,8,'Generer le '.date("F j, Y, g:i a"), 0,1,'C');
		$this->Ln(5);
		$this->Cell(20,8,'Date vente',1,0);
		$this->Cell(34,8,'Agent',1,0);
		$this->Cell(20,8,'Produit',1,0);
		$this->Cell(35,8,'Dette ',1,1);
	}
	function viewTable($vente)
	{
		$this->SetFont('Arial','',8);
		
		$mois = [1=>'Janvier',2=>'Fevrier',3=>'Mars',4=>'Avril',5=>'Mai',6=>'Juin',7=>'Juillet',8=>'Aout',9=>'Septembre',10=>'Octobre',11=>'Novembre',12=>'Decembre'];
		$i =0;
		$totaldette = 0;
		
		//$this->Cell(22,5,'agent: '.$this->getAgent().'mois: '.$this->getMois().' annee: '.$this->getAnnee(),1,1);
		foreach ($vente->rapport_dette_agent($this->getAgent(),$this->getMois(),$this->getAnnee()) as $value) 
		{   
			$i++;
			$nom = $value->nomVendeur;
			$totaldette += $value->dette;
					$date = date_parse($value->date_vente);
				 
					$this->Cell(20,5,$date['day'].'/'.$mois[$date['month']],1,);
					$this->Cell(34,5,$value->nomVendeur.'_'.$value->prenom,1,0);
					$this->Cell(20,5,$value->nom_categorie,1,0);
					$this->Cell(35,5,$value->dette .'_'.'FBU',1,1,'R');
		  	
		}			//$this->Ln(3);
					$this->Cell(20,5,'Dette totale',1,0);
					$this->Cell(89,5,$totaldette .'_'.'FBU',1,1,'R');
	}
}

$pdf = new myPDF();
$pdf->SetLeftMargin(50.0);
$pdf->AliasNbPages();
//$pdf->init();
$pdf->AddPage();
$pdf->headerTable();
$pdf->init($agent,$mois,$annee);
$pdf->viewTable($vente);
$pdf->Output();
?>
