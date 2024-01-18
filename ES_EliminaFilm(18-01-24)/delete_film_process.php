<?php
session_start();
 if (isset($_POST["nomeFilm"])) {
        require('config.php');
        $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
        if ($mydb->connect_errno) {
            echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
            exit();
        }
    
        $stmt = $mydb->prepare("SELECT id, titolo FROM film WHERE titolo LIKE (?)");
        $nomeFilm = $_POST["nomeFilm"] .= '%';
        $stmt->bind_param("s", $nomeFilm);
        $stmt->execute();
    
        $stmt->store_result(); 
    
        if ($stmt->num_rows > 0) {
            
            $stmt->bind_result($id, $titolo);
    
            
            while ($stmt->fetch()) {
                $_SESSION['filmId'] = $id;
                $_SESSION["filmTitolo"] = $titolo;
                $_SESSION['erroreCanc'] = false;
            }
        } else {
            
            $_SESSION['erroreCanc'] = true;
        }

        
        $stmt1 = $mydb->prepare("DELETE FROM appartiene WHERE fkFilm= (?)");
        $stmt1->bind_param("s", $id);
        $stmt1->execute();
        $stmt1->close();

        $stmt2 = $mydb->prepare("DELETE FROM recita WHERE fkFilm= (?)");
        $stmt2->bind_param("s", $id);
        $stmt2->execute();
        $stmt2->close();

        $stmt3 = $mydb->prepare("DELETE FROM film WHERE id= (?)");
        $stmt3->bind_param("s", $id);
        $stmt3->execute();
        $stmt3->close();

        if ($_SESSION['erroreCanc'] == false) {
            // Set success message
            $_SESSION["message"] = "FILM ELIMINATO CON SUCCESSO.";
        } else {
            // Set error message
            $_SESSION["error_message"] = "FILM NON PRESENTE NELLA LIBRERIA";
        }
        
        $stmt->close();
        $mydb->close();
    }

header('Location: index.php');

?>
