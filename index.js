function spunta(){
 
  const barra_di_ricerca = document.querySelector("#blocco");
  if (barra_di_ricerca.classList.contains('hidden')) {    
      barra_di_ricerca.classList.remove('hidden');
  } else {
      barra_di_ricerca.classList.add('hidden');
  }
}

const apri_barra = document.querySelector('#ricerca');
  apri_barra.addEventListener('click', spunta);

  const chiudi_barra=document.querySelector('button');
  chiudi_barra.addEventListener('click', spunta);

function spunta2(){
  
  

    const barra_di_ricerca = document.querySelector("#blocco_2");
    if (barra_di_ricerca.classList.contains('hidden')) { 
    
        barra_di_ricerca.classList.remove('hidden');
        
        const raccolta = document.querySelector('#vista_section');
       raccolta.innerHTML = '';

       let input_value=document.querySelector('#im_nasa');
       input_value.value='';
    } else {
        barra_di_ricerca.classList.add('hidden');
    }

    
  }
  
  
  const news=document.querySelector(".nasa_api");
  news.addEventListener("click",spunta2);
  

  
  
  
 
  /* cambio immagine per tutti le pag*/
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
// Chiama la funzione
inizializza();


function onJson(json){

    console.log("sto per caricaricare le immagini");
    const raccolta = document.querySelector('#vista_section');
    raccolta.innerHTML = '';

    let numero_risultati= json.collection.items.length;

    console.log(numero_risultati);

    if( numero_risultati >10)
        numero_risultati=30;
    for(let i=0; i<numero_risultati; i++){

        const immagini=json.collection.items[i];
        const titolo=json.collection.items[i].data[0].title;

        
        const elemento_url=json.collection.items[i].links[1].href;
        
        const elemento_raccolta= document.createElement('div');
        elemento_raccolta.classList.add('elemento');
        const im_raccolta=document.createElement('img');
        im_raccolta.src=elemento_url;

        const didascalia=document.createElement('span');
        didascalia.textContent=titolo;

        elemento_raccolta.appendChild(im_raccolta);
        elemento_raccolta.appendChild(didascalia);
        raccolta.appendChild(elemento_raccolta);
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

function ricerca(event){

event.preventDefault();

const input=document.querySelector("#im_nasa");
const input_value=encodeURIComponent(input.value); 

console.log("sto cercando immagini di: " + input_value);

url_nasa="API.php?q="+input_value;

console.log("URL: "+ url_nasa);

fetch(url_nasa)
    .then(onResponse,onError)
    .then(onJson);

}

const form=document.querySelector("form");
form.addEventListener("submit", ricerca);

function chiudi(event){

  const chiusura= document.querySelector('#blocco_2');
  chiusura.classList.add('hidden');
}

const chiudi_blocco_2=document.querySelector('#blocco_2_chiusura');
chiudi_blocco_2.addEventListener('click', chiudi);


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


function carica_prodotto_index(){

console.log("ho caricato");
  fetch("index_prod.php").then(onResponse,onError).then(onJson_prod_index)


}

carica_prodotto_index();

function onJson_prod_index(json){
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
                prezzo.textContent = '$ ' + prodotto.prezzo;

                div.appendChild(img);
                div.appendChild(nome);
                div.appendChild(prezzo);

              div.addEventListener('mouseover', cambia);
              div.addEventListener('mouseout',cambia2);
              div.addEventListener("click", trova_elemento);
              contenitore.appendChild(div);
            }

}


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