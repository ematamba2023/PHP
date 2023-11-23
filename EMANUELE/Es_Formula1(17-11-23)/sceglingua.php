<?php

// se l'utente ha inviato il form, entro nell'if
if (isset($_POST["lingua"])) {
    // creo un cookie che si chiama lingua contenente la scelta fatta dall'utente
    setcookie("lingua", $_POST["lingua"], strtotime("+30 days"));
}

// torno alla home
header("Location: formula1.php"); // "Location" invece di "Loation"
exit();

?>
