<?php
session_start();

header('Content-Type: application/json');

$id_utente = $_SESSION["id_utente"]; //

//apro la connessione con il database
$conn=mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error($conn));

//recupero i dettagli dei prodotti per visualizzarli nel carrello
$query = "SELECT c.id_utente,c.id_prodotto,c.quantita, p.* FROM carrello c JOIN prodotti_mens p ON c.id_prodotto=p.id 
WHERE c.id_utente=$id_utente ";

$result=mysqli_query($conn, $query);
//creo l'array per salvare i dati
$prodotti = array();

while ($row = mysqli_fetch_assoc($result)) {
    $prodotti[] = $row;
}

echo json_encode($prodotti);
mysqli_free_result($result);
mysqli_close($conn);

?>
