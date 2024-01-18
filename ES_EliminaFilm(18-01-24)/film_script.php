<?php
session_start();

if(isset($_POST["submit"])){

	
	require("config.php"); 
	$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
	if ($mydb->connect_errno) {
		echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
		exit();
	}

    //where nome LIKE '%????%'
    $query1 = "SELECT 
					SELECT COUNT(*) as n_film
                    FROM film f
                    WHERE f.titolo LIKE "%".$_POST["usr"]."%";
					$risultato2 = $mydb->query($query3);
	

	

	}
	
}

?>
