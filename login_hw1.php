<?php
session_start();

if(isset($_SESSION["email"])){
    header("Location: profile_personal.php");
    exit;
}

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " . mysqli_error($conn));
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"]; // non usare real_escape_string su password perché usiamo password_verify

    $query = "SELECT * FROM utenti WHERE email = '$email'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        $entry = mysqli_fetch_assoc($res);

        if (password_verify($password, $entry["PASSWORD"])) { // <-- PASSWORD maiuscolo come nel tuo DB
            $_SESSION["email"] = $entry["email"]; // o username, se preferisci
            $_SESSION["nome"]=$entry["nome"];
            $_SESSION["id_utente"]=$entry["id"];
            echo "Login riuscito, reindirizzamento in corso...";
             echo json_encode(array("exist" => true));
            header("Location: profile_personal.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        } else {
            $errore = true;
        }
    } else {
        $errore = true;
    }
}
?>




<html>
    <head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hw1.css">
    <script src="login.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    
    </head>

    <body>
         <?php include("navbar.php")?>
        <div class='login_php'>
        <h1> LOGIN </h1>
        <p>Please enter your e-mail and password:</p>
        <div id="container-errore"></div>

            <main>
                <form name="login" method="post">
                   
                <div class='email'>
                        <input type="text" name="email" placeholder="Email">
                        
                        <div class="errore hidden" >
                                <img src="pngegg.png" alt="">
                                <div class="errore_2"> <span>compila questo campo</span></div>
                            </div>
                    </div>

                    <div class='password'>
                        <input type="password" name="password" placeholder="Password">
                            
                        <div class="errore hidden">
                                <img src="pngegg.png" alt="">
                                <div class="errore_2"> <span>compila questo campo</span></div>
                            </div>
                    </div>
                    <input type="submit" value="LOGIN">
                    
                </form>
                
               
            </main>
                
               
             <p>Don't have an account?  <a href="registrazione_hw1.php">Create one</a></p>
        </div>
         <?php include("footer.php")?>
    </body>
</html>