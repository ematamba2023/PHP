<?php
    session_start();
    require("class.domanda.php"); //includo la classe e l'array di oggetti
    if(isset($_POST["invia"])){ //verifico che sia arrivato il form
        $i = $_SESSION["num_domanda"]; //indice dell'array
        $risp = $_POST["risp"]; //risposta dell'utente che viene dal form
        if($domande[$i]->isGiusta($risp)){
            //la risposta è giusta, gli do un punto
            $_SESSION["punteggio"]++;
        }
        //a prescindere che sia giusta o meno, passo alla domanda successiva
        $_SESSION["num_domanda"]++;
    }
    header("Location: index.php"); //torno alla pagina index
    exit();
?>