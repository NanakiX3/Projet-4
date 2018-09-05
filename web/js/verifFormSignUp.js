function verifMail(champ){
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value)){
        surligne(champ, true);
        $("#email").attr("title", "Veuillez renseigner un e-mail valide");
        return false;
    }else{
        surligne(champ,false);
        $("#email").attr("title", "");
        return true;
    }
};

//entoure en rouge l'input si erreur sinon vert
function surligne(champ, erreur){
    if(erreur){
        champ.parentElement.classList.add("has-error");
    }
    else{
        champ.parentElement.classList.remove("has-error");
        champ.parentElement.classList.add("has-success");
    }
};


function verifForm(){
    var mailOk = verifMail(mail);
    
    if(mailOk){
        return true;
    } else return false;
}