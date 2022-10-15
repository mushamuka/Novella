
function creevente(produit,vendeur,qtetotale,qtevendue,dette,montant,datevente,frais_divers,note)
{


    var val = produit.split(/_/);
    produit = val[0];
    quantite = val[1];
    idproduction = val[2];
    prix = val[3];
    alert('le prix :'+prix+'le produit :'+produit+'quantite :'+quantite)

 
       if( qtetotale > quantite)
        {
         // alert('la quantite totale est superieur a la quantite produite');
           swal({
                title :"Alert",
                text : "La quantite totale est superieur a la quantite produite",
                type :"error",
                timer :3000,
                showConfirmButton: false 
                 });
        }

      if(produit === "" || vendeur === "" || qtetotale === "" || qtevendue === "" || dette === "" || montant === "" || datevente === "" || frais_divers === ""  )
          {
            //alert('renseigner tout le champs');
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
                    document.getElementById("rep").innerHTML = this.responseText;
                       swal({   
                                              text: "vente reussie!",   
                                              title: "vous venez d'effectuer la vente avec success",
                                              type:"success",   
                                              timer: 3000,   
                                              showConfirmButton: false 
                                          });
                                          $('#produit').val('');
                                          $('#qtetotale').val('');
                                          $('#qtevendue').val('');
                                          $('#dette').val('');
                                          $('#montant').val('');
                                          $('#frais_divers').val('');
                                          $('#note').val('');
                }
                };
                xhttp.open("GET", "ajax/vente/creer_vente.php?produit="+produit+"&vendeur="+vendeur+"&qtetotale="+qtetotale+"&qtevendue="+qtevendue+"&dette="+dette+"&montant="+montant+"&datevente="+datevente+"&frais_divers="+frais_divers+"&note="+note+"&idproduction="+idproduction, true);
                xhttp.send();
      }
} 
function updatevente(idvente,qtetotale,qtevendue,qteretour,montant,datevente,frais_divers,note)
{
     // alert(idvente+'/'+qtetotale+'/'+qtevendue+'/'+qteretour+'/'+montant+'/'+datevente+'/'+frais_divers+'/'+note)
      if(idvente === "" || qtetotale === "" || qtevendue === "" || qteretour === "" || montant === "" || datevente === "" || frais_divers === "" || note === "")
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
                document.getElementById("rep").innerHTML = this.responseText;
                   swal({   
                                              text: "Information!",   
                                              title: "Modification reussie",
                                              type:"success",   
                                              timer: 3000,   
                                              showConfirmButton: false 
                                          });
            }
            };
            xhttp.open("GET", "ajax/vente/update_vente.php?idvente="+idvente+"&qtetotale="+qtetotale+"&qtevendue="+qtevendue+"&qteretour="+qteretour+"&montant="+montant+"&datevente="+datevente+"&frais_divers="+frais_divers+"&note="+note, true);
            xhttp.send();
      }
}

 
 

function suppression_vente(numvente)
{
         //alert(numvente);
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
          if (this.readyState == 4) 
          {
              document.getElementById("rep").innerHTML = this.responseText;
                                          swal({   
                                              text: "Information!",   
                                              title: "suppression reussie",
                                              type:"success",   
                                              timer: 3000,   
                                              showConfirmButton: false 
                                          });
          }
        };
        xhttp.open("GET", "ajax/vente/supprimer_vente.php?numvente="+numvente, true);
        xhttp.send();
}
function getventejour(ventejour)
{
  if (ventejour === "") 
  {
    //alert("vous devez remplir ce champs");
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
    document.getElementById('rapport_ventejour').submit();
  }
}
function rapportdette_agent(agent,mois,annee)
{
  //alert(agent+'_'+mois+'_'+annee);
  if (agent === "" || mois === "" || annee ==="") 
  {
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
     document.getElementById('rapport_dette').submit();
   }
}
function getvente_mensuelle(mois,annee)
{
  if (mois === "" || annee ==="") 
  {
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
     document.getElementById('rapport_vente_mensuelle').submit();
   }
}
function calculretour(qtetotale,qtevendue)
{
  //alert(qtetotale+qtevendue);
  var qtetotale ;
  var qtevendue ;

  if (qtetotale < qtevendue) 
  {
    swal({
                  title :"Alert",
                  text : "la quantite totale doit etre superieur a la quantite vente",
                  type :"error",
                  timer :3000,
                  showConfirmButton: false 



                   });
  }
  else 

  {
     var qtetotale ;
     var qtevendue ;
    var rs =0;
    var rs = document.getElementById('qtetotale').value - document.getElementById('qtevendue').value ;
    
    document.getElementById("qteretour").value = rs;
  }
  /*
   else if (qtetotale != '' && qtevendue != '') 
  {
    var qteretour = document.getElementById('qtetotale').value - document.getElementById('qtevendue').value ;
    
    document.getElementById("qteretour").value = qteretour;
  }
  */
}
function printFiltre_vente()
{
     var cond = $('#cond').val();
    if ($('#cond').val() == '') alert('Veuillez filtrer d\'abord!');
    else document.getElementById("form-filtre_stock").submit();
}
function resetFiltrevente()
{
    var WEBROOT = $('#WEBROOT').val();
    document.location.href = WEBROOT+"vente";
}
function filtre_ventes(categorie,idvendeur,datecreation,mois,annee_vente)
{
  var WEBROOT = $('#WEBROOT').val();
    var condition1 = null;
    var condition2 = null;
    var condition3 = null;
    var condition4 = null;
    var condition5 = null;
    var condition = '';
    // alert(categorie+' /'+idvendeur+'/'+datecreation+'/'+mois+'/'+annee_vente);
 

    if (typeof categorie == 'undefined') {categorie = '';}
    
  if (categorie == '') 
  {
    condition1 = '';
    
  }
  else
  {
    condition1 = " categorie.statut="+categorie;
  }
  if (idvendeur == '') 
  {
    condition2 = '';
  }
    else
  {
    
    condition2 = " vendeur.nomVendeur="+idvendeur;
  }
  if (datecreation == '') 
  {
    condition3 = '';
  }
  else
  {
    if (datecreation != '') 
    {
   
      //condition3 = " date_vente BETWEEN '"+date1+"' AND '"+date2+"'";
      condition3 = " date_vente='"+datecreation+"' ";
      condition3 = '';
    }
    else condition3 = " date_vente='"+datecreation+"' ";
 
  }

  if (mois == '') 
    {
        condition4 = '';
    }
    else
    {
        if (annee_vente != '') 
        {
            condition4 = " v.date_vente='"+mois+"' AND v.date_vente="+annee_vente;
        }
    }

  condition1 = (condition1 == '' ? '' : 'AND' +condition1);
  condition2 = (condition2 == '' ? '' : 'AND' +condition2);
  condition3 = (condition3 == '' ? '' : 'AND' +condition3);
  ondition4 = (condition4 == '' ? '' : 'AND' +condition4);
   //ondition5 = (condition5 == '' ? '' : 'AND' +condition5);

  //on met ensemble les condition pour pouvoir constituer une seule condition
  condition = condition1+condition2+condition3+condition4;

   if (condition == '') 
    {
    }
    else
    {
        $('#cond').val(condition);
        //var m = $('#m').val();
        //var s = $('#s').val();
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                $('#myTable').DataTable().destroy();
                var data = document.getElementById('rep').innerHTML = this.responseText;
                $('#myTable').DataTable();
            }
        };
        xhttp.open("GET","ajax/vente/filtre_vente.php?condition="+condition+"&WEBROOT="+WEBROOT,true);
        xhttp.send();
    }
}










