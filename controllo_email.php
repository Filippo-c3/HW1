<?php

// verifico che sia stato inviato l'email per la verifica nel db 

if(isset($_GET["q"])){

     // Imposto l'intestazione per restituire JSON
    header('Content-Type: application/json');
    //apro la connessione 
    $conn=mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_error($conn));


    $email = mysqli_real_escape_string($conn, $_GET["q"]);
   
    //leggo i dati dal database 
    $query="SELECT email FROM utenti where email = '$email'";

    $res= mysqli_query($conn,$query);

    $exist=false;
    if(mysqli_num_rows($res)>0){
        $exist=true;
    }

    $data=array('exist'=> $exist);
//chiudo la connessione
mysqli_free_result($res);
mysqli_close($conn);

echo json_encode($data);


}


?>