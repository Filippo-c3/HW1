
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hw1.css">
    <script src="index.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    
    </head>

<body>
    <nav>
        <div class="prodotti">
            
            <div id="menù">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div id="logo1">
                <a href="index.php" class='link_home'>
            <img id="logo" src="SpaceX_logo.png" />
            </a>
            </div>

            <div class="links">
                <a>Mens</a>
                <div class="item">
                
                <a>Shirts</a>
                <a href= "mens.php" >Outerwear</a>
                <a>View All</a> 

                </div>
            </div>


            <div class="links">
                 <a>Womens</a>
                <div class="item">
            
                <a href= "woman.php">Shirts</a>
                <a>Outerwear</a>
                <a>View All</a> 

                </div>
            </div>

        <div class="links">
            <a>Kids</a>
        <div class="item">
            
             <a>Shirts</a>
             <a>Outerwear</a>
             <a>View All</a> 

            </div>
        </div>

        <div class="links">
            <a>Accessories</a>
        <div class="item">

             <a>View All</a> 

            </div>
        </div>

        <div class="links">
            <a>Flight Shirts</a>
        <div class="item">
            
             <a>View All</a> 

            </div>
        </div>

        <div class="links">
            <a>News</a>
            <div class="item">
            
             <a class="nasa_api">NASA images</a>
             <a class="asteroidi_api">Asteroids - NeoWs</a>

            </div>
        </div>
            
        </div>

        <div class="servizio">
            
            <span><a href=" login_hw1.php">Account</a></span>
            <span><a id="ricerca">Search</a></span>
            <a id="carrello" href="carrello_finale.php">Cart(0)</a>
            
            
        </div>
       
       
        
    </nav>
    <div id='blocco' class='hidden'>

        <div class='interno'>
          <img src="ricerca_black.svg"> </img>
          <input type='text' value='SEARCH' ></input>
            <button> 
            <img src="close_black.svg"> </img>
        </div>
    </div>

    <div id='blocco_2' class='hidden'>
       
        <h1>"NASA Image Collection"</h1>
        <form>
            search for example: "Orion","Moon"
                <input type="text" id="im_nasa">
                <input type="submit" id="submit" value="cerca"> 
        </form>
        <button id="blocco_2_chiusura">x</button>
        
        <section id="vista_section">

        </section>


    </div>
       

    <header></header>

    <h2>TRENDING</h2>
    
    <section id="prodotti">
        
    </section>


    <section class="articoli">
        <span> View All Trending</span>
    </div>
    </section>

    <footer>

        <div class="inner-footer">
            <a>FAQs</a>
            <a>Search</a>
            <a>PrivacyPolicy</a>
            <a>Terms&Condition </a>
        </div>

        <div class="footer-Aside">
            <a href="https://shop.spacex.com/"> © SpaceX Store</a>
        </div>

    </footer>
</body>

</html>
