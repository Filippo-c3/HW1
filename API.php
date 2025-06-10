 <?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://images-api.nasa.gov/search?q=".$_GET["q"]);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    echo $result;

    ?>