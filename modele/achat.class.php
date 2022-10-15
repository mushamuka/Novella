<?php

	/**
	 * 
	 */
	class Achat
	{
		
		function enregistreAchat($article,$quantite,$prix_achat,$date_achat)
		{
			$con = getconnection();
			$querry = $con->prepare('INSERT INTO achat(ID_categorie_achat,quantite,prix,date_achat)
				VALUES(:article,:quantite,:prix_achat,:date_achat)');
			$rs = $querry->execute(array('article' => $article,'quantite' => $quantite,'prix_achat' => $prix_achat,'date_achat'=> $date_achat)) or die(print_r($querry->errorInfo()));
			return $rs;
		}
		function ajoutCategorie($categorie_achat,$description)
		{
			$con = getconnection();
			$querry = $con->prepare('INSERT INTO categorie_achat(nom,description)
				VALUES(:categorie_achat,:description)');
			$rs = $querry->execute(array('categorie_achat' => $categorie_achat,'description' => $description)) or die(print_r($querry->errorInfo()));
			return $rs;
		}
		function getCategorie_achat() 
		{
			$con = getconnection();
			$querry = $con->prepare('SELECT * FROM categorie_achat');
			$querry->execute();
			$rs = array();
			while ($data = $querry->fetchObject())
			{
				$rs[] = $data;
			}
			return $rs;
		}
		function getAchats()
		{
			$con = getconnection();
			$querry = $con->prepare(' SELECT ID_achat,nom,quantite,prix,date_achat FROM achat,categorie_achat WHERE achat.ID_categorie_achat = categorie_achat.ID_categorie_achat ORDER BY date_achat');
			$querry->execute();
			$rs = array();
			while ($data = $querry->fetchObject())
			{
				$rs[] = $data;
			}
			return $rs;
		}
		function rapport_achatpar_mois($jourachat_selectionne)
		{
			$con = getconnection();
			$query = $con->prepare('SELECT achat.quantite*prix AS total, ID_achat,nom,quantite,prix,date_achat FROM achat,categorie_achat WHERE achat.ID_categorie_achat = categorie_achat.ID_categorie_achat AND date_achat =?');

			$query->execute(array($jourachat_selectionne)) or die(print_r($query->errorInfo()));
			$rs = array();
			while ($data = $query->fetchObject()) {
				$rs[] = $data;
			}
			return $rs;
		}
		function get_achatdu_mois($date_debut,$date_fin)
		{
			
			$con = getconnection ();
			$query = $con->prepare("SELECT date_achat,prix,quantite,(achat.quantite*prix) AS prixTotal,categorie_achat.nom FROM achat,categorie_achat WHERE categorie_achat.ID_categorie_achat = achat.ID_categorie_achat AND date_achat BETWEEN :date_debut AND :date_fin GROUP BY achat.ID_achat");
			$query->execute(array('date_debut'=>$date_debut,'date_fin'=>$date_fin)) or die(print_r($query->errorInfo()));
			$rs = $query->fetchAll(PDO::FETCH_OBJ);
			return $rs;
		}
	 
	
		function suppression_achat($numachat)
		{
			
	    	$con = getconnection();
		 	$query = $con->prepare("DELETE FROM achat WHERE ID_achat = ?");
		 	$rs = $query->execute(array($numachat)) or die(print_r($query->errorInfo()));
		 	return $rs;
	
		}
		function updateachat($refchat,$refprix,$quantite)
		{
			$con = getconnection();
			$querry= $con->prepare("UPDATE achat SET  prix = :refprix,quantite = :quantite WHERE ID_achat = :refchat");
			$rs = $querry->execute(array('refprix' => $refprix,'quantite' => $quantite,'refchat' => $refchat)) or die(print_r($querry->errorInfo()));
			return $rs;
		}
		function updatecategorie($refcat,$refnom,$description)
		{
			$con = getconnection();
			$querry= $con->prepare("UPDATE categorie_achat SET  nom = :refnom,description = :description WHERE ID_categorie_achat = :refcat");
			$rs = $querry->execute(array('refnom' => $refnom,'description' => $description,'refcat' => $refcat)) or die(print_r($querry->errorInfo()));
			return $rs;
		}
		function  suppression_categorie($numcat)
		{
			$con = getconnection();
		 	$query = $con->prepare("DELETE FROM categorie_achat WHERE ID_categorie_achat = ?");
		 	$rs = $query->execute(array($numcat)) or die(print_r($query->errorInfo()));
		 	return $rs;
		}
		function getmontant_achat_mensuel($mois,$annee)
		{
			$con = getconnection();
			$query = $con->prepare("SELECT SUM(quantite*prix) AS montant FROM `achat` WHERE MONTH(date_achat) = :mois AND YEAR(date_achat) = :annee");
			$query->execute(['mois' => $mois,'annee' => $annee]) or die(print_r($query->errorInfo()));
			return $query;
		}
		function getclasse_sans_titulaire()
		{
			$con = getconnection();
			$querry = $con->prepare("SELECT code_classe,degre,type,section FROM classe WHERE code_classe NOT IN (SELECT code_classe FROM titulaire)");
			$querry->execute() or die(print_r($querry->errorInfo()));
			$rs = array();
			while ($data = $querry->fetchObject())
			{
				$rs[] = $data;
			}
			return $rs;
		}
		function getOnClass($code_classe)
		{
			$con = getconnection();
			$querry = $con->prepare("SELECT * FROM classe WHERE code_classe = ?");
			$querry->execute(array($code_classe)) or die(print_r($querry->errorInfo()));
			$rs = array();
			while ($data = $querry->fetchObject())
			{
				$rs[] = $data;
			}
			return $rs;
		}
		function updateClasse($old_code_classe,$new_code_classe,$degre,$type,$section)
		{
			$con = getconnection();
			$querry= $con->prepare("UPDATE classe SET code_classe = :new_code_classe,degre = :degre,type = :type,section = :section WHERE code_classe = :old_code_classe");
			$rs = $querry->execute(array('new_code_classe' => $new_code_classe,'degre' => $degre,'type' => $type,'section' => $section,'old_code_classe' => $old_code_classe)) or die(print_r($querry->errorInfo()));
			return $rs;;
		}
	}

?>