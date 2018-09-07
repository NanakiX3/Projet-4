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
    
    if(mailOk){
        return true;
    } else return false;
}