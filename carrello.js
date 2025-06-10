function onResponse(response) {
    if (!response.ok) {
        console.log("errore nella richiesta");
        return null;
    } else {
        return response.json();
    }
}

function onError(error) {
    console.log('errore: ' + error);
}

function carica_prodotto() {
    console.log("ci siamo");
    fetch("carrello.php").then(onResponse, onError).then(onJson_carrello);
}
function onResponse(response) {
    if (!response.ok) {
        console.log("errore nella richiesta");
        return null;
    } else {
        return response.json();
    }
}

function onError(error) {
    console.log('errore: ' + error);
}

function carica_prodotto() {
    console.log("ci siamo");
    fetch("carrello.php").then(onResponse, onError).then(onJson_carrello);
}
function onJson_carrello(json) {
    const contenitore = document.querySelector("#prodotti_carrello");

    for (const prodotto of json) {
        const div = document.createElement('div');
        div.className = 'prodotto-carrello-semplice';

        const img = document.createElement('img');
        img.src = prodotto.immagine_orig;

        const nome = document.createElement('p');
        nome.className = 'nome';
        nome.textContent = prodotto.nome;

        const quantita = document.createElement('p');
        quantita.className = 'quantita';
        quantita.textContent = prodotto.quantita;

        const prezzo = document.createElement('p');
        prezzo.className = 'prezzo';
        prezzo.textContent = '$ ' + prodotto.prezzo;

        div.appendChild(img);
        div.appendChild(nome);
        div.appendChild(quantita);
        div.appendChild(prezzo);

        contenitore.appendChild(div);
    }
}
carica_prodotto();