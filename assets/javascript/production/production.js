
function newcategoriePro(catgopro,des_catego,prixproduit)
{
  //alert(catgopro+date_achat+'prix : '+prixproduit);
  if(catgopro =="" || des_catego =="" || prixproduit =="")
  {
    // alert('veuillez renseigner tous les champs!');
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
    if (this.readyState == 4) 
    {
      document.getElementById("rep").innerHTML = this.responseText;
      swal({   
        text: "Information!",   
        title: "Enregistrement achat reussie",
        type:"success",   
        timer: 3000,   
        showConfirmButton: false 
      });
      $('#categorie').val('');
      $('#des_catego').val(''); 
      $('#prixproduit').val('');                
    }
    };
    xhttp.open("GET", "ajax/production/ajoutcategorie.php?catgopro="+catgopro+"&des_catego="+des_catego+"&prixproduit="+prixproduit, true);
    xhttp.send();
  }
}
     
function cree_production(categorie,heuredebut,heurefin,qteproduite,dateproduction)
{
  //alert(categorie+' '+heuredebut+' '+heurefin+' '+qteproduite+' '+dateproduction);
  
  if(categorie == "" || heuredebut =="" || heurefin == "" || qteproduite == "" || dateproduction == "")
  {
    //alert('veuillez renseigner tous les champs!')
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
    var n = heuredebut.localeCompare(heurefin);
    if (n == -1) 
    {
      var xhttp;  
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4) 
      {
        document.getElementById("rep").innerHTML = this.responseText;
        swal({   
          text: "Information!",   
          title: "insertion production reussie",
          type:"success",   
          timer: 3000,   
          showConfirmButton: false 
        });
        $('#heuredebut').val('');
        $('#heurefin').val('');
        $('#qteproduite').val('');
       // $('#dateproduction').val('');
      }
      };
      xhttp.open("GET", "ajax/production/inserer_production.php?categorie="+categorie+"&heuredebut="+heuredebut+"&heurefin="+heurefin+"&qteproduite="+qteproduite+"&dateproduction="+dateproduction, true);
      xhttp.send();
    }
    else
    {
      swal({
        title :"Alert",
        text : "l'heure debut doit etre < heure fin",
        type :"error",
        timer :3000,
        showConfirmButton: false 
      });
    }
  }
} 
function updateproduction(refpro,hdebut,hfin,qteproduite,dateproduction)
{
  // alert(refpro+hdebut+hfin+qteproduite+dateproduction);
  if(refpro == '' || hdebut == '' || hfin == '' || qteproduite == "" || dateproduction == "")
  {
   // alert("Veuillez remplir tous les champs");
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
    if (this.readyState == 4) 
    {
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
    xhttp.open("GET", "ajax/production/update_production.php?refpro="+refpro+"&hdebut="+hdebut+"&hfin="+hfin+"&qteproduite="+qteproduite+"&dateproduction="+dateproduction, true);
    xhttp.send();
  }
}

 
 

function suppression_production(numpro)
{
         //alert(numpro);
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
        xhttp.open("GET", "ajax/production/supprimer_production.php?numpro="+numpro, true);
        xhttp.send();
}
function production_mensuelle(annee,mois)
{
    //alert(annee+' '+mois);
    if (annee === "" || mois === "" )
    {
        //alert('vous devez remplir tous les champs');
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
        document.getElementById('printRapport_mensuel').submit();
    }
}
function production_du_jour(jourproduction)
{
  //alert(jourproduction);
  if (jourproduction === "") 
  {
    //alert('vous devez remplir ce champs svp');
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
    document.getElementById('produitjour').submit();
  }

}






