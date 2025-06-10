

const form= document.forms["login"];
form.addEventListener("submit",controlloLogin);




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

function controlloLogin(evento){

    evento.preventDefault();

    console.log("sto partendo");

    const input= document.querySelector(".email input");
    const errore=document.querySelector('.email .errore');
    const email=String(input.value).toLowerCase();

    console.log("sto cercando: "+ email)

    const email_uri=(encodeURIComponent(email));
    url="controllo_email.php?q="+email_uri ;
    console.log("URL :"+ url);

    fetch(url).then(onResponse,onError).then(onJson_login)
   
}

function onJson_login(json){
    console.log("ho ricevuto il json");
    console.log(json);
  const errore = document.querySelector('.email .errore');
    const erroreSpan = document.querySelector('.email span');

    if (json.exist) {
        errore.classList.add("hidden");
        form.submit();

    } else {
     const container= document.querySelector("#container-errore");

     const div= document.createElement("div");
     div.classList.add("errore-login");

     const img=document.createElement("img");
     img.src="pngegg.png"

     const span= document.createElement("span");
     span.textContent="Email/password non corretti";
     span.classList.add("errore_2");
     

     div.appendChild(img);
     div.appendChild(span);
     container.appendChild(div);
    }
}