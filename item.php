
<?php
// effettuo il controllo per capire se esiste l'id nel db per andare nella pagina dettaglio
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " . mysqli_connect_error());

    $id = mysqli_real_escape_string($conn, $id);
    $query = "SELECT * FROM prodotti_mens WHERE id = '$id'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        $prodotto=mysqli_fetch_assoc($res);
        // Redirect alla pagina dettaglio
        header("Location: dettaglio_prodotto.php?id=" . $id);
        exit();
    } else {
        // Prodotto non trovato
        echo "Prodotto non trovato.";
    }
    mysqli_free_result($res);
    mysqli_close($conn);
} else {
    echo "ID mancante.";
}
?>

