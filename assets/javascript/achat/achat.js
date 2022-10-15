
function enregistreAchat(article,quantite,prix_achat,date_achat)
{
       //alert(article+quantite+prix_achat+date_achat);
      if(article =="" || quantite =="" || prix_achat =="" || date_achat =="" )
      {
       //alert('veuillez renseigner tous les champs!');
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
                                              title: "Enregistrement achat reussie",
                                              type:"success",   
                                              timer: 3000,   
                                              showConfirmButton: false 
                                                });
                                    $('#article').val('');
                                    $('#quantite').val('');
                                    $('#prix_achat').val('');
                                 //   $('#date_achat').val('');
                }
                };
                xhttp.open("GET", "ajax/achat/enregistreAchat.php?article="+article+"&quantite="+quantite+"&prix_achat="+prix_achat+"&date_achat="+date_achat, true);
                xhttp.send();
      }
}

function ajoutCategorie(categorie_achat,description)
{
  //alert(categorie_achat+description);
      if(categorie_achat =="" || description =="" )
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
                var xhttp;  
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    document.getElementById("rep").innerHTML = this.responseText;
                       swal({   
                                              text: "Information!",   
                                              title: "insertion categorie reussie",
                                              type:"success",   
                                              timer: 3000,   
                                              showConfirmButton: false 
                                          });
                }
                };
                xhttp.open("GET", "ajax/achat/cree_categorie_achat.php?categorie_achat="+categorie_achat+"&description="+description, true);
                xhttp.send();
      }
} 
function updateachat(refchat,refprix,quantite)
{
     // alert(refchat+refprix+quantite);
      if(refchat == '' || refprix == '' || quantite == '')
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
            xhttp.open("GET", "ajax/achat/updateachat.php?refchat="+refchat+"&refprix="+refprix+"&quantite="+quantite, true);
            xhttp.send();
      }
}

 
 

function suppression_achat(numachat)
{
         //alert(numachat);
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
        xhttp.open("GET", "ajax/achat/supprimer_achat.php?numachat="+numachat, true);
        xhttp.send();
}







function updateClasse(old_code_classe,new_code_classe,degre,type,section)
{
  if(old_code_classe == '' || new_code_classe == '' || degre == ' ' || section == '')
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
    if (this.readyState == 4) {
        document.getElementById("msg").innerHTML = this.responseText;
        //$('.badge-counter').html(this.responseText);
    }
    };
    xhttp.open("GET", "ajax/classe/updateClasse.php?old_code_classe="+old_code_classe+"&new_code_classe="+new_code_classe+"&degre="+degre+"&type="+type+"&section="+section, true);
    xhttp.send();
  }
}
function achat_mensuel(annee,mois)
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
function achatdujour(jourachat_selectionne)
{
    //alert(annee+' '+mois);
    if ( jourachat_selectionne === "" )
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
        document.getElementById('print_rapport_du_jour').submit();
    }
}
function updatecategorie(refcat,refnom,description)
{
  if(refcat == '' || refnom == '' || description == '')
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
              document.getElementById("reponse").innerHTML = this.responseText;
                                          swal({   
                                              text: "Information!",   
                                              title: "modification reussie",
                                              type:"success",   
                                              timer: 3000,   
                                              showConfirmButton: false 
                                          });
          }
    };
    xhttp.open("GET", "ajax/achat/update_categorie.php?refcat="+refcat+"&refnom="+refnom+"&description="+description, true);
    xhttp.send();
  }
}
function suppression_categorie(numcat)
{
   var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
          if (this.readyState == 4) 
          {
              document.getElementById("reponse").innerHTML = this.responseText;
                                          swal({   
                                              text: "Information!",   
                                              title: "suppression reussie",
                                              type:"success",   
                                              timer: 3000,   
                                              showConfirmButton: false 
                                          });
          }
        };
        xhttp.open("GET", "ajax/achat/supprimer_categorie.php?numcat="+numcat, true);
        xhttp.send();
}