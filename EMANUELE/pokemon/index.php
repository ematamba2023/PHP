<html>
	<head>
		<title>Elenco Pokemon</title>
		<link rel="stylesheet" href="stile.css">
	</head>
	<body>
		<h1>Elenco pokemon</h1>
		<?php
			/*instauro la connessione al database */
			require("config.php");  //file di config con i parametri di connessione
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}
			
			//query per prelevare l'elenco delle mama
			$query1 = "SELECT id, nome, tipo, tipo2 FROM pokemon";
			//eseguo la query
			$risultato1 = $mydb->query($query1);
			
			//controllo se ci sono effettivamente dei risultati, nel caso voglia fare qualcosa in caso contrario
			if($risultato1->num_rows > 0){  
				//ciclo i risultati, cioè l'elenco delle mamme presenti nel database
				while($pokemon = $risultato1->fetch_assoc()){
					//per ogni mamma stampo il nome 
					echo "<h2>".$pokemon["nome"]." ".$pokemon["tipo"]." ".$pokemon["tipo2"]."</h3>";
				
					//per ogni mamma devo prelevare i figli.
					//compongo la query sostituendo l'id della mamma corrente ad ogni iterazione del ciclo,
					//in modo da estrarre ogni volta solo i figli della mamma corretta
				}
			}
			else{
				echo "<p>Non ci sono pokemon nel database.</p>";
			}
			
		?>
	</body>
</html>
