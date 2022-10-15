<?php

/**
 * 
 */
class Production
{
	
	function newcategorieProduit($catgopro,$des_catego,$prixproduit)  
	{ 
                   
		$con = getconnection();
		$querry = $con->prepare('INSERT INTO categorieproduction(nom_categorie,motif,prix)
			VALUES(:catgopro,:des_catego,:prixproduit)');
		$rs = $querry->execute(array('catgopro'=>$catgopro,'des_catego' => $des_catego,'prixproduit'=>$prixproduit)) or die(print_r($querry->errorInfo()));
		return $rs;
	}          
	function cree_production($categorie,$heuredebut,$heurefin,$qteproduite,$dateproduction)
	{
		$con = getconnection();
		$querry = $con->prepare('INSERT INTO production(ID_categorieP,heure_debut,heure_fin,quantite_produite,date_production)
			VALUES(:categorie,:heuredebut,:heurefin,:qteproduite,:dateproduction)');
		$querry->execute(array('categorie' => $categorie,'heuredebut' => $heuredebut,'heurefin'=>$heurefin,'qteproduite'=>$qteproduite,'dateproduction'=>$dateproduction));
		$error = $querry->errorInfo();
		$rs = "";
		if ($error[1] == 1062) 
		{
			$rs = 'duplicate';
		}
		else 
		{
			$rs = 'ok';
		}
		return $rs;
	}
	function Ajouter_historique_production($categorie,$heuredebut,$heurefin,$qteproduite,$dateproduction)
		{
			$con = getconnection();
			$querry = $con->prepare('INSERT INTO historique_production(ID_categorieP,heure_debut,heure_fin,quantite_produite,date_production)
			VALUES(:categorie,:heuredebut,:heurefin,:qteproduite,:dateproduction)');
			$rs = $querry->execute(array('categorie' => $categorie,'heuredebut' => $heuredebut,'heurefin'=>$heurefin,'qteproduite'=>$qteproduite,'dateproduction'=>$dateproduction)) or die(print_r($querry->errorInfo()));
			return $rs;
		}



	function getcategorie_production()
	{
		$con = getconnection();
		$querry = $con->prepare('SELECT * FROM `categorieproduction`');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject()) {
			$rs[] = $data;
		}
		return $rs; 
	}
	function getcategorie_productiondans_vente()
	{
		$con = getconnection();
		$querry = $con->prepare('SELECT production.ID_production,SUM(production.quantite_produite) AS quantite,categorieproduction.nom_categorie,categorieproduction.ID_categorieP,prix FROM `categorieproduction`,production WHERE production.ID_categorieP = categorieproduction.ID_categorieP GROUP BY categorieproduction.ID_categorieP');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject()) {
			$rs[] = $data;
		}
		return $rs;
	}
	function rapport_production()
	{
		$con = getconnection();
		$querry = $con->prepare(' SELECT SUM(production.quantite_produite) AS nb,categorieproduction.nom_categorie FROM production,categorieproduction WHERE production.ID_categorieP = categorieproduction.ID_categorieP GROUP BY production.ID_categorieP
													');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject()) {
			$rs[] = $data;
		}
		return $rs;
	}
	function affiche_production()
	{
		$con = getconnection();
		$querry = $con->prepare(' SELECT ID_production,nom_categorie,quantite_produite,heure_debut,heure_fin,TIMEDIFF(heure_fin,heure_debut) AS heure_totale,date_production FROM production,categorieproduction WHERE production.ID_categorieP = categorieproduction.ID_categorieP ORDER BY date_production');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject()) {
			$rs[] = $data;
		}
		return $rs;
	}
	function gretTempsTotalDeProductionParMois($mois,$annee)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(heure_fin,heure_debut))) ) AS TempsTotal
		FROM production WHERE MONTH(date_production) = :mois AND YEAR(date_production) = :annee");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		$TempsTotal = $query->fetch()['TempsTotal'];
		if (empty($TempsTotal))
			$TempsTotal = 0;
		return $TempsTotal;
	}
	function affichage_productio_journaliere($jourproduction)
	{
		$con = getconnection ();
		$query = $con->prepare("SELECT ID_historique,nom_categorie,quantite_produite,heure_debut,heure_fin,TIMEDIFF(heure_fin,heure_debut) AS heure_totale,date_production FROM historique_production,categorieproduction WHERE historique_production.ID_categorieP = categorieproduction.ID_categorieP AND date_production =?");
		$query->execute(array($jourproduction));
		$rs = array();

		while ( $data = $query->fetchObject()) 
		{
			$rs[] = $data;
		}
		return $rs; 
	}
	function updateproduction($refpro,$hdebut,$hfin,$qteproduite,$dateproduction)
	{
		$con = getconnection();
		$querry = $con->prepare("UPDATE production SET heure_debut = :hdebut,heure_fin = :hfin,quantite_produite = :qteproduite,date_production = :dateproduction WHERE ID_production = :refpro");
		$rs = $querry->execute(array('hdebut' => $hdebut,'hfin' => $hfin,'qteproduite' => $qteproduite,'dateproduction' => $dateproduction,'refpro' => $refpro)) or die(print_r($querry->errorInfo()));
		return $rs;
	}
	function suppression_production($numpro)
	{
		$con = getconnection();
	 	$query = $con->prepare("DELETE FROM production WHERE ID_production = ?");
	 	$rs = $query->execute(array($numpro)) or die(print_r($query->errorInfo()));
	 	return $rs;
	}
	function production200($mois,$annee) 
	{
		$con = getconnection();
		$query = $con->prepare("SELECT SUM(production.quantite_produite) AS quantite FROM production,categorieproduction WHERE production.ID_categorieP = categorieproduction.ID_categorieP AND MONTH(date_production) = :mois AND  YEAR(date_production) = :annee AND categorieproduction.nom_categorie='produit200'");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		return $query;
	}
	function production300($mois,$annee)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT SUM(production.quantite_produite) AS quantite FROM production,categorieproduction WHERE production.ID_categorieP = categorieproduction.ID_categorieP AND MONTH(date_production) = :mois AND  YEAR(date_production) = :annee AND categorieproduction.nom_categorie='produit300'");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		return $query;
	}
	function affichage_production_Mensuelle($date_debut,$date_fin)
	{
		
		$con = getconnection ();
		$query = $con->prepare("SELECT date_production,SUM(historique_production.quantite_produite) AS quantite,categorieproduction.nom_categorie FROM historique_production,categorieproduction WHERE categorieproduction.ID_categorieP = historique_production.ID_categorieP AND date_production BETWEEN :date_debut AND :date_fin GROUP BY historique_production.ID_historique");
		$query->execute(array('date_debut'=>$date_debut,'date_fin'=>$date_fin)) or die(print_r($query->errorInfo()));
		$rs = $query->fetchAll(PDO::FETCH_OBJ);
		return $rs;
	}
	
	function diminuer_quantite_produite($idproduction,$qtevendue)
	{
		$con = getconnection();
	 	$query = $con->prepare("UPDATE production SET quantite_produite = quantite_produite - :qtevendue WHERE ID_production = :idproduction");
	 	$res = $query->execute(array('idproduction' => $idproduction,'qtevendue' => $qtevendue)) or die(print_r($query->errorInfo()));
	 	return $res;
	}

	function augmenter_quantite_produite($categorie,$qteproduite)
	{
		$con = getconnection();
	 	$query = $con->prepare("UPDATE production SET quantite_produite = quantite_produite + :qteproduite WHERE ID_categorieP = :categorie");
	 	$res = $query->execute(array('categorie' => $categorie,'qteproduite' => $qteproduite)) or die(print_r($query->errorInfo()));
	 	return $res;
	}
	
 



}