<?php
header('Content-Type: application/json'); // Imposta intestazione JSON

$conn = mysqli_connect("localhost", "root", "", "hw1") or die(json_encode(["error" => mysqli_error($conn)]));

$query = "SELECT * FROM prodotti_mens";
$result = mysqli_query($conn, $query);

$prodotti = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $prodotti[] = $row;
    }
}

mysqli_free_result($result);
mysqli_close($conn);

echo json_encode($prodotti);
?>
