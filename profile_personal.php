<?php
session_start();
?>

<html>

<head>

     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hw1.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    
</head>
    <body>
         <?php include("navbar.php")?>
    <p class='out'><a href='logout_hw1.php' class="logout_php">Logout</a></p>
    <h1>MY ACCOUNT</h1>
    <p class='out_2'>Welcome back, <?php echo $_SESSION["nome"];?>!</p>

    <div class='container'>

                <div class='order'>
                    <p class='out'>MY ORDERS </p>
                    <div></div>
                    <p class='out_2'>You haven't placed any orders yet</p>
                </div>
                <div class='address'>
                        <p class='out'>PRIMARY ADDRESS </p>
                        <div></div>
                        <p class='out_2'>dati utente</p>
                </div>


    </div>
    <?php include("footer.php")?>
    </body>
</html>