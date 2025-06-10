

<?php

session_start();
if(isset($_SESSION["email"])){
    header("Location: index.php");
    exit;
}
//verifico che ho i dati provenienti dal form
if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["password"])){

//apro la connessione 
$conn=mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error($conn));

//salvo i dati dell'utente 
$errori= array();

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errori[] = "Email nel formato non valida";
        } else {
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $res = mysqli_query($conn, "SELECT email FROM utenti WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $errori[] = "Email già utilizzata";
            }
        }


if(empty($errori)){

    //inizio a salvare i dati nel DB
    $nome=mysqli_real_escape_string($conn, $_POST["nome"]);
    $cognome=mysqli_real_escape_string($conn, $_POST["cognome"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $password=mysqli_real_escape_string($conn, $_POST["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query=" INSERT INTO utenti(nome, cognome, email, PASSWORD) VALUES('$nome', '$cognome', '$email', '$password') " ;
    $res=mysqli_query($conn, $query);

    if($res){
        //salvo la sessione dell'utente
        $_SESSION["nome"]=$_POST["nome"];
        $_SESSION["email"]=$_POST["email"];
        header("Location: index.php");
        exit;
            } else {
                $errori[] = "Errore di connessione al Database";
                 echo "Errore query: " . mysqli_error($conn);
            }
    }
    mysqli_close($conn);
}
?>

<html>
    <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hw1.css">
    <script src="registrazione_hw1.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

    <body>
        <?php include("navbar.php")?>
        <div class='login_php'>
        <h1> REGISTER </h1>
        <p>Please fill in the information below:</p>
        
            <main>
                <form name="registrazione" method="post">
                   
                <div class='nome'>
                        <input type="text" name="nome" placeholder="Nome"></input>
                            
                            <div class="errore hidden">
                                <img src="pngegg.png" alt="">
                                <div class="errore_2"> <span>compila questo campo</span></div>
                            </div>
                    </div>


                    <div class='cognome'>
                        <input type="text" name="cognome" placeholder="Cognome">
                        
                            <div class="errore hidden">
                                <img src="pngegg.png" alt="">
                                <div class="errore_2"> <span>compila questo campo</span></div>
                            </div>
                    </div>

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
                                <div class="errore_2"> <span>password nel formato non corretto</span></div>
                            </div>
                    </div>
                    <input type="submit" value="CREATE MY ACCOUNT">
                    
                </form>
                
               
            </main>
             
        </div>

        <?php include("footer.php")?>
    </body>

</html>
