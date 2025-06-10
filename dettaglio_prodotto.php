<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " . mysqli_connect_error());

    $id = mysqli_real_escape_string($conn, $id);
    $query = "SELECT * FROM prodotti_mens WHERE id = '$id'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        $prodotto=mysqli_fetch_assoc($res);
        
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



<html>
    <head>
       <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="hw1.css">
    <script src="dettaglio_prodotto.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    

    </head>

    <body>
         <?php include("navbar.php")?>

        <div class="container_dettaglio">
<section class="section-image">
    <img src="<?php echo $prodotto['immagine_orig']; ?>" class='dettaglio'>
    <img src="<?php echo $prodotto['immagine2_hover']; ?>" class='dettaglio'>
</section>

<section class="section-info">
    <h1><?php echo $prodotto['nome']; ?></h1>
    <span><?php echo "$". $prodotto['prezzo']; ?></span>
    <span></span>
    
    <h5>Details:</h5>
    <span>- Heavyweight 10oz. fleece</span>
    <span>- Crafted from premium ring spun cotton</span>
    <span>- 1x1 ribbing at cuffs and waistband</span>
    <span>- Fleece lined hood</span>
    
    <h5>Fabric Content:</h5>
    <span>- Small-5X: 70% Cotton / 30% Polyester</span>
    
    <h5 class="colore">Color: <?php echo $prodotto['colore']; ?></h5>
    
    <h5>Size:</h5>
    <select name="size">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="2X">2X</option>
        <option value="3X">3X</option>
        <option value="4X">4X</option>
        <option value="5X">5X</option>
    </select>
    <h5>Quatity:</h5>
    <div class="quantity">
       <button id='minus'> <img src="remove_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" class='dettaglio'/></button>
        <input type="text" value="1" name="quantity"></input>
     <button id='plus'><img src="add_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" class='dettaglio'/></button>
    </div>
    <span class="aggiungi_cart"><a href="aggiungi_carrello.php?id=<?php echo $prodotto['id']; ?>">ADD TO CART</a></span>
    
    
</section>

</div>
 <?php include("footer.php")?>
</body>
</html>