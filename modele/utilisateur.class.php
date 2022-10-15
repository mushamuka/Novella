<?php
	
	/**
	* 
	*/
	class Utilisateur
	{
					

			function new_user($nomuser,$login,$prenom,$password,$profil_id,$datecreation)
			{
			$con = getconnection();
			$query = $con->prepare("INSERT INTO utilisateur(ID_profil,nom_utilisateur,prenom,login,mot_de_passe,date_creation) VALUES (:profil_id,:nomuser,:prenom,:login,:password,:datecreation)");
			$rs = $query->execute(array('nomuser' =>$nomuser,'prenom'=>$prenom,'password' =>$password,'profil_id' =>$profil_id,'login' => $login,'datecreation' =>$datecreation)) or die(print_r($query->errorInfo()));
			return $rs;
			}
			function setProfil_user($nom_profil) 
			{
			$con = getconnection();
			$query = $con->prepare("INSERT INTO profil_utilisateur(nom_profil) VALUES(:nom_profil)");
			$query->execute(array('nom_profil' => $nom_profil));
			return $query->errorInfo();
			}
			function setProfil_user_permession($profil_id,$page,$L,$C,$M,$S,$page_accept)
			{
			$con = getconnection();
			$query = $con->prepare("INSERT INTO permission_page(ID_profil,page,L,C,M,S,page_accept) VALUES(:profil_id,:page,:L,:C,:M,:S,:page_accept)");
			$res = $query->execute(array('profil_id' => $profil_id,'page' => $page,'L' => $L,'C' => $C,'M' => $M,'S' => $S,'page_accept' => $page_accept)) or die(print_r($query->errorInfo()));
			return $res;
			}
			function getMaxProfilIdUser()
			{
			$con = getconnection();
			$query = $con->prepare("SELECT MAX(ID_profil) AS ID_profil FROM profil_utilisateur");
			$query->execute() or die(print_r($query->errorInfo()));
			return $query;
			}
			function getPermissionDunUser($utilisateur)
			{
			$con = getconnection();
			$query = $con->prepare("SELECT utilisateur.ID_utilisateur,nom_utilisateur,page,L,C,M,S FROM profil_utilisateur pu,utilisateur,permission_page pup WHERE utilisateur.ID_utilisateur = pu.ID_utilisateur AND pu.ID_utilisateur = pup.ID_utilisateur AND utilisateur.ID_utilisateur = ? AND page_accept = 1");
			$query->execute(array($utilisateur)) or die(print_r($query->errorInfo()));
			$res = array();
			while ($data = $query->fetchObject()) 
			{
			$res[] = $data;
			}
			return $res;
			}
			function verifierPermissionDunePage($page,$utilisateur)
			{
			$con = getconnection();
			$query = $con->prepare("SELECT page,L,C,M,S FROM utilisateur user,profil_utilisateur pu,permission_page pup WHERE user.ID_profil = pu.ID_profil AND pu.ID_profil = pup.ID_profil AND page = :page AND user.ID_utilisateur =:utilisateur AND page_accept = 1");
			$query->execute(array('page' => $page,'utilisateur' => $utilisateur)) or die(print_r($query->errorInfo()));
			return $query;
			}
			function update_permission($idpermission,$lire,$creer,$modifier,$supprimer,$page_accept)
			{
			$con = getconnection();
			$query = $con->prepare("UPDATE permission_page SET L=:L,C=:C,M=:M,S=:S,page_accept=:page_accept WHERE ID_permission=:idpermission");
			$res = $query->execute(array('L' => $lire,'C' => $creer,'M' => $modifier,'S' => $supprimer,'page_accept' => $page_accept,'idpermission' => $idpermission)) or die(print_r($query->errorInfo()));
			return $res;
			}
			function getAllProfilUser()
			{
			$con = getconnection();
			$query = $con->prepare("SELECT * FROM profil_utilisateur");
			$query->execute() or die(print_r($query->errorInfo()));
			$res = array();
			while ($data = $query->fetchObject()) 
			{
			$res[] = $data;
			}
			return $res;
			}
			function recupererUnUser($login,$password)
			{
			$con = getconnection();
			$query = $con->prepare("SELECT * FROM utilisateur WHERE login = :login AND mot_de_passe = :password");
			$query->execute(array('login' => $login,'password' => $password)) or die(print_r($query->errorInfo()));
				return $query;
			}
			function image_user($utilisateur)
			{
				$con = getconnection();
				$query = $con->prepare("SELECT photo FROM utilisateur WHERE ID_utilisateur =?");
				$query->execute(array($utilisateur));
				$rs = array();
				while ( $data = $query->fetchObject()) 
				{
					$rs[] = $data;
				}
				return $rs;
			}
			function affiche_user_avec_profil()
			{
			$con = getconnection();
			$query =$con->prepare("SELECT * FROM utilisateur,profil_utilisateur WHERE utilisateur.ID_profil = profil_utilisateur.ID_profil");
			$query->execute() or die(print_r($query->errorInfo()));
			$res = array();
			while ($data = $query->fetchObject()) 
			{
			$res[] = $data;
			}
			return $res;
			}
			function affiche_permission_par_profil($profil_id)
			{
			$con = getconnection();
			$query = $con->prepare("SELECT ID_permission,profil_utilisateur.ID_profil,page,L,C,M,S FROM `permission_page`,`profil_utilisateur` WHERE permission_page.ID_profil = profil_utilisateur.ID_profil AND profil_utilisateur.ID_profil = ?");
			$query->execute(array($profil_id)) or die(print_r($query->errorInfo()));
			$res = array();
			while ($data = $query->fetchObject()) 
			{
				$res[] = $data;
			}
			return $res;
			}

			function UpdateUser($iduser,$nomuser,$mail_user,$role)
			{
			$con = getconnection();
			$query = $con->prepare("UPDATE user SET nom_user = :nomuser,email = :mail_user,role =:role WHERE ID_user = :iduser");
			$rs = $query->execute(array('nomuser' => $nomuser,'mail_user' => $mail_user,'role'=>$role,'iduser' =>$iduser)) or die(print_r($query->errorInfo()));
			return $rs;
			}
			function deleteUser($iduser)
			{
			$con = getconnection();
			$query = $con->prepare("DELETE FROM user WHERE ID_user = ?");
			$rs = $query->execute(array($iduser)) or die(print_r($query->errorInfo()));
			return $rs;
			}
			function update_profil($iduser,$profil_id)
			{
			$con = getconnection();
			$query = $con->prepare("UPDATE user SET profil_id = :profil_id WHERE ID_user = :iduser");
			$rs = $query->execute(array('profil_id' => $profil_id,'iduser' => $iduser)) or die(print_r($query->errorInfo()));
			return $rs;
			}
			function deletecet_utilisateur($iduser_delete)
			{
				$con = getconnection(); 
				$query = $con->prepare("DELETE FROM user WHERE ID_user = ?");
				$rs = $query->execute(array($iduser_delete)) or die(print_r($query->errorInfo()));
				return $rs;
			}
			function changemp($nomss,$nouveaupassword)
			{
			$con = getconnection();
			$query = $con->prepare("UPDATE utilisateur SET  mot_de_passe = :nouveaupassword WHERE nom_utilisateur = :nomss");
			$rs = $query->execute(array('nouveaupassword' => $nouveaupassword,'nomss' => $nomss)) or die(print_r($query->errorInfo()));
			return $rs;
			}
			function modifier_profil($idprof,$nomprofil)
			{
			$con = getconnection();
			$query = $con->prepare("UPDATE profil_utilisateur SET  nom_profil = :nomprofil WHERE ID_profil = :idprof");
			$rs = $query->execute(array('nomprofil' => $nomprofil,'idprof' => $idprof)) or die(print_r($query->errorInfo()));
			return $rs; 
			}
			function supprimeprofil($numprof) 
			{
			$con = getconnection();
				$query = $con->prepare("DELETE FROM profil_utilisateur WHERE ID_profil = ?");
				$rs = $query->execute(array($numprof)) or die(print_r($query->errorInfo()));
				return $rs;
			}
			function modif_detailprofil($identifiant,$nomuser,$prenomuser,$loginuser)
			{
			$con = getconnection();
			$query = $con->prepare("UPDATE utilisateur SET  nom_utilisateur = :nomuser,prenom = :prenomuser,login = :loginuser WHERE ID_utilisateur = :identifiant");
			$rs = $query->execute(array('nomuser' => $nomuser,'prenomuser' => $prenomuser,'loginuser' => $loginuser,'identifiant' => $identifiant)) or die(print_r($query->errorInfo()));
			return $rs; 
			}
			function modifierphotoprofil($idutilisateur,$photo)
			{
				$con = getconnection();
			$query = $con->prepare("UPDATE user SET photo = :photo WHERE ID_user = :idutilisateur");
			$rs = $query->execute(array('photo' => $photo,'idutilisateur' =>$idutilisateur)) or die(print_r($query->errorInfo()));
			return $rs;
			}
			function afficheprofilUser($utilisateur)
				{
		 			$con = getconnection();
		 			$query = $con->prepare("SELECT nom_utilisateur,prenom,profil_utilisateur.ID_profil,nom_profil,login,photo FROM utilisateur,profil_utilisateur WHERE utilisateur.ID_profil = profil_utilisateur.ID_profil AND utilisateur.ID_utilisateur =?");
		 			$query->execute(array($utilisateur));
		 			$rs = array();
		 			while ( $data = $query->fetchObject()) 
		 			{
		 				$rs[] = $data;
		 			}
		 			return $rs;
				}
			function image_profil($iduser)
			{
				$con = getconnection();
				$query = $con->prepare("SELECT * FROM photoprofil WHERE ID_user = ?");
				$query->execute(array($iduser));
				$rs = array();
				while ( $data = $query->fetchObject()) 
				{
					$rs[] = $data;
				}
				return $rs;
				}
			}
?>