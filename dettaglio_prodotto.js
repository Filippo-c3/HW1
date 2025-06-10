
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


function quantity_plus(){

const quantita=document.querySelector('input[name="quantity"]');

quantita.value = parseInt(quantita.value) + 1
}

const quantita=document.querySelector("#plus");
quantita.addEventListener("click",quantity_plus)

function quantity_minus(){

const quantita=document.querySelector('input[name="quantity"]');

 if(quantita.value>1){
quantita.value = parseInt(quantita.value) - 1}
}

 const quantita_2=document.querySelector("#minus");
 quantita_2.addEventListener("click",quantity_minus)
