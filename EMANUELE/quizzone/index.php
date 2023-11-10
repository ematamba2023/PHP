<?php
    session_start(); //avvio la sessione
    if(!isset($_COOKIE["record"])){
        setcookie("record", 0, strtotime("+30 days"));
    }

    if(!isset($_SESSION["giocatore"])){
        //gli chiedo il nome
        ?>
        <!DOCTYPE html>
        <html>
            <head>
            </head>
            <body>
                <form action="salvanome.php" method="post">
                    <p>Inserisci il nome: <input type="text" name="nome"></p>
                    <p><input type="submit" name="invia" value="invia"></p>
                </form>
            </body>
        </html>
        <?php
    }
    else{
        require("class.domanda.php");
        if($_SESSION["num_domanda"]<count($domande)){
            //stampo la domanda corrente
            ?>
            <!DOCTYPE html>
            <html>
                <head>
                </head>
                <body>
                    <form action="controllarisposta.php" method="post">
                        <p><?php echo $domande[$_SESSION["num_domanda"]]->getTesto(); ?></p>
                        <?php
                            foreach($domande[$_SESSION["num_domanda"]]->getRisposte() as $risposta){
                                echo '<p><input type="radio" name="risp" value="'.$risposta.'">'.$risposta.'</p>';
                            }
                        ?>
                        <p><input type="submit" name="invia" value="invia"></p>
                    </form>
                </body>
            </html>
            <?php
        }
        else{
            //ho finito le domande
            if($_SESSION["punteggio"] > $_COOKIE["record"]){
                setcookie("record", $_SESSION["punteggio"], strtotime("+30 days"));
            }
            ?>
            <!DOCTYPE html>
            <html>
            <head>
            </head>
            <body>
                <p>Il record è: <?php echo $_COOKIE["record"]; ?></p>
                <p>Il tuo punteggio è: <?php echo $_SESSION["punteggio"]; ?></p>
            </body>
            </html>
            <?php
        }
    }

?>