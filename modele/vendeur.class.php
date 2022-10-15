 <?php
//require_once('/modele/connection.php');
/**
 * 
 */
class Vendeur
{
	function creer_vendeur($nom,$prenom,$fone,$adresse,$age,$datevenu,$salaire,$statut)
	{
		$con = getconnection();
		$querry = $con->prepare("INSERT INTO vendeur(nomVendeur,prenom,telephone,adresse,age,date_vendeur,salaire,statut)
			VALUES(:nom,:prenom,:fone,:adresse,:age,:datevenu,:salaire,statut)");
		$rs = $querry->execute(array('nom'=>$nom,'prenom'=>$prenom,'fone'=>$fone,'adresse'=>$adresse,'age'=>$age,'datevenu'=>$datevenu,'salaire'=>$salaire,'statut'=>$statut)) or die(print_r($querry->errorInfo()));
		return $rs;
	}

	function updatevendeur($idvendeur,$nom,$prenom,$fone,$adresse,$age,$datevenu,$salaire)
	{
		$con = getconnection();
		$querry= $con->prepare("UPDATE vendeur SET nomVendeur = :nom,prenom = :prenom,telephone = :fone,adresse = :adresse,age = :age,date_vendeur = :datevenu,salaire = :salaire WHERE ID_vendeur = :idvendeur");
		$rs = $querry->execute(array('nom' => $nom,'prenom' => $prenom,'fone' => $fone,'adresse' => $adresse,'age' => $age,'datevenu' => $datevenu,'idvendeur' => $idvendeur,'salaire'=>$salaire)) or die(print_r($querry->errorInfo()));
		return $rs;
	}


	function afficheTous_les_vendeurs()
	{
		$con = getconnection();
		$querry = $con->prepare('SELECT * FROM vendeur');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject())
		{
			$rs[] = $data;
		}
		return $rs;
	}
	function get_categorie_vendeur()
	{
		$con = getconnection();
		$querry = $con->prepare('SELECT statut FROM `vendeur` GROUP BY statut');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject())
		{
			$rs[] = $data;
		}
		return $rs;
	}
	function suppression_vendeur($refevendeur)
	{
			$con = getconnection();
			$query = $con->prepare("DELETE FROM vendeur WHERE ID_vendeur = ?");
			$rs = $query->execute(array($refevendeur)) or die(print_r($query->errorInfo()));
			return $rs;
	}
	function getsalaire_vendeur($mois,$annee)
	{
		$con =getconnection();
		$query =$con->prepare("SELECT  SUM(salaire * vente.quantite_vendue) AS salaire FROM vendeur,vente WHERE vente.ID_vendeur = vendeur.ID_vendeur AND MONTH(date_vendeur) = :mois AND  YEAR(date_vendeur) = :annee");
		$query->execute(['mois' => $mois,'annee' => $annee]);

		return $query;
	}
	function getsalaire_mensuel_par_agent($mois,$annee)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT vendeur.nomVendeur, SUM(salaire * vente.quantite_vendue) AS salaire FROM vendeur,vente WHERE vente.ID_vendeur = vendeur.ID_vendeur AND MONTH(date_vendeur) = :mois AND  YEAR(date_vendeur) = :annee GROUP BY vendeur.ID_vendeur");
		$query->execute(['mois' => $mois,'annee' => $annee]);
		$rs = $query->fetchAll(PDO::FETCH_OBJ);
		return $rs;

	}
	function nombredes_agents()
	{
		$con = getconnection();
		$query = $con->prepare("SELECT COUNT(*) AS nombre FROM `vendeur`");
		$query->execute();
		return $query;
	}



}