

function creer_vendeur(nom,prenom,fone,adresse,age,datevenu,salaire,statut)
{
  //alert(article+vendeur+qtetotale+qtevendue+qteretour+montant+datevente+frais_divers+note);
      if(nom === "" || prenom === "" || fone === "" || adresse === "" || age === "" || datevenu === "" || salaire === "" || statut === "")
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
                                              text: "vente reussie!",   
                                              title: "vous venez d'effectuer la vente avec success",
                                              type:"success",   
                                              timer: 3000,   
                                              showConfirmButton: false 
                                          });
                        $('#nom').val('');
                         $('#prenom').val('');
                          $('#fone').val('');
                           $('#adresse').val('');
                            $('#age').val('');
                             $('#datevenu').val('');
                }
                };
                xhttp.open("GET", "ajax/vendeur/creer_vendeur.php?nom="+nom+"&prenom="+prenom+"&fone="+fone+"&adresse="+adresse+"&age="+age+"&datevenu="+datevenu+"&salaire="+salaire+"&statut="+statut, true);
                xhttp.send();
      }
} 
function updatevendeur(idvendeur,nom,prenom,fone,adresse,age,datevenu,salaire)
{
     // alert(idvendeur+'/'+nom+'/'+prenom+'/'+fone+'/'+adresse+'/'+age+'/'+datevenu)
      if(idvendeur === "" || nom === "" || prenom === "" || fone === "" || adresse === "" || age === "" || datevenu === "" )
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
            xhttp.open("GET", "ajax/vendeur/update_vendeur.php?idvendeur="+idvendeur+"&nom="+nom+"&prenom="+prenom+"&fone="+fone+"&adresse="+adresse+"&age="+age+"&datevenu="+datevenu+"&salaire="+salaire, true);
            xhttp.send();
      }
}

 
 

function suppression_vendeur(refevendeur)
{
         //alert(refevendeur);
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
        xhttp.open("GET", "ajax/vendeur/supprimer_vendeur.php?refevendeur="+refevendeur, true);
        xhttp.send();
}







