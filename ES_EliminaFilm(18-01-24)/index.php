



<html>
	<head>
		<title>Elenco Film</title>
		<link rel="stylesheet" href="stile.css">
	</head>
	<body>
		<h1>Elenco Film</h1>
		<?php
		session_start();
			
			require("config.php");  
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  
			}

			if (isset($_SESSION["message"])) {
				echo "<p style='color: green;'>".$_SESSION["message"]."</p>";
				unset($_SESSION["message"]);
			}
			
			if (isset($_SESSION["error_message"])) {
				echo "<p style='color: red;'>".$_SESSION["error_message"]."</p>";
				unset($_SESSION["error_message"]);
			}
			
		?>



	<form action="delete_film_process.php" method="post">
        <label for="nomeFilm">Nome del film (completo o parziale):</label>
        <input type="text" name="nomeFilm" required>
        <button type="submit">Cancella Film</button>
    </form>
	
	</body>
</html>