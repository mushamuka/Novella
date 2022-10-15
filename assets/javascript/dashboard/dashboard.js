if (action == 'dashboard') 
{
    //alert('ok dashboard existe dans javascript');
  $(document).ready(function(){
    // quantite produite
    var donut_chart = Morris.Donut({
    element: 'morris-donut-chart_production',
    data: data_production,
    resize: true,
    colors:['#55ce63', '#FFFF00', 'chocolate','#0000FF']
    });
    
  

    /*
    * quantite vendue
    */
    /*var donut_chart = Morris.Donut({
    element: 'morris-donut-chart-vente',
    data: data_vente,
    resize: true,
    colors:['#999999', '#FFFF00', 'chocolate','#0000FF']
    });*/

    /*
    * RAPPORT VENTE
    */
    Morris.Bar({
    element: 'histogramme_vente',
    data: etat_vente,
    xkey: 'mois',
    ykeys: ['produit200','produit300'],
    labels: ['Produit 200','Produit 300'],
    barColors:['chocolate'],
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true
    });

    /*
    * Vente  agent par mois
    */
    Morris.Bar({
    element: 'histogramme_ventePar_agent',
    data: vente_vendeur_mensuelle,
    xkey: 'y',
    ykeys: ['a'],
    labels: ['Montant'],
    barColors:['#87e7e1'],
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true
    });
    /*
    * Salaire par agent par mois
    */
    Morris.Bar({
    element: 'histogramme_salaire',
    data: salaire_vendeur_mensuelle,
    xkey: 'y',
    ykeys: ['a'],
    labels: ['Salaire'],
    barColors:['#03A9F3'],
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true
    });

 /*
    * retour  agent par mois
    */
    Morris.Bar({
    element: 'histogramme_retour_par_agent',
    data: retour_mensuelle,
    xkey: 'y',
    ykeys: ['a'],
    labels: ['quantite'],
    barColors:['red'],
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true
    });






  })
}
function printClientActif(url)
{
    document.location.href = url;
}
function dette_vendeur(rapor_mois_courant,annee_courante)
{
  //alert(rapor_mois_courant+' '+annee_courante);
  if(rapor_mois_courant === "" || annee_courante === "" )
  {
    //alert("Veuillez remplir tous les champs");
    swal({
      title :"Alert",
      text : "renseigner tout les champs",
      type :"error",
      timer :3000,
      showConfirmButton: false 
    });
  }
  else
  {
    var xhttp;  
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
        document.getElementById("dette_vendeur").innerHTML = this.responseText;
        /*swal({   
          text: "Information!",   
          title: this.responseText,
          type:"success",   
          timer: 3000,   
          showConfirmButton: false 
        });*/
    }
    };
    xhttp.open("GET", "ajax/rapport/rapport_vente_dashboard.php?rapor_mois_courant="+rapor_mois_courant+"&annee_courante="+annee_courante, true);
    xhttp.send();
  }
}