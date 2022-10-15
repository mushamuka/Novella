<?php 
session_start();
define('WEBROOT',str_replace('index.php', "", $_SERVER['SCRIPT_NAME']));
define('ROOT',str_replace('index.php', "", $_SERVER['SCRIPT_FILENAME']));

require_once("modele/connection.php");
require_once("controler/login.controler.php");
require_once("controler/dashboard_controler.php"); 
require_once 'controler/achat.controler.php';
require_once 'controler/production.controler.php';
require_once 'controler/vente.controler.php';
//require_once 'controler/rapport.controler.php';
require_once 'controler/utilisateur.controler.php';
require_once 'controler/vendeur.controler.php';
require_once 'controler/stock.controler.php';


if (isset($_GET['p'])) 
{
	$params = explode('/', $_GET['p']);
	$_SESSION['action'] = '';
	$action = $params[0];
	$d = preg_split("#[-]+#", $action);
	$n = count($d);    
	if ($n > 1) 
	{
		$action = $d[0];
	}
	
	if ($action == 'login') 
	{
		traiterLogin($_POST['login'],$_POST['password']);
	}
	else
	{
		if (isset($_SESSION['ID_utilisateur'])) 
		{
			$_SESSION['action'] = $action;
			if ($action == 'ok') 
			{
				inc_homeAdmin();
			}
			//GESTION ACHAT MATIERE PREMIERE

			elseif ($action == 'achat')  
			{
				inc_achat();
			}
			elseif ($action == 'achatdujour') 
			{
				achat_par_jour($_POST['jourachat_selectionne']);
				//echo $_POST['jourachat_selectionne'];
			}
			elseif ($action == 'achat_mensuel') 
			{
				achat_mensuel($_POST['mois'],$_POST['annee']);
			}
			elseif ($action == 'categorie') 
			{
				modifiercategorie();
			}

			//GESTION ACHAT MATEIRE PREMIERE

			elseif ($action == 'production') 
			{
				inc_production();
			}
			//GESTION VENTE

			elseif ($action == 'vente') 
			{
				inc_vente();
			}
			elseif ($action == 'vente_dujour') 
			{
				vente_dujour($_POST['ventejour']);
			}
			elseif ($action == 'rapport') 
			{
				inc_rapport();
			}
			elseif ($action =='dette_agent') 
			{
				dette_par_agent($_POST['agent'],$_POST['mois'],$_POST['annee']);
				//echo "voici les data ".$_POST['agent'].$_POST['mois'].$_POST['annee'];
			}
			elseif ($action == 'ventemensuelle') 
			{
				vente_mensuelle($_POST['mois'],$_POST['annee']);
			}

			elseif($action == 'vendeur')
			{
				inc_vendeur();
			}
			elseif ($action == 'utilisateur') 
			{
				inc_utilisateur();
			}
			elseif ($action =='production_journaliere') 
			{
				production_journaliere($_POST['jourproduction']);
			}
		 
			
			elseif ($action == 'parametre') 
			{
				parametre();
			}
			elseif ($action == 'production_mensuelle') 
			{
				production_mensuelle($_POST['mois'],$_POST['annee']);
			}
			elseif ($action == 'depense_administrative') 
			{
				inc_depense_administrative();
			}
			elseif ($action == 'rapport_depense1') 
			{
				rapport_depense_Dun_User($_POST['mois'],$_POST['annee'],$_POST['iduserDepense']);
			}
			elseif ($action == 'facture_fournisseur') 
			{
				inc_facture_fournisseur();
			}

			//GESTION STOCK
			elseif ($action == 'article') 
			{
				inc_cree_article();
			}
			elseif ($action =='stock') 
			{
				nouveau_stock();
			}
			
			elseif ($action == 'dashstock') 
			{
				etat_stock();
			}
			elseif ($action == 'ancien_control') 
			{
				voir_ancien_control();
			}
			elseif ($action == 'print_rapport_article') 
			{
				imprimer_rapport($_POST['cond']);
			}
			elseif ($action == 'generer_pdf') 
			{
				generer_pdf($_POST['in']);
			
			}
			elseif ($action =='printArticle_stock') 
			{
				pint_Rapport_stock($_POST['cond']);
			
			}
			elseif ($action == 'seuil_minimal') 
			{
				print_article_stock_minimal();
			}
			elseif ($action =='print_controlpasse') 
			{
				print_controlpasse($_POST['cond']);
			}
			elseif ($action == 'detailControl') 
			{
				inclure_toutControl($d[1]);
			}
			elseif ($action == 'print_detail_control') 
			{
				imprimer_rapport_control($d[1]);
			}
			elseif ($action == 'pdf_control_anterieur_aunedate') 
			{
				
				imprimer_detail_control($d[1]);
			}

			// GESTION UTILISATEUR

			elseif ($action == 'utilisateur') 
			{
				inc_utilisateur();
			}
			elseif ($action == 'Changer_motpasse')
			{
				Changer_motpasse();
			}
			elseif ($action == 'modification') 
			{
				modification();
			}
			elseif ($action =='monprofil') 
			{
				monprofil();
			}
			elseif ($action == 'setprofiluser') 
			{
				$page = array();
				$page = $_SESSION['page']; 
				$nb = count($page);
				$page_accept = 0;
				for ($i=0; $i < $nb; $i++) 
				{
					$ll = 'l'.$i;
					$cc = 'c'.$i;
					$mm = 'm'.$i;
					$ss = 's'.$i; 
					if (isset($_POST['l'.$i])) 
					{
						$l = 1;
						$page_accept = 1;
					}
					else $l = 0;
					if (isset($_POST['c'.$i])) 
					{
						$c = 1;
						$page_accept = 1;
					}
					else $c = 0;
					if (isset($_POST['m'.$i])) 
					{
						$m = 1;
						$page_accept = 1;
					}
					else $m = 0;
					if (isset($_POST['s'.$i])) 
					{
						$s = 1;
						$page_accept = 1;
					}
					else $s = 0;
					setProfilUser($_POST['nom_profil'],$page[$i],$l,$c,$m,$s,$i,$page_accept,$nb);
						$page_accept = 0;
				
				}
			}
			elseif ($action == 'voir_profil') 
			{
				voir_profil();
			}
			elseif ($action == 'voir_utilisateur') 
			{
				voir_utilisateur();
			}
			/*
			* TABLEAU DE BORD
			*/
			elseif ($action == 'dashboard') 
			{ 
				inc_dashboard();
			}
			elseif ($action == 'deconnexion') 
			{
				deconnexion();
			}
			else
			{
				session_destroy();
				login();
			}
			/*
			* GESTION COMMERCIALE
			*/
			
		}// END IF SESSION USER EXISTE
		else
		{
			session_destroy();
			login();
		}
	}// END ELSE ACTION == LOGIN
	
}
else
{
	session_destroy();
	login();

}