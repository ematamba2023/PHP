<?php
    session_start();//prima di qualunque output

    /*In PHP con il termine sessione si indica un insieme di variabili (tutte facenti parte dell'array associativo $_SESSION) che preservano il loro valore da una pagina 
    ad un altra.*/

    $_SESSION["prova"] = "Test della sessione";
    
    //echo  $_SESSION["prova"];
    
    unset($_SESSION["prova"]);//permette di cancellare una singola variabile della sessione
    //session_unset(); //svuota l'array di sessione
    //session_destroy(); //distrugge la sessione


?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
            if(isset($_SESSION["nome"])){//controllo se all'interno di questa sessione c'è questa variabile
                echo "<p>Ciao ".$_SESSION["nome"]."</p>";
            }
            else{
                ?>
                <form action="salva.php" method="post">
                    <p>Inserisci il nome: <input type="text" name="nome"></p>
                    <p><input type="submit" name="invia" value="invia"></p>
                </form>
                <?php
            }

            print_r($_SESSION);
        ?>
    </body>
</html>