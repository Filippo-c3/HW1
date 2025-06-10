<?php
// Connessione al database

$conn=mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_error($conn));


// Query per recuperare i prodotti
$query= "SELECT * FROM prodotti_woman";
$result = mysqli_query($conn,$query);

// Verifica se ci sono risultati

?>

<html>
    <head>
     <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hw1.css">
    <script src="mhw3.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    
    </head>
    <body>
        <?php include("navbar.php")?>

        <h2>Women's Outerwear</h2>

<?php
echo "<section>";
if (mysqli_num_rows($result) > 0) {
    // Visualizza ogni prodotto
    while($row = mysqli_fetch_assoc($result)) {
        
    echo "<div class='articolo' data-id='{$row['id']}' data-immagine='{$row['immagine2_hover']}' data-originale='{$row['immagine_orig']}'>";
        echo "<img src='{$row['immagine_orig']}'>";
        echo "<p>{$row['nome']}</p>";
        echo "<p>€ {$row['prezzo']}</p>";
        
        echo "</div>";
        
       
    }
} else {
    echo "Nessun prodotto trovato.";
}

echo "</section>";

mysqli_free_result($result);
mysqli_close($conn);

?>


    <section class="articoli">
        <span> View All Trending</span>
    </div>
    </section>

    <?php include("footer.php")?>
</body>
</html>