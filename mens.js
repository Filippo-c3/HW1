
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


function carica_prodotto(){

console.log("ci siamo");
  fetch("carico_prodotti.php").then(onResponse,onError).then(onJson_prod)


}

carica_prodotto();

function onJson_prod(json){
console.log("ho ricevuto il json");
    console.log(json)

const contenitore= document.querySelector("#prodotti");
console.log(contenitore);


 for (const prodotto of json) {
  console.log(prodotto)
                const div = document.createElement('div');
                div.classList.add('articolo');
                div.dataset.id = prodotto.id;
                div.dataset.immagine = prodotto.immagine2_hover;
                div.dataset.originale = prodotto.immagine_orig;

                const img = document.createElement('img');
                img.src = prodotto.immagine_orig;

                const nome = document.createElement('p');
                nome.textContent = prodotto.nome;

                const prezzo = document.createElement('p');
                prezzo.textContent = '€ ' + prodotto.prezzo;

                div.appendChild(img);
                div.appendChild(nome);
                div.appendChild(prezzo);

              div.addEventListener('mouseover', cambia);
              div.addEventListener('mouseout',cambia2);
              div.addEventListener("click", trova_elemento);
              contenitore.appendChild(div);
            }

}

function cambia(evento){
    const articolo=evento.currentTarget.querySelector('img')
    articolo.src = evento.currentTarget.dataset.immagine
}

function cambia2(evento){
    const articolo=evento.currentTarget.querySelector('img')
    articolo.src= evento.currentTarget.dataset.originale
}


function inizializza() {
    const articles=document.querySelectorAll('.articolo');
    for (const article of articles){
        article.addEventListener('mouseover', cambia);
        article.addEventListener('mouseout',cambia2);
    }
}

inizializza();

function trova_elemento(evento){

    const prodotto = evento.currentTarget.dataset.id;

    fetch("item.php?id="+ prodotto).then(onResponse,onError).then(onJson_prod);
}

const prodotti = document.querySelectorAll('.articolo');
for (const prodotto of prodotti) {
    prodotto.addEventListener("click", trova_elemento);
}



function trova_elemento(evento) {
    const prodotto = evento.currentTarget.dataset.id;

    // Crea un form dinamicamente e lo invia
    const form = document.createElement("form");
    form.method = "GET";
    form.action = "item.php";

    const input = document.createElement("input");
    input.type = "hidden";
    input.name = "id";
    input.value = prodotto;

    form.appendChild(input);
    document.body.appendChild(form);
    form.submit(); // invia il form
}
