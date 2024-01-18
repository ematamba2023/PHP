<html>
	<head>
		<title>Risulati</title>
		<link rel="stylesheet" href="stile.css">
</head>
	<body>
    <?php
			
			require("config.php");  
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  
			}
			
	?>
		<h1>Attori che hanno recitato in: 

      <?php   

        $query2="SELECT titolo
				FROM film
                WHERE id=".$_POST["gen1"];

         $risultato1 = $mydb->query($query2);

		 if($risultato1->num_rows > 0){  
			
			
			
				while($filmNome = $risultato1->fetch_assoc()){
					echo $filmNome['titolo'];
				}
			}
    
    ?>


    </h1>

	<?php

		$query3 = "SELECT a.nome,a.cognome
					FROM attore a 
					JOIN recita r ON a.id = r.fkAttore
					JOIN film f ON f.id= r.fkFilm
					WHERE f.id=".$_POST["gen1"];
					$risultato2 = $mydb->query($query3);
					
					
					if($risultato2->num_rows > 0){  
						echo "<table>";
						echo "<tr><td>Nome</td><td>Cognome</td></tr>";
						
						while($attori = $risultato2->fetch_assoc()){
							echo "<tr>";

							echo "<td>".$attori["nome"]."</td>";
							echo "<td>".$attori["cognome"]."</td>";
			
							echo "</tr>";	
						}
						echo "</table>";
					}


					else{
						echo "<p>Nessun attore ha recitato nel seguente film.</p>";
					}
	?>
	
		
	</body>
</html>