<html>
	<head>
		<title>Elenco Regioni</title>
		<link rel="stylesheet" href="stile.css">
	</head>
	<body>
		<h1>Piatti tipici</h1>
        <h2>Elenco regioni..</h2>
		<?php
			
			require("config.php"); 
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}

		//if(isset($_GET['regione']))
			$query1 = "SELECT nome 
                        FROM regione";
			$risultato1 = $mydb->query($query1);
			
			
			if($risultato1->num_rows > 0){  
                echo "<table>";
                echo "<tr><td>Nome</td></tr>";
				
				while($regione = $risultato1->fetch_assoc()){
							echo "<tr>";
							echo "<td>";
                                ?>
                                <a href="piatti.php?regione=<?php echo $regione["nome"] ?>">
                                <?php
                                echo $regione["nome"];
                                ?>
                                </a>
                                <?php 
                            echo "</td>";
							echo "</tr>";	
				}
                echo "</table>";
			}
			else{
				echo "<p>Non ci sono Regioni al interno database.</p>";
			}
		
		?>

        <h2>Elenco ingredienti..</h2>
        <?php
        	

			$query3 = "SELECT nome,tipologia 
                        FROM ingrediente";
			$risultato1 = $mydb->query($query3);
			
			
			if($risultato1->num_rows > 0){  
                echo "<table>";
                echo "<tr><td>Nome</td></tr>";
				
				while($ingrediente = $risultato1->fetch_assoc()){
							echo "<tr>";
							echo "<td>";
                                ?>
                                <a href="piatti.php?ingrediente=<?php echo $ingrediente["nome"] ?>">
                                <?php
                                echo $ingrediente["nome"];
                                ?>
                                </a>
                                <?php 
                            echo "</td>";
							echo "</tr>";	
				}
                echo "</table>";
			}
			else{
				echo "<p>Non ci sono Ingredienti al interno database.</p>";
			}

        ?>
	</body>
</html>