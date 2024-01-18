<html>
	<head>
		<title>Elenco Film</title>
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
		<form id="film" name="film" method="post" action="film_script.php">
				
				<label for="usr">titolo film</label>
				<input type="text" placeholder="Inserisci username" name="usr" required>

				<input type="submit" name="submit" value="film">
			</form>
	</body>
</html>