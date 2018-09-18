function verifMail(champ){
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value)){
        surligne(champ, true);
        $("#mail").attr("title", "Veuillez renseigner un e-mail valide");
        return false;
    }else{
        surligne(champ,false);
        $("#mail").attr("title", "");
        return true;
    }
};

function verifLastName(champ){
    var regex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
    var parent = $('#lastName').parent();

    if(!regex.test(champ.value)){
        surligne(champ, true);
        if(parent.children('.invalid-feedback').length > 0){
           parent.children('.invalid-feedback').html(' Le format est invalide ');
       }else{
           parent.append("<div class='invalid-feedback'>Le format est invalide</div>");
        }
        return false;
    }else{ 
       if(champ.value.length < 2){
          surligne(champ, true);
          if(parent.children('.invalid-feedback').length > 0){
            parent.children('.invalid-feedback').html('Veuillez renseigner au moins 2 caractères');
          }else{
            parent.append("<div class='invalid-feedback'>Veuillez renseigner au moins 2 caractères</div>");
          }
           return false;
       }else if(champ.value.length > 40){
           surligne(champ, true);
           if(parent.children('.invalid-feedback').length > 0){
             parent.children('.invalid-feedback').html(' Le Nom ne doit pas dépasser 40 caractères ');
           }else{
              parent.append("<div class='invalid-feedback'>Le Nom ne doit pas dépasser 40 caractères</div>");
           }
        return false;
     }else{
        surligne(champ, false);
        parent.remove('.invalid-feedback');
        return true;
      }
    }
};


function verifFirstName(champ){
    var regex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
    var parent = $('#firstName').parent();

    if(!regex.test(champ.value)){
        surligne(champ, true);
        if(parent.children('.invalid-feedback').length > 0){
           parent.children('.invalid-feedback').html(' Le format est invalide ');
       }else{
           parent.append("<div class='invalid-feedback'>Le format est invalide</div>");
        }
        return false;
    }else{ 
       if(champ.value.length < 2){
          surligne(champ, true);
          if(parent.children('.invalid-feedback').length > 0){
            parent.children('.invalid-feedback').html('Veuillez renseigner au moins 2 caractères');
          }else{
            parent.append("<div class='invalid-feedback'>Veuillez renseigner au moins 2 caractères</div>");
          }
           return false;
       }else if(champ.value.length > 40){
           surligne(champ, true);
           if(parent.children('.invalid-feedback').length > 0){
             parent.children('.invalid-feedback').html(' Le Prénom ne doit pas dépasser 40 caractères ');
           }else{
              parent.append("<div class='invalid-feedback'>Le Prénom ne doit pas dépasser 40 caractères</div>");
           }
        return false;
     }else{
        surligne(champ, false);
        parent.remove('.invalid-feedback');
        return true;
      }
    }
};

function verifIdentifiant(champ){
    var regex = /^[a-zA-Z0-9]{2,40}$/;
    var parent = $('#identifiant').parent();

    if(!regex.test(champ.value)){
        surligne(champ, true);
        if(parent.children('.invalid-feedback').length > 0){
           parent.children('.invalid-feedback').html(' Le format est invalide ');
       }else{
           parent.append("<div class='invalid-feedback'>Le format est invalide</div>");
        }
        return false;
    }else{ 
       if(champ.value.length < 2){
          surligne(champ, true);
          if(parent.children('.invalid-feedback').length > 0){
            parent.children('.invalid-feedback').html('Veuillez renseigner au moins 2 caractères');
          }else{
            parent.append("<div class='invalid-feedback'>Veuillez renseigner au moins 2 caractères</div>");
          }
           return false;
       }else if(champ.value.length > 40){
           surligne(champ, true);
           if(parent.children('.invalid-feedback').length > 0){
             parent.children('.invalid-feedback').html(' Le Prénom ne doit pas dépasser 40 caractères ');
           }else{
              parent.append("<div class='invalid-feedback'>Le Prénom ne doit pas dépasser 40 caractères</div>");
           }
        return false;
     }else{
        surligne(champ, false);
        parent.remove('.invalid-feedback');
        return true;
      }
    }
};

function verifPassword(champ){
    var parent = champ.parent();
    if(champ.value.length<10){
        if(parent.children('.invalid-feedback').length > 10){
            parent.children('.invalid-feedback').html('Veuillez renseigner au moins 10 caractères');
          }else{
            parent.append("<div class='invalid-feedback'>Veuillez renseigner au moins 10 caractères</div>");
          }
           return false;
    }else{
        surligne(champ,false);
        parent.remove('.invalid-feedback');
        return true;
    }
};

//entoure en rouge l'input si erreur sinon vert
function surligne(champ, erreur){
    if(erreur){
        champ.classList.add("is-invalid");
    }
    else{
        champ.classList.remove("is-invalid");
        champ.classList.add("is-valid");
    }
};


function verifForm(){
    var mailOk = verifMail(mail);
    var lastNameOk = verifLastName(lastName);
    var firstNameOk = verifFirstName(firstName);
    var identifiantOk = verifIdentifiant(identifiant);
    var passwordOk = verifPassword(password);
    
    if(mailOk && lastNameOk && firstNameOk && identifiantOk && passwordOk){
        return true;
    } else return false;
}