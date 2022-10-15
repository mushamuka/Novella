
function new_user(nomuser,login,prenom,password,profil_id,datecreation)
{
  //alert(nomuser+'/ '+login+' /'+prenom+' /'+password+' /'+profil_id+'/'+datecreation);
  if (nomuser  == "" || prenom == "" || password == "" || profil_id == "" || login == "")
    {
       // alert('Les champs nom utilisateur, email ,mot de passe et le role\n ne doivent pas etre vide');
        swal({   
                title: "Erreur!",   
                text: "Remplissez tout les champs avec etoile *", 
                //type:"success",  
                timer: 3000,   
                showConfirmButton: false 
            });
            
    }
    /*else if (password != conf_password) 
    {
        //alert('Veillez confirmer le mot de passe celui que vous mettez ne pas le meme');
        swal({   
                title: "Erreur!",   
                text: "Veillez confirmer le mot de passe celui que vous mettez ne pas le meme", 
               // type:"success",  
                timer: 3000,   
                showConfirmButton: false 
            });
    } */                                               
    else 
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                var msg = document.getElementById('msg-add-user');
                msg.style.color = 'white';
                //var msg = "Creation reussie";
                
                    msg.innerHTML = this.responseText;
                    document.getElementById("retour").innerHTML = this.responseText;

                swal({   
                        title: "Ajout reussi!",   
                        text: "Vous venez d'ajouté un nouveau utilisateur", 
                        type:"success",  
                        timer: 3000,   
                        showConfirmButton: false 
                   });
                    $('#nomuser').val('');
                    $('#login').val('');
                    $('#prenom').val('');
                    $('#password').val('');
                    //$('#conf_password').val('');
                    //$('#mail_user').val('');
                
                //location.reload();
                 /*function refresh() { window.location.reload(false); } 
                document.location.href = "/crm.spidernet/utilisateur";*/
                //msg.style = 'green';
                
                //msg.innerHTML = 'L\'utilisateur ajouter avec succes';
                //document.getElementById("reponse").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET","ajax/utilisateur/creerUn_user.php?nomuser="+nomuser+"&prenom="+prenom+"&password="+password+"&profil_id="+profil_id+"&login="+login+"&datecreation="+datecreation,true);
        xhttp.send();
    }
}
function getprofilPermission(profil)
{
    var droit = $('#droit').val();
    if (profil == "") 
    {
        //alert('choisissez le profil');
        swal({   
            title: "Erreur!",   
            text: "choisissez le profil", 
            //type:"success",  
            timer: 3000,  
            type :'error', 
            showConfirmButton: false 
       });
    }
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4) 
        {
            document.getElementById("rs").innerHTML = this.responseText;
            
        }
    };
    xhttp.open("GET","ajax/utilisateur/affiche_profil.php?profil="+profil+"&droit="+droit,true);
    xhttp.send();
}
function setProfilUser()
{
    var nombrePage = $("input:checkbox:checked").length;
    if ($('#nom_profil').val() == '' || nombrePage == 0) 
    {
        alert('Verifier si vous avez entre le profil \n ou si vous avez aumoin attribuer un droit');
        swal({   
                        title: "Echec!",   
                        text: "Verifier si vous avez entrez le profil \n ou si vous avez au moins attribuer un droit", 
                        //type:"success",  
                        timer: 3000,   
                        showConfirmButton: false 
                   });
    }
    else
    {
        $("#form-profil-user").submit();

    }
}
function CocherLigneEntire(i)
{
  //alert('vous venez de cocher');
  if (document.getElementById(i).checked == true) 
    {
        document.getElementById("l"+i).checked = true;
        document.getElementById("c"+i).checked = true;
        document.getElementById("m"+i).checked = true;
        document.getElementById("s"+i).checked = true;
    }
    else
    {
        document.getElementById("l"+i).checked = false;
        document.getElementById("c"+i).checked = false;
        document.getElementById("m"+i).checked = false;
        document.getElementById("s"+i).checked = false;
    }
}
function supprimeprofil(numprof)
{
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4) 
        {
            document.getElementById("rs").innerHTML = this.responseText;
             swal({    title: "Information!",   
                      text: "Suppression reussie",
                      type:"success",   
                      timer: 3000,   
                      showConfirmButton: false 
                  });
        }
    };
    xhttp.open("GET","ajax/utilisateur/drop_profil.php?numprof="+numprof,true);
    xhttp.send();
}
function update_profil(iduser,profil_id)
{
    //alert(iduser+'    '+profil_id);
    if(iduser == "" || profil_id == "")
    {
        //alert('veuillez remplir tout le champ svp');
        swal({   
            title: "Erreur!",   
            text: "Veillez remplir tout le champs svp", 
            //type:"success",  
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
                document.getElementById("reponse").innerHTML = this.responseText;
                swal({   
                        title: "modification reussi!",   
                        text: "Vous venez de modifier l'utilisateur", 
                        type:"success",  
                        timer: 3000,   
                        showConfirmButton: false 
                   });
                //location.reload();
            }
        };
        xhttp.open("GET","ajax/Utilisateur/updateprofil.php?iduser="+iduser+"&profil_id="+profil_id,true);
        xhttp.send();
    }
}
function update_permission(idpermission,lire,creer,modifier,supprimer,i)
{
    var page_accept = 0;

    //alert(idpermission+' '+lire+' '+creer+' '+modifier+' '+supprimer);
    if (lire == '' || creer == '' || modifier == '' || supprimer == '') 
    {
        var msg = document.getElementById('msg'+i);
        msg.style.color = 'red';
        //msg.innerHTML = '';
        swal({   
            title: "Attention!",   
            text: "Veillez preciser les droits", 
            type:"success",  
            timer: 3000,   
            showConfirmButton: false 
       });
    }
    /*else if (parseInt(lire) < 0 || parseInt(lire) > 1 || parseInt(creer) < 0 || parseInt(creer) > 1 || parseInt(modifier) < 0 || parseInt(modifier) > 1 || parseInt(supprimer) < 0 || parseInt(supprimer) >1) 
    {
        var msg = document.getElementById('msg'+i);
        msg.style.color = 'red';
        msg.innerHTML = 'le droit doit etre 0 ou 1';
        swal({   
            title: "Attention!",   
            text: "le droit doit etre 0 ou 1", 
            type:"success",  
            timer: 3000,   
            showConfirmButton: false 
       });
    }*/
    else
    {
        if (lire == 1) page_accept = 1;
        if (creer == 1) page_accept = 1;
        if (modifier == 1) page_accept = 1;
        if (supprimer == 1) page_accept = 1;
        var profil_id = $('#profile_name').val();
        var droit = $('#droit').val();
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                var msg = document.getElementById('msg'+i);
                //msg.style.color = 'red';
                //location.reload();
                document.getElementById('rs').innerHTML = this.responseText;
                msg.innerHTML = this.responseText;
                swal({   
                    title: "Ajout reussi!",   
                    text: "octroi de droit reussi", 
                    type:"success",  
                    timer: 3000,   
                    showConfirmButton: false 
               });
            }
        };
        xhttp.open("GET","ajax/utilisateur/update_permission.php?idpermission="+idpermission+"&lire="+lire+"&creer="+creer+"&modifier="+modifier+"&supprimer="+supprimer+"&page_accept="+page_accept+"&profil_id="+profil_id+"&droit="+droit,true);
        xhttp.send();
    }
}
function deletecet_utilisateur(iduser_delete)
{
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4) 
        {
            document.getElementById("reponse").innerHTML = this.responseText;
                  swal({   
                        title: "suppression reussi!",   
                        text: "Vous venez de supprimer ce utilisateur", 
                        type:"success",  
                        timer: 3000,   
                        showConfirmButton: false 
                     });
        }
    };
    xhttp.open("GET","ajax/Utilisateur/supprimer_user.php?iduser_delete="+iduser_delete,true);
    xhttp.send(); 
}
function changemp(nomss,confirmer,nouveaupassword)
{
    //alert(nomss+' '+confirmer+' '+nouveaupassword);
    if(nomss == "" || confirmer == "" || nouveaupassword == "")
    {
        //alert('veuillez remplir tout le champ svp');
         swal({   
            title: "suppression reussi!",   
            text: "veuillez remplir tout le champ svp", 
            type:"success",  
            timer: 3000,   
            showConfirmButton: false 
         });
    }
    if (confirmer != nouveaupassword ) 
    {
        //alert('Veillez vonfirmer le mot de passe svp');
        swal({   
            title: "Attention!",   
            text: "Veillez vonfirmer le mot de passe svp", 
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
                var ms =String(this.responseText).trim();
                if (ms == "Vous venez de changer votre mot de passe avec succès") 
                {
                    document.getElementById("rep").innerHTML = this.responseText;
                    swal({    
                      title: "vous venezModifier le mot de passe avec success!",   
                      text: "Modification reussie",
                      type:"success",   
                      timer: 3000,   
                      showConfirmButton: false 
                    });
                    document.location.href = "/novella/deconnexion";
                }
            }
        };
        xhttp.open("GET","ajax/utilisateur/change_mot_depasse.php?nomss="+nomss+"&nouveaupassword="+nouveaupassword,true);
        xhttp.send();
    }
}
function modifier_profil(idprof,nomprofil)
{
    //alert(idprof+nomprofil);
    if(idprof == "" || nomprofil == "")
    {
        
         swal({    title: "veuillez remplir tout le champ svp!",   
                      text: "Modification reussie",
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
                document.getElementById("rs").innerHTML = this.responseText;
                 swal({       title: "Modification reussie!",   
                      text: "vous venez de modifier avec success",
                      type:"success",   
                      timer: 3000,   
                      showConfirmButton: false 
                  });
                //location.reload();
            }
        };
        xhttp.open("GET","ajax/utilisateur/modifierProfiluser.php?idprof="+idprof+"&nomprofil="+nomprofil,true);
        xhttp.send();
    }
}
function modif_detailprofil(identifiant,nomuser,prenomuser,loginuser)
{
    //alert(identifiant+'/'+nomuser+'/'+prenomuser+'/'+loginuser);
    if(identifiant == "" || nomuser == "" || prenomuser  == "" || loginuser == "")
    {
        alert('veuillez remplir tout le champ svp');
    }
    else
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                //document.getElementById("rep").innerHTML = this.responseText;
                location.reload();
                swal({title: "Modification reussie!",   
                      text: "vous venez de modifier le profil",
                      type:"success",   
                      timer: 3000,   
                      showConfirmButton: false 
                  });
            }
        };
        xhttp.open("GET","ajax/utilisateur/modifier_detail_profiluser.php?identifiant="+identifiant+"&nomuser="+nomuser+"&prenomuser="+prenomuser+"&loginuser="+loginuser,true);
        xhttp.send();
    }
}







