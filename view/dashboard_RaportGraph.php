
<?php
require_once('modele/production.class.php');
require_once('modele/vente.class.php');
require_once('modele/vendeur.class.php');
require_once('modele/achat.class.php');
require_once('modele/utilisateur.class.php');
require_once('modele/stock.class.php');

 
    $utilisateur = new Utilisateur();
    $achat = new Achat();
    $vente = new Vente();
    $production = new Production();
    $vendeur =new Vendeur();

    $stock = new Stock();
    
    
    $tb_mois= [1=>'janvier',2=>'fevrier',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'aout',9=>'septembre',10=>'octobre',11=>'novembre',12=>'decembre'];
    $production = new Production();
    $vente = new Vente();

     // DONNEE PRODUCTION 
    $data_production = array();
    $query_local = $production->rapport_production();
    foreach ($query_local as $value) 
    {
        $data_production[] = array(
        'label'  =>$value->nom_categorie,
        'value'  => $value->nb
        );
    }
    
    $data_production = json_encode($data_production);
/***********************************************************************************************************************************/

$stock =new Stock();
$donne_stock =array();
$requete = $stock->rapport_stock_actuel();
foreach ($requete  as $value) 
{
    $donne_stock[] =array('label' =>$value->ARTICLE,'value' => $value->quantite);
}
$donne_stock = json_encode($donne_stock);


/**********************************************************************************************************************************/
    // DONNEE PRODUCTION 

    $data_vente =array();
    $query_local = $vente->rapport_vente();

    foreach ($query_local as $value) 
    {
        $data_vente[] = array('label'  =>$value->nom_categorie,'label'  =>$value->quantite_totale,'label' =>$value->quantite_vendue,'label' => $value->quantite_retour,'label' => $value->manquant,'label' =>$value->montant);
    }

    $data_vente = json_encode($data_vente);

    //
    // ETATA VENTE
    //

    $date = date_parse(date('Y-m-d'));
    $raport_etat_vante = '';
    $res_etatVente = '';
    
    for ($i=1; $i < $date['month'] +1; $i++) 
    {
        foreach ($vente->getMontantVenduParCategorieDunMois($i,date('Y')) as $value) 
        {
            $res_etatVente .= $value->nom_categorie.":".$value->montant.",";
        }
        if (empty($res_etatVente)) 
        {
            $res_etatVente .= "produit200:0,";
            $res_etatVente .= "produit300:0";
        }
        else
        {
            $res_etatVente = substr($res_etatVente, 0,-1);
        }
        $raport_etat_vante .= "{mois:'".$tb_mois[$i]."',".$res_etatVente."}, ";
        $res_etatVente = '';
        /*if (!empty($payement['montant']))
            $montant_payer = $payement['montant'];
        if (!empty($resulta['montant']))
            $depense = $resulta['montant'];
        $depense_mensuel_graph .= "{mois:'".$tb_mois[$i]."',".$res_etatVente."}, ";
        $solde = $montant_payer - $depense;
        $situation_mensuel_tresorerie_graph .= "{y:'".$tb_mois[$i]."',a:".$solde."}, ";*/ 
    }
    $raport_etat_vante = substr($raport_etat_vante, 0,-2);

    // vente mensuelle par agent

    $vente_vendeur_mensuelle = '';
    foreach ($vente->ventevendeur_mensuelle($date['month'],$date['year']) as $value) 
    {
        $vente_vendeur_mensuelle .= "{y:'".$value->nomVendeur."',a:".$value->montantVendu."}, ";
    }
    $vente_vendeur_mensuelle = substr($vente_vendeur_mensuelle, 0,-2);

    // Salaire mensuel par agent

    $salaire_vendeur_mensuelle = '';
    foreach ($vendeur->getsalaire_mensuel_par_agent($date['month'],$date['year']) as $value) 
    {
        $salaire_vendeur_mensuelle .= "{y:'".$value->nomVendeur."',a:".$value->salaire."}, ";
    }
    $salaire_vendeur_mensuelle = substr($salaire_vendeur_mensuelle, 0,-2);

    //RETOUR MENSUEL PAR AGENT

     $retour_mensuelle = '';
    foreach ($vente->retour_mensuelle_par_agent($date['month'],$date['year']) as $value) 
    {
        $retour_mensuelle .= "{y:'".$value->nomVendeur."',a:".$value->quantite."}, ";
    }
    $retour_mensuelle = substr($retour_mensuelle, 0,-2);
    