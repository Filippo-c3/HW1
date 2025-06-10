<?php

//mi collego alla sessione gia aperta
session_start();

//termino la sessione
session_destroy();

header("Location: index.php");
exit;

?>