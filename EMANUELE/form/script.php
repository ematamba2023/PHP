<?php
//verifico che esistano i dati nel POST
if (isset($_POST["nome"]) && ($_POST["cognome"])) {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    echo "Ciao ".$nome." ".$cognome;
}
else{
    //se non ho passato i dati tramite post, mi rimanda al form
    header("Location: index.php");
    exit;
}


?>