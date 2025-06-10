let forma_email=false;

function validazione(evento){

    if(!validaNome() || !validaCognome() ||
        !validaEmail() || !validaPassword()|| !forma_email){

            evento.preventDefault();
            alert("il campo email è nel formato non corretto");// nel caso in cui il messaggio di errore della email 
                                                            //non viene seguito
        }

}

const form= document.forms["registrazione"];
form.addEventListener("submit",validazione);

form.nome.addEventListener("blur", validaNome);
form.cognome.addEventListener("blur", validaCognome);
form.email.addEventListener("blur", validaEmail);
form.password.addEventListener("blur", validaPassword);
form.email.addEventListener("blur", controlloEmail);
form.email.addEventListener("blur", controlloLogin);

function validaNome(){
    const errore= document.querySelector(".nome .errore");
    const nome= form.nome;

    if(nome.value.length==0){
        errore.classList.remove("hidden");
        return false;
    }else{
        errore.classList.add("hidden");
        return true;
    }

}

function validaCognome(){
    const errore= document.querySelector(".cognome .errore");
    const cognome= form.cognome;

    if(cognome.value.length==0){
        errore.classList.remove("hidden");
        return false;
    }else{
        errore.classList.add("hidden");
        return true;
    }

}

function validaEmail(){
    const errore= document.querySelector(".email .errore");
    const email= form.email;

    if(email.value.length==0){
        errore.classList.remove("hidden");
        return false;
    }else{
        errore.classList.add("hidden");
        return true;
    }

}

function validaPassword(){
    const errore= document.querySelector(".password .errore");
    const password= form.password;

    if(password.value.length==0 || !/^(?=.\d)(?=.[!@#$%^&])(?=.[a-z])(?=.*[A-Z]).{8,}$/.test(
      password.value)){
        errore.classList.remove("hidden");
        return false;
    }else{
        errore.classList.add("hidden");
        return true;
    }

}

function onResponse(response){
    if(!response.ok){
    console.log("errore nella richiesta");
    return null;
    }else{
        return response.json();
    }
    
    }
    
function onError(error){
    
        console.log('errore: '+ error)
    }

function controlloEmail(){

    const input= document.querySelector(".email input");
    const errore=document.querySelector('.email .errore');
    const email=String(input.value).toLowerCase();
    const email_uri=(encodeURIComponent(email));
     if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)) {
        document.querySelector('.email span').textContent = "formato non valido: es: text@gmail.com";
        errore.classList.remove("hidden");
        console.log("Formato email non valido");
        
        forma_email=false;
        return false; 

    }else{
        errore.classList.add("hidden");
        fetch("controllo_email.php?q="+email_uri).then(onResponse,onError).then(onJson)
        return true;
    }
}

function onJson(json){
  const errore = document.querySelector('.email .errore');
    const erroreSpan = document.querySelector('.email span');

    if (json.exist) {
        erroreSpan.textContent = "Email già utilizzata";
        errore.classList.remove("hidden");
        forma_email=false;
    } else {
        errore.classList.add("hidden");
        forma_email=true;
    }

    console.log(json);
}

function controlloLogin(){

    console.log("sto partendo");
    const input= document.querySelector(".email input");
    const errore=document.querySelector('.email .errore');
    const email=String(input.value).toLowerCase();
    const email_uri=(encodeURIComponent(email));
     if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)) {
        document.querySelector('.email span').textContent = "formato non valido: es: text@gmail.com";
        errore.classList.remove("hidden");
        console.log("Formato email non valido");
        
        forma_email=false;
        return false; 

    }else{
        errore.classList.add("hidden");
        fetch("controllo_email.php?q="+email_uri).then(onResponse,onError).then(onJson_login)
        return true;
    }

   
}

function onJson_login(json){
    console.log("ho ricevuto il json");
  const errore = document.querySelector('.email .errore');
    const erroreSpan = document.querySelector('.email span');

    if (json.exist) {
        erroreSpan.textContent = "Email o password non corretti";
        errore.classList.remove("hidden");
        forma_email=false;
    } else {
        errore.classList.add("hidden");
        forma_email=true;
    }

    console.log(json);
}
