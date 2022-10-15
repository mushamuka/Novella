function Nouvellecategorie(libelle,datecreation)
{
   // alert(libelle+etat+groupe+datecreation);
  if (libelle == "" || datecreation == "" ) 
    {
        //alert('Veillez remplir tous les champs!');
        swal({    title: "Information!",   
                          text: "Veillez remplir la categorie",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                    });
    }
    else
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4) 
            {
                document.getElementById("rep").innerHTML = this.responseText;
                swal({    title: "",   
                          text: "Creation reussie",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                    });
                $('#libelle').val('');
            }
        };
        xhttp.open("GET","ajax/stock/nouvelle_categorie_b.php?libelle="+libelle+"&datecreation="+datecreation,true);
        xhttp.send();
    }
}

function creestock_boisson(categorie_stock,article,prix_achat,prix_vente,nbrpar_casier,date_achat,seuil,note)
{
    //alert(categorie_stock+'/ '+article+' /'+prix_achat+' /'+prix_vente+' /'+seuil+' '+nbrpar_casier+'/'+date_achat+'/'+note);
 if (categorie_stock == "" || article == "" || prix_vente == "" || prix_achat == "" ||seuil == "" || date_achat == "" || nbrpar_casier== "" || note == ""  ) 
    {
        //alert('Veillez remplir tous les champs!');
        swal({    title: "Information!",   
                          text: "Veillez remplir la categorie",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                    });
    }
    else
        {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4) 
                {
                  document.getElementById("rep").innerHTML = this.responseText;
                  swal({    title: "",   
                  text: "Creation reussie",
                  type:"success",   
                  timer: 1000,   
                  showConfirmButton: false 
                  });
                  location.reload();
                  /*$('#categorie_stock').val('');
                  $('#article').val('');
                  $('#prix_achat').val('');
                  $('#prix_vente').val('');
                  $('#nbrpar_casier').val('');
                  $('#seuil').val('');
                  $('#date_achat').val('');

                  $('#note').val('');*/

            }
           }; 
        xhttp.open("GET","ajax/stock/nouvelle_produit.php?categorie_stock="+categorie_stock+"&article="+article+"&prix_achat="+prix_achat+"&prix_vente="+prix_vente+"&nbrpar_casier="+nbrpar_casier+"&date_achat="+date_achat+"&seuil="+seuil+"&note="+note,true);
        xhttp.send();
    }
}



function creestock_nourriture(categorie_aliment,aliment,quantite_n,unite,prix_achat,seuil,photo_aliment,date_achat,note)
{
     //alert(categorie_aliment+'/ '+aliment+' /'+quantite_n+' /'+unite+' /'+date_achat+'/'+note+'/ '+photo_aliment);
  if (categorie_aliment == "" || aliment == "" || quantite_n == "" || unite == "" ||seuil == "" || prix_achat == "" || photo_aliment== "" || date_achat == ""  ) 
    {
        //alert('Veillez remplir tous les champs!');
        swal({    title: "Information!",   
                          text: "Veillez remplir ce champs",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                    });
    }
    else
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                document.getElementById("rep").innerHTML = this.responseText;
                swal({    title: "",   
                          text: "Creation reussie",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                    });
                $('#categorie_aliment').val('');
                $('#aliment').val('');
                $('#quantite_n').val('');
                $('#prix_achat').val('');
                $('#seuil').val('');
                 $('#photo_aliment').val('');
                $('#note').val('');

            }
        };
        xhttp.open("GET","ajax/stock/nouvelle_nourriture.php?categorie_aliment="+categorie_aliment+"&aliment="+aliment+"&quantite_n="+quantite_n+"&unite="+unite+"&prix_achat="+prix_achat+"&seuil="+seuil+"&photo_aliment="+photo_aliment+"&date_achat="+date_achat+"&note="+note,true);
        xhttp.send();
    }
   
}
function nouvelle_unite(unite,note,dateajout)
{
      //alert(unite+'/ '+note+' /'+dateajout);
  if (unite == "" || note == "" || dateajout == "" ) 
    {
        //alert('Veillez remplir tous les champs!');
        swal({    title: "Information!",   
                          text: "Veillez remplir la categorie",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                    });
    }
    else
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                document.getElementById("rep").innerHTML = this.responseText;
                swal({    title: "",   
                          text: "Creation reussie",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                    });
                $('#unite').val('');
              $('#note').val('');
                $('#dateajout').val('');

            }
        };
        xhttp.open("GET","ajax/stock/nouvelle_unite.php?unite="+unite+"&note="+note+"&dateajout="+dateajout,true);
        xhttp.send();
    }
}
function Updateunite(ref,unite,note,dateajout)
{
    if (ref == '' || unite == '' || note =='' || dateajout == '') 
    {
        //alert('Le nom et le montant ne doivent pas etre vide et le montant ne doit pas etre <= 0');
        swal({    title: "Information!",   
                          text: "Veillez remplir tous le champs",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                    });
    }
    else
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                document.getElementById("rep").innerHTML = this.responseText;
                swal({
                    title :"Modification d'unite reusie",
                    text :"Information",
                    timer :2000,
                    type :"success",
                    showConfirmButton: false
                });
            }
        };
        xhttp.open("GET","ajax/stock/updateUnite.php?ref="+ref+"&unite="+unite+"&note="+note+"&dateajout="+dateajout,true);
        xhttp.send();
    }
}
function delete_unite(id_unite)
{
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4) 
        {
            document.getElementById("rep").innerHTML = this.responseText;
            swal({    
                title: "Vous venez de supprimer cette unite!",   
                      text: "Information",
                      type:"success",   
                      timer: 3000,   
                      showConfirmButton: false 
                });
        }
    };
    xhttp.open("GET","ajax/stock/delete_unite.php?id_unite="+id_unite,true);
    xhttp.send();
}
function modifier_stock(ref,quantite_b,note,date_stock)
{
    //alert(ref+' /'+quantite_b+' /'+note+'/ '+date_stock);
  if (ref == "" || quantite_b  == "" || note == ""  ) 
    {
        //alert('Veillez remplir tous les champs!');
        swal({    title: "Information!",   
                          text: "Veillez remplir la categorie",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                    });
    }
    else 
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                document.getElementById("res").innerHTML = this.responseText;
                swal({    title: "",   
                          text: "Modification reussie",
                          type:"success",   
                          timer: 2000,   
                          showConfirmButton: false 
                    });
                location.reload();

            }
        };
        xhttp.open("GET", "ajax/stock/modifier_stock.php?ref="+ref+"&quantite_b="+quantite_b+"&note="+note+"&date_stock="+date_stock, true);
        xhttp.send();
    }
}

function suprimer_histo_stock(id_histock)
{
 //alert(id_histock);
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4) 
        {
            document.getElementById("res").innerHTML = this.responseText;
            swal({    
                title: "Vous venez de supprimer cette boisoon!",   
                      text: "Information",
                      type:"success",   
                      timer: 3000,   
                      showConfirmButton: false 
                });
        }
    };
    xhttp.open("GET", "ajax/stock/suprimer_article_stock.php?id_histock="+id_histock, true);
    xhttp.send();
}

function delete_boisson(ref_boisson)
{
  //alert(ref_n);
  var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4) 
        {
            document.getElementById("rep").innerHTML = this.responseText;
            swal({    
                title: "Vous venez de supprimer cette boisson!",   
                      text: "Information",
                      type:"success",   
                      timer: 3000,   
                      showConfirmButton: false 
                });
        }
    };
    xhttp.open("GET","ajax/stock/supprimer_boisson.php?ref_boisson="+ref_boisson,true);
    xhttp.send();
}
function getcategorie(categorie)
{
  //alert(categorie);
 // var droit = $('#droit').val();
  if (categorie == "") 
  {
     swal({   
            title: "Arreur!",   
            text: "choisissez la categorie", 
            type:"error",  
            timer: 3000,   
            showConfirmButton: false 
       });
  }
   var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4) 
        {
            document.getElementById("rep").innerHTML = this.responseText;
            
        }
    };
    xhttp.open("GET","ajax/stock/articlepar_categorie.php?categorie="+categorie,true);
    xhttp.send();
}
function getcategoris(article)
{
 
  if (article == "") 
  {
     swal({   
            title: "Arreur!",   
            text: "choisissez la categorie", 
            type:"error",  
            timer: 3000,   
            showConfirmButton: false 
       });
  }
   var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4) 
        {
            document.getElementById("reponse").innerHTML = this.responseText;
            
        }
    };
    xhttp.open("GET","ajax/stock/liste_articleparcategorie.php?article="+article,true);
    xhttp.send();
}
function nouvelle_stock(refcategorie_stock,quantite,note,datestock)
{
  var id_article = $('#id_article').val();

    //alert('ID categorie: '+refcategorie_stock+' :id_article :'+id_article+':  qte: '+quantite+' : date: '+datestock+' note :'+note)
 if (id_article === "" || quantite === "") 
    {
      
      swal({   
          text: "Attention",   
          title: "Veillez selectionnez l'article et la quantite svp",
          type:"error",   
          timer: 3000,   
          showConfirmButton: false 
          });
    }
    else
      {
        var xhttp;  
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4) 
        {
          document.getElementById("res").innerHTML = this.responseText;
          swal({   
          text: "Information!",   
          title: "Vous venez de creer le stock avec success",
          type:"success",   
          timer: 2000,   
          showConfirmButton: false 
          });
         location.reload();
                    
        }
        };
        xhttp.open("GET","ajax/stock/creation_Stock.php?refcategorie_stock="+refcategorie_stock+"&id_article="+id_article+"&quantite="+quantite+"&note="+note+"&datestock="+datestock,true);
        xhttp.send();
      }
}
function modifier_article(numarticle,articles,pa_unitaire,pv_unitaire,nb_casier,seuil,note,date_article)
{
  //alert('ID categorie: '+refcategorie_stock+' :id_article :'+id_article+':  qte: '+quantite+' : date: '+datestock+' note :'+note)
   if (numarticle === "") 
    {
      alert('Veillez remplir tout le champs');
    }
    else
      {
        var xhttp;  
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4) 
        {
          document.getElementById("rep").innerHTML = this.responseText;
          swal({   
          text: "Information!",   
          title: "Vous venez de modifier cet article avec success",
          type:"success",   
          timer: 20000,   
          showConfirmButton: false 
          });
          location.reload();
                    
        }
        };
        xhttp.open("GET","ajax/stock/modifier_article.php?numarticle="+numarticle+"&articles="+articles+"&pa_unitaire="+pa_unitaire+"&pv_unitaire="+pv_unitaire+"&nb_casier="+nb_casier+"&seuil="+seuil+"&note="+note+"&date_article="+date_article,true);
        xhttp.send();
      }
}
function control(datecontrol,today)
{
 var nb =$('#nb_article').val();
  if (datecontrol > today) 
  {
   // alert('desolé la date de control ne doit pas etre > a celle du jour');
     swal({   
            title: "Arreur!",   
            text: "desolé la date de control ne doit pas etre > a celle du jour", 
            type:"error",  
            timer: 3000,   
            showConfirmButton: false 
       });
  }
  else
  {
    //alert('ok insertion');
    var testpresence_erreur = '';
  for (var i = 0; i < nb ; i++) 
  {
   
    var id_article =$('#id_article'+i).val();
    var qte_disponible_en_stcok = $('#qte_disponible_en_stcok'+i).val(); 
    var quantite_ajoute= $('#quantite_ajoute'+i).val();

   
    if (id_article === "" || quantite_ajoute ===""  ) 
    {
      testpresence_erreur ="erreur";

       swal({   
            title: "Arreur!",   
            text: "la quantite ne doit pas resté vide", 
            type:"error",  
            timer: 3000,   
            showConfirmButton: false 
       });
       break;
    }
    else if ( parseInt(quantite_ajoute ) > parseInt(qte_disponible_en_stcok)) 
    {
       testpresence_erreur ="erreur";

       swal({   
            title: "Arreur!",   
            text: "la qte ajouter doit etre inferieur ou egale à celle se trouvant dans le stock", 
            type:"error",  
            timer: 3000,   
            showConfirmButton: false 
       });
     
      break;
    }
    

  }
      if (testpresence_erreur =='' ) 

      {
        
       
          for (var i = 0; i < nb ; i++) 
          {

              var id_article =$('#id_article'+i).val();
              var qte_disponible_en_stcok = $('#qte_disponible_en_stcok'+i).val(); 
              var quantite_ajoute= $('#quantite_ajoute'+i).val();
              var xhttp;  
              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
              if (this.readyState == 4) 
              {
              document.getElementById("control").innerHTML = this.responseText;
              swal({   
              text: "Information!",   
              title: "Vous venez de modifier cet article avec success",
              type:"success",   
              timer: 3000,   
              showConfirmButton: false 
              });
              location.reload();

              }
              };
              xhttp.open("GET","ajax/stock/control_article.php?id_article="+id_article+"&quantite_ajoute="+quantite_ajoute+"&qte_disponible_en_stcok="+qte_disponible_en_stcok+"&datecontrol="+datecontrol,true);
              xhttp.send();
   }
       
      }
  }

} 

function getValue(id_article) 
{
    // Sélectionner l'élément input et récupérer sa valeur
    //var input = document.getElementById("in").value;
    // Afficher la valeur
   // alert(ddd);

    if (id_article === "" ) 
    {
        alert('Veillez remplir tout le champs');
      //alert('article : '+id_article+'qte initial :'+qte_initial+'qte disponible: '+qte_disponible+'  :date :'+ datecontrol);
    }
    else
      {
        //alert('vers insertion');
        var xhttp;  
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4) 
        {
          document.getElementById("").innerHTML = this.responseText;
          swal({   
          text: "Information!",   
          title: "Vous venez de modifier cet article avec success",
          type:"success",   
          timer: 20000,   
          showConfirmButton: false 
          });
          //location.reload();
                    
        }
        };
        xhttp.open("GET","ajax/stock/control_article.php?id_article="+id_article+"&qte_dispo="+qte_dispo+"&qte_initiale="+qte_initiale+"&datecontrol="+datecontrol,true);
        xhttp.send();
      }
}
function print_article()
{
     var cond = $('#cond').val();
    if ($('#cond').val() == '') alert('Veuillez filtrer d\'abord!');
    else document.getElementById("form-article").submit();
}
function resetFiltrearticle()
{
    var WEBROOT = $('#WEBROOT').val();
    document.location.href = WEBROOT+"article";
}
function filtre_article(idarticle,categorie,date1,date2)
{
    //alert(idclient+' '+secteur+' '+date1+' '+date2);
    var WEBROOT = $('#WEBROOT').val();
    var condition1 = null;
    var condition2 = null;
    var condition3 = null;
    var condition4 = null;
    var condition = '';
   // var url = $_GET['url'];
  //  var session_user = $_GET['session_user'];
    /*if ($_GET['idarticle'] == '') 
    {
      $valIdclient = '';
      $condition1 = '';
    }*/
     if (typeof idarticle == 'undefined') {idarticle = '';}
      if (idarticle == '') 
    {
     // $valIdclient = '';
      condition1 = '';
    }
    else
    {
      //$valIdclient = $_GET['idarticle'];
      condition1 = " article.ID="+idarticle;
    }
  if (categorie == '') 
  {
   // $valsecteur = '';
    condition2 = '';
    
  }
  else
  {
    //$valsecteur = $_GET['categorie'];
    condition2 = " categorie.IDCAT="+categorie;
  }
  if (date1 == '') 
  {
   // $valDate1 = '';
    condition3 = '';
  }
  else
  {
    //$valDate1 = $_GET['date1'];
    condition3 = " DATECREAT='"+date1+"' ";
  }
  if (date2 == '') 
  {
    //$valDate2 = '';
    condition4 = '';
  }
  else
  {
    if (date1 != '') 
    {
     // $valDate2 = $_GET['date2'];
      condition4 = " DATECREAT BETWEEN '"+date1+"' AND '"+date2+"'";
      condition3 = '';
    }
    else condition4 = " DATECREAT='"+date2+"' ";
  }

  condition1 = (condition1 == '' ? '' : 'AND' +condition1);
  condition2 = (condition2 == '' ? '' : 'AND' +condition2);
  condition3 = (condition3 == '' ? '' : 'AND' +condition3);
  condition4 = (condition4 == '' ? '' : 'AND' +condition4);

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
        xhttp.open("GET","ajax/stock/filtrearticle_dispo.php?condition="+condition+"&WEBROOT="+WEBROOT/*+"&url="+url+"&session_user="+session_user*/,true);
        xhttp.send();
    }
 
}
function printFiltre_stock()
{
     var cond = $('#cond').val();
    if ($('#cond').val() == '') alert('Veuillez filtrer d\'abord!');
    else document.getElementById("form-filtre_stock").submit();
}
function resetFiltrestock()
{
    var WEBROOT = $('#WEBROOT').val();
    document.location.href = WEBROOT+"stock";
}
function filtre_stock(categorie,date1,date2)
{
  var WEBROOT = $('#WEBROOT').val();
    var condition1 = null;
    var condition2 = null;
    var condition3 = null;
    //var condition4 = null;
    var condition = '';
   // var url = $_GET['url'];
  //  var session_user = $_GET['session_user'];
    /*if ($_GET['idarticle'] == '') 
    {
      $valIdclient = '';
      $condition1 = '';
    }*/
     if (typeof categorie == 'undefined') {categorie = '';}
    
  if (categorie == '') 
  {
   // $valsecteur = '';
    condition1 = '';
    
  }
  else
  {
    //$valsecteur = $_GET['categorie'];
    condition1 = " categorie.IDCAT="+categorie;
  }
  if (date1 == '') 
  {
   // $valDate1 = '';
    condition2 = '';
  }
  else
  {
    //$valDate1 = $_GET['date1'];
    condition2 = " DATECREAT='"+date1+"' ";
  }
  if (date2 == '') 
  {
    //$valDate2 = '';
    condition3 = '';
  }
  else
  {
    if (date1 != '') 
    {
     // $valDate2 = $_GET['date2'];
      condition3 = " DATECREAT BETWEEN '"+date1+"' AND '"+date2+"'";
      condition3 = '';
    }
    else condition3 = " DATECREAT='"+date2+"' ";
  }

  condition1 = (condition1 == '' ? '' : 'AND' +condition1);
  condition2 = (condition2 == '' ? '' : 'AND' +condition2);
  condition3 = (condition3 == '' ? '' : 'AND' +condition3);
  //condition4 = (condition4 == '' ? '' : 'AND' +condition4);

  //on met ensemble les condition pour pouvoir constituer une seule condition
  condition = condition1+condition2+condition3;

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
                var data = document.getElementById('res').innerHTML = this.responseText;
                $('#myTable').DataTable();
            }
        };
        xhttp.open("GET","ajax/stock/filtre_produitEnstock.php?condition="+condition+"&WEBROOT="+WEBROOT/*+"&url="+url+"&session_user="+session_user*/,true);
        xhttp.send();
    }
}
function pdf_control()
{
     var cond = $('#cond').val();
    if ($('#cond').val() == '') alert('Veuillez filtrer d\'abord!');
    else document.getElementById("form-control").submit();
}
function resetFiltre_control()
{
   var WEBROOT = $('#WEBROOT').val();
    document.location.href = WEBROOT+"ancien_control";
}
function filtre_controlPasse(categorie,date1)
{
  var WEBROOT = $('#WEBROOT').val();
    var condition1 = null;
    var condition2 = null;
   /* var condition3 = null;
    var condition4 = null;*/
    var condition = '';
   // var url = $_GET['url'];
  //  var session_user = $_GET['session_user'];
    /*if ($_GET['idarticle'] == '') 
    {
      $valIdclient = '';
      $condition1 = '';
    }*/
     if (typeof categorie == 'undefined') {categorie = '';}
    
  if (categorie == '') 
  {
   // $valsecteur = '';
    condition1 = '';
    
  }
  else
  {
    
    condition1 = " categorie.IDCAT="+categorie;
  }

  if (date1 == '') 
  {
    
    condition2 = '';
  }
  else
  {
    if (date1 != '') 
    {
   
      condition2 = " date_control BETWEEN '"+date1;
      condition2 = '';
    }
    else condition2 = " date_control='"+date1+"' ";
  }

  condition1 = (condition1 == '' ? '' : 'AND' +condition1);
  condition2 = (condition2 == '' ? '' : 'AND' +condition2);
  /*condition3 = (condition3 == '' ? '' : 'AND' +condition3);
  condition4 = (condition4 == '' ? '' : 'AND' +condition4);*/

  //on met ensemble les condition pour pouvoir constituer une seule condition
  condition = condition1+condition2;

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
                var data = document.getElementById('retour').innerHTML = this.responseText;
                $('#myTable').DataTable();
            }
        };
        xhttp.open("GET","ajax/stock/filtre_controlPasse.php?condition="+condition+"&WEBROOT="+WEBROOT/*+"&url="+url+"&session_user="+session_user*/,true);
        xhttp.send();
    }
}