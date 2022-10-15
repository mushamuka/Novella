<?php
/**
 * classe Stock
 */
class Stock
{
	function ajouter_categorie($libelle,$datecreation) 
	{
		$con = getconnection();
		$query = $con->prepare("INSERT INTO categorie(LIBELLE,DATECREAT) VALUES (:libelle,:datecreation)");
		$rs = $query->execute(array('libelle' =>$libelle,'datecreation' =>$datecreation)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	function get_categorie_boisson()
	{
		
		$con = getconnection();
		$query = $con->prepare("SELECT * FROM categorie ");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function get_article_filtre()
	{
		
		$con = getconnection();
		$query = $con->prepare("SELECT * FROM article ");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function ajouter_unite($unite,$note,$dateajout)
	{
		$con = getconnection();
		$query = $con->prepare("INSERT INTO unite(UNITE,DESCRIPTION,DATECREAT) VALUES (:unite,:note,:dateajout)");
		$rs = $query->execute(array('unite' =>$unite,'note'=>$note,'dateajout' =>$dateajout)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	function modifier_unite($ref,$unite,$note,$dateajout)
	{
		$con = getconnection();
		$query = $con->prepare("UPDATE unite SET UNITE =:unite,DESCRIPTION =:note,DATECREAT =:dateajout WHERE ID =:ref");
		$rs = $query->execute(array('unite' =>$unite,'note'=>$note,'dateajout' =>$dateajout,'ref'=>$ref)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	function supprimer_unite($id_unite)
	{
		$con = getconnection();
		$query = $con->prepare("DELETE FROM unite  WHERE ID =?");
		$rs = $query->execute(array($id_unite)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	function get_unite()
	{
		$con = getconnection();
		$query = $con->prepare("SELECT * FROM unite ");
		$rs =$query->execute();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	
	function ajouter_article($categorie_stock,$article,$prix_achat,$prix_vente,$nbrpar_casier,$date_achat,$seuil,$note)
	{
		$con = getconnection();

		$query = $con->prepare("INSERT INTO article(IDCAT,ARTICLE,PRIX_ACHAT,PRIX_VENTE,NB_CASIER,SEUIL,DESCRIPTION,DATECREAT) VALUES (:categorie_stock,:artile,:prix_achat,:prix_vente,:nbrpar_casier,:seuil,:note,:date_achat)");
		$rs = $query->execute(array('categorie_stock' =>$categorie_stock,'artile'=>$article,'prix_achat' =>$prix_achat,'prix_vente' =>$prix_vente,'seuil'=>$seuil,'date_achat'=>$date_achat,'nbrpar_casier'=>$nbrpar_casier,'note'=>$note)) or die(print_r($query->errorInfo()));
		return $rs;
	}
					
	function update_stock($ref,$quantite_b,$note,$date_stock)
	{
		$con = getconnection();
		$query = $con->prepare("UPDATE histor_stock SET quantite =:quantite_b,description =:note,date_stock =:date_stock WHERE ID_histo =:ref");
		$rs = $query->execute(array('quantite_b'=>$quantite_b,'note'=>$note,'date_stock' =>$date_stock,'ref'=>$ref));
		$error = $query->errorInfo();
		 //or die(print_r($query->errorInfo()));
		return $rs;
	}
	
	function supprimer_historique_stock($id_histock)
	{
		$con = getconnection();
		$query = $con->prepare("DELETE FROM histor_stock WHERE histor_stock.ID_histo = ?");
		$rs = $query->execute(array($id_histock)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	function ajouter_nouriture($categorie_aliment,$aliment,$quantite_n,$unite,$prix_achat,$seuil,$photo_aliment,$date_achat,$note)
	{
		$con = getconnection();					
		$query = $con->prepare("INSERT INTO stockn(IDCAT,IDUNIT,PRODUIT,QUANTITE,PRIXA,SEUIL,DESCRIPTION,IMAGE,DATECREAT) VALUES (:categorie_aliment,:unite,:aliment,:quantite_n,:prix_achat,:seuil,:note,:photo_aliment,:date_achat)");
		$rs = $query->execute(array('categorie_aliment' =>$categorie_aliment,'aliment'=>$aliment,'quantite_n' =>$quantite_n,'prix_achat' =>$prix_achat,'seuil'=>$seuil,'date_achat'=>$date_achat,'photo_aliment'=>$photo_aliment,'note'=>$note,'unite'=>$unite)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	function produit_en_stock()
	{
		$con = getconnection();
	

		$query = $con->prepare("SELECT article.ID,article.IDCAT,ARTICLE,LIBELLE,NB_CASIER,PRIX_ACHAT,PRIX_VENTE,SEUIL,DESCRIPTION,article.DATECREAT FROM article,categorie WHERE article.IDCAT = categorie.IDCAT");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function Affiche_historique_en_stock()
	{
		$con = getconnection();
	
			
		$query = $con->prepare("SELECT ID_histo,ARTICLE,histor_stock.quantite,histor_stock.description,SEUIL,histor_stock.date_stock,categorie.LIBELLE FROM `histor_stock`,article,stock,categorie WHERE article.ID =stock.ID AND stock.ID =histor_stock.ID AND categorie.IDCAT = article.IDCAT");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	 
	function delete_article($ref_boisson)
	{
		$con = getconnection();
		$query = $con->prepare("DELETE FROM article WHERE ID =?");
		$rs = $query->execute(array($ref_boisson)) or die(print_r($query->errorInfo()));
		return $rs;
	}

	function update_article($numarticle,$articles,$pa_unitaire,$pv_unitaire,$nb_casier,$seuil,$note,$date_article)
	{
		$con = getconnection();					
		$query = $con->prepare("UPDATE article SET ARTICLE =:articles,PRIX_ACHAT =:pa_unitaire,PRIX_VENTE =:pv_unitaire,NB_CASIER =:nb_casier, SEUIL =:seuil,DESCRIPTION =:note,DATECREAT =:date_article WHERE ID =:numarticle");
$rs = $query->execute(array('numarticle'=>$numarticle,'articles'=>$articles,'pv_unitaire'=>$pv_unitaire,'pa_unitaire'=>$pa_unitaire,'seuil'=>$seuil,'nb_casier'=>$nb_casier,'date_article'=>$date_article,'note'=>$note)) or die(print_r($query->errorInfo()));
		return $rs; 
	}
	function recupereTout_article_par_categorie($categorie)
	{
		
		$con = getconnection();
		$query =$con->prepare('SELECT ID_stock,LIBELLE,ARTICLE,stock.quantite,stock.description,SEUIL,stock.date_stock,article.ID FROM stock,article,categorie WHERE categorie.IDCAT = article.IDCAT AND article.ID = stock.ID AND categorie.IDCAT = ?');
		$query->execute(array($categorie)) or die(print_r($query->errorInfo()));
		$rs = $query->fetchAll(PDO::FETCH_OBJ);
			return $rs;


	}
 function get_article($idcateg)
 {
 	$con =getconnection();
 	$query= $con->prepare('SELECT ARTICLE,ID FROM `article`,categorie WHERE categorie.IDCAT = article.IDCAT AND categorie.IDCAT =?');
 	$query->execute(array($idcateg)) or die(print_r($query->errorInfo()));
 	$res =array();
 	while ($data =$query->fetchObject()) 
		{
			$rs[] = $data;
		}
		return $rs;
 }

 function creation_stock($id_article,$quantite,$note,$datestock)
 {
 	$con = getconnection();	
	$query = $con->prepare("INSERT INTO stock(ID,quantite,description,date_stock) VALUES (:id_article,:quantite,:note,:datestock)");
	$rultat = $query->execute(array('id_article' =>$id_article,'quantite'=>$quantite,'datestock'=>$datestock,'note'=>$note));

	$error = $query->errorInfo();
		$rultat = "";
		if ($error[1] == 1062) 
		{
			$rultat = 'duplicate';
		}
		else 
		{
			$rultat = 'ok';
		}
	return $rultat;
 } 
 function inserer_historisque_stock($id_article,$quantite,$note,$datestock)
 {
 	$con = getconnection();	
	$query = $con->prepare("INSERT INTO histor_stock(ID,quantite,description,date_stock) VALUES (:id_article,:quantite,:note,:datestock)");
	$rs = $query->execute(array('id_article' =>$id_article,'quantite'=>$quantite,'note'=>$note,'datestock'=>$datestock)) or die(print_r($query->errorInfo()));
	return $rs;
 }
 function recuper_nb_par_categorie()
 {
 	$con = getconnection();
 	$query = $con->prepare("SELECT COUNT(*) AS nb ,article.ARTICLE,categorie.LIBELLE FROM categorie,stock,article WHERE categorie.IDCAT = article.IDCAT AND stock.ID = article.ID GROUP BY article.IDCAT");
 	$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
 }
 	function agmente_quantite($idstock,$quantite_stock)
	{
		$con = getconnection();
		$query = $con->prepare("UPDATE stock SET quantite = quantite + :quantite_stock WHERE ID = :idstock");
		$res = $query->execute(array('quantite_stock' => $quantite_stock,'idstock' => $idstock)) or die(print_r($query->errorInfo()));
		return $res;
	}
	function getmaxID_control()
	{
		$con = getconnection();
		$query = $con->prepare("SELECT MAX(ID_control) AS ID_control FROM control");
		$query->execute();
		return $query;
	}
	function Affiche_etat_stock_actuel($mois,$annee)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT ID_stock,LIBELLE,ARTICLE,quantite,stock.description,SEUIL,stock.date_stock FROM stock,article,categorie WHERE categorie.IDCAT = article.IDCAT AND article.ID = stock.ID AND MONTH(date_stock) = ? AND YEAR(date_stock)=?");
		$query->execute(array($mois,$annee)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
function inserer_control($id_article,$qte_dispo,$date_control)
 {
 	$con = getconnection();	
	$query = $con->prepare("INSERT INTO control(ID,quantite_rencontre,date_control) VALUES (:id_article,:qte_dispo,:date_control)");
	$rs = $query->execute(array('id_article' =>$id_article,'qte_dispo'=>$qte_dispo,'date_control'=>$date_control))  or die(print_r($query->errorInfo()));
	return $rs;

 } 
 function update_quantite_stock($idarticle,$quantite)
 {
 	$con = getconnection();
		$query = $con->prepare("UPDATE stock SET quantite =:quantite WHERE ID = :idarticle");
		$res = $query->execute(array('quantite' => $quantite,'idarticle' => $idarticle)) or die(print_r($query->errorInfo()));
		return $res;
 }
 function artcle_dans_control($idarticle,$idcontrol,$qte_dispo,$qte_initiale,$quantite_vendu)
 {
	$con = getconnection();			
	$query = $con->prepare("INSERT INTO control_article(ID_control,ID,quantite_rencontre,quantite_initiale,quantite_vendue) VALUES (:idarticle,:idcontrol,:qte_dispo,:qte_initiale,:quantite_vendu)");
	$rs = $query->execute(array('idarticle' =>$idarticle,'qte_dispo'=>$qte_dispo,'idcontrol'=>$idcontrol,'qte_initiale'=>$qte_initiale,'quantite_vendu'=>$quantite_vendu))  or die(print_r($query->errorInfo()));
	return $rs;
 }
 function Affiche_ancien_control()
	{
		
		$con = getconnection();
		$query = $con->prepare("SELECT COUNT(article.ID) AS nombre,article.IDCAT,control.ID_control,article,LIBELLE,date_control,control.quantite_rencontre,control_article.quantite_initiale,control_article.quantite_vendue,article.ARTICLE,PRIX_ACHAT,PRIX_VENTE,NB_CASIER FROM `control_article`,control,article,categorie WHERE article.IDCAT =categorie.IDCAT AND control_article.ID_control = control.ID_control AND control_article.ID = article.ID GROUP BY article.IDCAT,control.date_control");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function control_lie($idcontrol,$idcateg)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT COUNT(control.ID_control) AS nombre,date_control FROM control_article,control,article WHERE article.ID = control_article.ID AND control.ID_control = control_article.ID_control AND control_article.ID_control=? AND article.IDCAT =?");
		$query->execute(array($idcontrol,$idcateg)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function detail_pour_chaque_ArticleContol($idcontrol)
	{
		$con = getconnection();
		$query = $con->prepare("SELECT control.ID_control,article,LIBELLE,date_control,control.quantite_rencontre,control_article.quantite_initiale,control_article.quantite_vendue,article.ARTICLE,PRIX_ACHAT,PRIX_VENTE,NB_CASIER FROM control_article,control,article,categorie WHERE article.IDCAT =categorie.IDCAT AND control_article.ID_control = control.ID_control AND control_article.ID =article.ID  AND control_article.ID_control=?");
		$query->execute(array($idcontrol)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function Affiche_detail_control($idcontrol)
	{
		
		$con = getconnection();
		$query = $con->prepare("SELECT control.ID_control,article,article.IDCAT,LIBELLE,date_control,control.quantite_rencontre,control_article.quantite_initiale,control_article.quantite_vendue,article.ARTICLE,PRIX_ACHAT,PRIX_VENTE,NB_CASIER FROM control_article,control,article,categorie WHERE article.IDCAT =categorie.IDCAT AND control_article.ID_control = control.ID_control AND control.ID =article.ID AND control_article.ID_control=?");
		$query->execute(array($idcontrol)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function getNombre_article_contreoler($idversement)
	{
		$con = connection();
		$query = $con->prepare("SELECT COUNT(ID_paiement) AS nbPaiement FROM paiement_verser WHERE ID_versement = ?");
		$query->execute([$idversement]);
		return $query;
	}
	function rapport_stock_actuel()
	{
		$con = getconnection();
		$querry = $con->prepare(' SELECT ARTICLE,quantite FROM `stock`,article WHERE article.ID =stock.ID GROUP BY article.ID');
		$querry->execute() or die(print_r($querry->errorInfo()));
		$rs = array();
		while ($data = $querry->fetchObject()) {
			$rs[] = $data;
		}
		return $rs;
	}
	function rapport_synthese_stock($mois,$annee) 
	{
		$con = getconnection();
		$query = $con->prepare("SELECT article.ID,ARTICLE,LIBELLE,NB_CASIER,PRIX_ACHAT,PRIX_VENTE,NB_CASIER,stock.date_stock,stock.quantite FROM article,categorie,stock WHERE categorie.IDCAT = article.IDCAT AND article.ID = stock.ID AND MONTH(date_stock) = ? AND YEAR(date_stock)=? GROUP BY article.ID");
		$query->execute(array($mois,$annee)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res; 
	}
	function nombre_darticle_par_categorie()
	{
		$con =getconnection();
		$query= $con->prepare("SELECT COUNT(*) as nb ,LIBELLE,article.IDCAT FROM categorie,article WHERE categorie.IDCAT = article.IDCAT GROUP BY article.IDCAT");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function liste_article($ref_article)
	{
		$con =getconnection();
		$query = $con->prepare("SELECT article.ID,ARTICLE,article.SEUIL,article.DESCRIPTION,article.DATECREAT FROM article WHERE  article.IDCAT =?");
		$query->execute(array($ref_article)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function filtre_article($condition)
	{
		
	 	$con = getconnection();
	 	$query = $con->prepare("SELECT article.ID,article.IDCAT,ARTICLE,LIBELLE,NB_CASIER,PRIX_ACHAT,PRIX_VENTE,SEUIL,DESCRIPTION,article.DATECREAT FROM article,categorie WHERE categorie.IDCAT = article.IDCAT $condition");
	 	$query->execute() or die(print_r($query->errorInfo()));
	 	$rs = array();
	 	while ( $data = $query->fetchObject()) 
	 	{
	 		$rs[] = $data;
	 	}
	 	return $rs;
	
	}
	function filtre_stockboison($condition)
	{
		
	 	$con = getconnection();
	 	$query = $con->prepare("SELECT ID_histo,LIBELLE,ARTICLE,quantite,histor_stock.description,SEUIL,date_stock FROM `histor_stock`,article,categorie WHERE categorie.IDCAT = article.IDCAT AND article.ID = histor_stock.ID $condition");
	 	$query->execute() or die(print_r($query->errorInfo()));
	 	$rs = array();
	 	while ( $data = $query->fetchObject()) 
	 	{
	 		$rs[] = $data;
	 	}
	 	return $rs;
	
	}
	function article_en_seuil_minimal()
	{
		
	 	$con = getconnection();
	 	$query = $con->prepare("SELECT LIBELLE,ARTICLE,quantite,SEUIL,date_stock FROM article,categorie,stock WHERE categorie.IDCAT = article.IDCAT AND article.ID = stock.ID AND quantite <= SEUIL");
	 	$query->execute() or die(print_r($query->errorInfo()));
	 	$rs = array();
	 	while ( $data = $query->fetchObject()) 
	 	{
	 		$rs[] = $data;
	 	}
	 	return $rs;
	
	}
	function graph_quantiteTotalPar_articleVendue($mois,$annee)
	{
		
		//SELECT control_article.quantite_vendue,article.ARTICLE FROM control,article,control_article,categorie WHERE article.ID = control.ID AND control.ID_control=control_article.ID_control AND article.ID =control.ID AND categorie.IDCAT = article.IDCAT AND control_article.ID_control =control.ID_control AND MONTH(control.date_control) =? AND YEAR(control.date_control) = ?
		$con = getconnection();
		$query = $con->prepare("SELECT SUM(control_article.quantite_vendue) AS quantite_vendue,article.ARTICLE FROM control,article,control_article,categorie WHERE article.ID = control.ID AND control.ID_control=control_article.ID_control AND article.ID =control.ID AND categorie.IDCAT = article.IDCAT AND control_article.ID_control =control.ID_control AND MONTH(control.date_control) =? AND YEAR(control.date_control) = ? GROUP BY article.ID");
		$query->execute(array($mois,$annee)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	function filtre_controlPasse($condition)
	{
		
		$con = getconnection();
		$query = $con->prepare("SELECT categorie.LIBELLE,control.date_control,control.quantite_rencontre,control_article.quantite_initiale,control_article.quantite_vendue,article.ARTICLE FROM control,article,control_article,categorie WHERE article.ID = control.ID AND control.ID_control=control_article.ID_control AND article.ID =control.ID AND categorie.IDCAT = article.IDCAT AND control_article.ID_control =control.ID_control $condition");
		$query->execute(array($condition)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	
}