<html>
	<head>
		<title>Elenco genitori</title>
		<link rel="stylesheet" href="stile.css">
	</head>
	<body>
		<h1>Elenco Film</h1>
		<?php
			
			require("config.php");  
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  
			}
			
		?>
		<form method="post" action="attori.php">
		<p>
                <label for="gen1">Seleziona film: </label> 
                <select name="gen1">

					<?php

					 $query1="SELECT *
					 			FROM film";

					$risultato1 = $mydb->query($query1);
					

						while($film = $risultato1->fetch_assoc()){
							echo "<option value='". $film["id"]."'>". $film["titolo"]."</option>";
						}
							
					?>
                </select>
				</p>

        
            <input type="submit" value="cerca">
        </form>
	</body>
</html>