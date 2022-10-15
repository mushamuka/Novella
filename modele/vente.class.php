 <?php
//require_once('/modele/connection.php');
/**
 * 
 */
class Vente 
{
	function creevente($produit,$vendeur,$qtetotale,$qtevendue,$qteretour,$montant,$manquant,$datevente,$frais_divers,$note,$dette)
	{
		$con = getconnection();
		$querry = $con->prepare("INSERT INTO vente(ID_categorieP,ID_vendeur,quantite_totale,quantite_vendue,quantite_retour,montant,manquant,date_vente,frais_divers,note,dette)
			VALUES(:produit,:vendeur,:qtetotale,:qtevendue,:qteretour,:montant,:manquant,:datevente,:frais_divers,:note,:dette)");
		$rs = $querry->execute(array('produit'=>$produit,'vendeur'=>$vendeur,'qtetotale'=>$qtetotale,'qtevendue'=>$qtevendue,'qteretour'=>$qteretour,'montant'=>$montant,'manquant'=>$manquant,'datevente'=>$datevente,'frais_divers'=>$frais_divers,'note'=>$note,'dette'=>$dette)) or die(print_r($querry->errorInfo()));
		return $rs;
	}
	function updatevente($idvente,$qtetotale,$qtevendue,$qteretour,$montant,$datevente,$frais_divers,$note)
	{
		$con = getconnection();
		$querry= $con->prepare("UPDATE vente SET quantite_totale = :qtetotale,quantite_vendue = :qtevendue,quantite_retour = :qteretour,montant = :montant,date_vente = :datevente,frais_divers = :frais_divers,note= :note WHERE ID_vente = :idvente");
		$rs = $querry->execute(array('qtetotale' => $qtetotale,'qtevendue' => $qtevendue,'qteretour' => $qteretour,'montant' => $montant,'datevente' => $datevente,'frais_divers' => $frais_divers,'note' => $note,'idvente'=>$idvente)) or die(print_r($querry->errorInfo()));
		return $rs;
	}
	function getMontantVenduParCategorieDunMois($mois,$annee)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT nom_categorie,SUM(montant) AS montant FROM vente v,categorieproduction cp WHERE v.ID_categorieP = cp.ID_categorieP AND MONTH(date_vente) = :mois AND YEAR(date_vente) = :annee GROUP BY cp.ID_categorieP");
		$query->execute(['mois' => $mois,'annee' => $annee]) or die(print_r($query->errorInfo()));
		$res = $query->fetchAll(PDO::FETCH_OBJ);
		return $res;
	}
	function getVentes()
	{
		$con = getconnection();
		$query = $con->prepare("SELECT v.ID_vente,cat.nom_categorie,vend.statut,vend.nomVendeur,v.manquant,v.quantite_totale,v.quantite_vendue,v.quantite_retour,v.montant,v.date_vente,v.frais_divers,v.note,v.dette FROM vente v,vendeur vend,categorieproduction cat WHERE vend.ID_vendeur = v.ID_vendeur AND v.ID_categorieP = cat.ID_categorieP");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = $query->fetchAll(PDO::FETCH_OBJ);
		return $res;
	}
	function suppression_vente($numvente)
	{
		$con = getconnection();
		$query = $con->prepare("DELETE FROM vente WHERE ID_vente = ?");
		$rs = $query->execute(array($numvente)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	function rapport_vente()
	{
		$con = getconnection();
		$querry = $con->prepare('SELECT SUM(vente.quantite_totale) AS quantite_totale,categorieproduction.nom_categorie,vente.quantite_vendue,vente.quantite_retour,vente.manquant,vente.montant FROM production,categorieproduction,vente WHERE production.ID_categorieP = categorieproduction.ID_categorieP AND vente.ID_categorieP =categorieproduction.ID_categorieP AND categorieproduction.nom_categorie ="produit 200" ');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject()) {
			$rs[] = $data;
		}
		return $rs;
	}
	function rapport_vente300()
	{
		$con = getconnection();
		$querry = $con->prepare('SELECT SUM(vente.quantite_totale) AS quantite_totale,categorieproduction.nom_categorie,vente.quantite_vendue,vente.quantite_retour,vente.manquant,vente.montant FROM production,categorieproduction,vente WHERE production.ID_categorieP = categorieproduction.ID_categorieP AND vente.ID_production =production.ID_production AND categorieproduction.nom_categorie ="produit 300"');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject()) {
			$rs[] = $data;
		}
		return $rs;
	}
    function vente_dun_agent()
    {
    
		$con = getconnection();
		$querry = $con->prepare('SELECT SUM(vente.quantite_totale) AS quantite_recu,vendeur.nomVendeur,vendeur.prenom,categorieproduction.nom_categorie,vente.quantite_vendue,vente.quantite_retour,vente.manquant,vente.montant FROM vendeur,production,categorieproduction,vente WHERE production.ID_categorieP = categorieproduction.ID_categorieP AND vente.ID_production =production.ID_production AND vendeur.ID_vendeur =vente.ID_vendeur GROUP BY categorieproduction.ID_categorieP');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject()) {
			$rs[] = $data;
		}
		return $rs;
    }
    
    function getvente_journaliere($jour)
		{
		$con = getconnection();
		$query = $con->prepare('SELECT vente.date_vente,vendeur.nomVendeur,vendeur.prenom,categorieproduction.nom_categorie,vente.quantite_vendue,vente.quantite_retour,vente.manquant,vente.montant, SUM(quantite_totale) AS totalproduit FROM vendeur,production,categorieproduction,vente WHERE production.ID_categorieP = categorieproduction.ID_categorieP AND vente.ID_categorieP = categorieproduction.ID_categorieP AND vendeur.ID_vendeur =vente.ID_vendeur AND vente.date_vente =? GROUP BY vente.ID_vente');

		$query->execute(array($jour)) or die(print_r($query->errorInfo()));
		$rs = array();
		while ($data = $query->fetchObject()) {
			$rs[] = $data;
		}
		return $rs;
		}
		 function getquantitevendue($jour)
		{
		$con = getconnection();
		$query = $con->prepare('SELECT SUM(quantite_vendue) AS quantite FROM `vente` ,categorieproduction WHERE vente.ID_categorieP = categorieproduction.ID_categorieP AND categorieproduction.nom_categorie ="produit200" AND date_vente = ?');

		$query->execute(array(date('Y-m-d'))) or die(print_r($query->errorInfo()));
		$rs = array();
		while ($data = $query->fetchObject()) {
			$rs[] = $data;
		}
		return $rs;
		}

    function retourvente200($mois,$annee)
	{
		$con =getconnection();
		$query =$con->prepare("SELECT SUM(quantite_retour) AS quantite FROM `vente`,categorieproduction WHERE vente.ID_categorieP =categorieproduction.ID_categorieP AND MONTH(date_vente) = :mois AND  YEAR(date_vente) = :annee AND categorieproduction.nom_categorie='produit200'");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		return $query;
	}
	function retourvente300($mois,$annee)
	{
		$con =getconnection();
		$query =$con->prepare("SELECT SUM(quantite_retour) AS quantite FROM `vente`,categorieproduction WHERE vente.ID_categorieP =categorieproduction.ID_categorieP AND MONTH(date_vente) = :mois AND  YEAR(date_vente) = :annee AND categorieproduction.nom_categorie='produit300'");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		return $query;
	}
	function vente200($mois,$annee)
	{
		$con =getconnection();
		$query =$con->prepare("SELECT SUM(montant) AS montant FROM `vente`,categorieproduction WHERE vente.ID_categorieP = categorieproduction.ID_categorieP AND MONTH(date_vente) = :mois AND  YEAR(date_vente) = :annee AND categorieproduction.nom_categorie = 'produit200'");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		return $query;
	}
	function vente300($mois,$annee)
	{
		$con =getconnection();
		$query =$con->prepare("SELECT SUM(montant) AS montant FROM `vente`,categorieproduction WHERE vente.ID_categorieP = categorieproduction.ID_categorieP AND MONTH(date_vente) = :mois AND  YEAR(date_vente) = :annee AND categorieproduction.nom_categorie = 'produit300'");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		return $query;
	}
	function getdepense_autrefrais($mois,$annee)
	{
		$con =getconnection();
		$query =$con->prepare("SELECT SUM(frais_divers) AS frais_divers FROM `vente` WHERE  MONTH(date_vente) = :mois AND  YEAR(date_vente) = :annee ");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		return $query;
	}
	function get_detteTotal_mensuelle($mois,$annee)
	{
		$con = getconnection();
		$query =$con->prepare("SELECT SUM(vente.manquant) AS dette FROM vente WHERE MONTH(date_vente) = :mois AND YEAR(date_vente) = :annee");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		return $query;
	}
	function dette_paragent($mois,$annee)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT SUM(vente.manquant) AS dette,vendeur.nomVendeur FROM vente,vendeur WHERE vente.ID_vendeur =vendeur.ID_vendeur AND MONTH(date_vente) = ? AND YEAR(date_vente) = ? GROUP BY vendeur.ID_vendeur");
		$query->execute(array($mois,$annee)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($valeur = $query->fetchObject()) 
		{
			$res[] = $valeur;
		}
		return $res;
	}
	function ventevendeur_mensuelle($mois,$annee)
	{
		$con = getconnection();
		$query =$con->prepare("SELECT SUM(vente.montant) AS montantVendu,vendeur.nomVendeur FROM vente,vendeur WHERE vente.ID_vendeur = vendeur.ID_vendeur AND MONTH(date_vente) = :mois AND YEAR(date_vente) = :annee GROUP BY vente.ID_vendeur");
		$query->execute(['mois' => $mois,'annee' => $annee]) or die(print_r($query->errorInfo()));
		$res = $query->fetchAll(PDO::FETCH_OBJ);
		return $res;
	}
	function rapport_dette_agent($agent,$mois,$annee)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT SUM(vente.manquant) AS dette,vendeur.nomVendeur,vendeur.prenom,date_vente,categorieproduction.nom_categorie FROM vente,vendeur,categorieproduction WHERE vente.ID_vendeur =vendeur.ID_vendeur AND categorieproduction.ID_categorieP = vente.ID_categorieP AND vendeur.ID_vendeur = ? AND MONTH(date_vente) = ? AND YEAR(date_vente) = ? GROUP BY vente.ID_vente");

		$query->execute(array($agent,$mois,$annee)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($valeur = $query->fetchObject()) 
		{
			$res[] = $valeur;
		}
		return $res;
	}
	function get_vente_mensuelle($mois,$annee)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT vente.date_vente,vendeur.nomVendeur,vendeur.prenom,categorieproduction.nom_categorie,vente.quantite_vendue,vente.quantite_retour,vente.manquant,vente.montant, SUM(quantite_totale) AS totalproduit FROM vendeur,production,categorieproduction,vente WHERE production.ID_categorieP = categorieproduction.ID_categorieP AND vente.ID_categorieP = categorieproduction.ID_categorieP AND vendeur.ID_vendeur =vente.ID_vendeur AND MONTH(vente.date_vente) = ? AND YEAR(vente.date_vente) = ? GROUP BY vente.ID_vente");
		$query->execute(array($mois,$annee)) or die(print_r($query->errorInfo()));
		$reponse = array();
		while ($data = $query->fetchObject()) 
		{
			$reponse[] = $data;
		}
		return $reponse;
	}
	function retour_mensuelle_par_agent($mois,$annee)
	{
		$con = getconnection();
		$query =$con->prepare("SELECT SUM(vente.quantite_retour) AS quantite,vendeur.nomVendeur FROM vente,vendeur WHERE vente.ID_vendeur = vendeur.ID_vendeur AND MONTH(date_vente) = :mois AND YEAR(date_vente) = :annee GROUP BY vente.ID_vendeur");
		$query->execute(['mois' => $mois,'annee' => $annee]) or die(print_r($query->errorInfo()));
		$res = $query->fetchAll(PDO::FETCH_OBJ);
		return $res;
	}




}