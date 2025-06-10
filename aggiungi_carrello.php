<?php 


session_start();
if(isset($_SESSION["email"])){
    header("Location: carrello_finale.php");
}else{
    header("Location: login_hw1.php");
    exit;
}

if (isset($_GET["id"])) {
    $id_prodotto = $_GET["id"];
    $id_utente = $_SESSION["id_utente"];

   
//apro la connesione con il database 
 $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error($conn));
// verifico che se esiste già un elemento nel carrello
  $query = "SELECT * FROM carrello WHERE id_utente = $id_utente AND id_prodotto = $id_prodotto";
  $res = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($res) > 0) {
        // Se esiste, incrementa la quantità
        $aggiorna = "UPDATE carrello SET quantita = quantita + 1 WHERE id_utente = $id_utente AND id_prodotto = $id_prodotto";
       $result= mysqli_query($conn, $aggiorna);
    } else {
        // Altrimenti, inserisci una nuova riga
        $inserisci = "INSERT INTO carrello(id_utente, id_prodotto, quantita) VALUES($id_utente, $id_prodotto, 1)";
        $result_2=mysqli_query($conn, $inserisci);
    }

    mysqli_free_result($res);
    mysqli_free_result($result);
    mysqli_free_result($result_2);
    mysqli_close($conn);
    header("Location: carrello_finale.php");
    exit();


}

?>