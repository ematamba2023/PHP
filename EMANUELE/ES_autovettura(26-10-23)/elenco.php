<html>
	<head>
		<title>Elenco Marche automobile</title>
		<link rel="stylesheet" href="stile.css">
	</head>
	<body>
		<h1>Marca e Modello</h1>
		<?php
			
			require("config.php"); 
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}
			
			
			$query1 = "SELECT id,marca,modello FROM auto";
			$risultato1 = $mydb->query($query1);
			
			
			if($risultato1->num_rows > 0){  
                echo "<table>";
                echo "<tr><td>Nome</td><td>Modello</td></tr>";
				
				while($auto = $risultato1->fetch_assoc()){
							echo "<tr>";
							echo "<td>";
                                ?>
                                <a href="auto.php?id=<?php echo $auto["id"] ?>">
                                <?php
                                echo $auto["marca"];
                                ?>
                                </a>
                                <?php 
                            echo "</td>";
							echo "<td>".$auto["modello"]."</td>";
							echo "</tr>";	
				}
                echo "</table>";
			}
			else{
				echo "<p>Non ci sono Auto nel database.</p>";
			}
			
		?>
	</body>
</html>