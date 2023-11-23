<?php
		 //le operazioni sulla  sessione e sui coookie vanno qui
		 $farsi_ita = array("Classifica piloti per numero di gare vinte", "Nome","Cognome","Vittorie","Non ci sono Piloti al interno database");
		 $farsi_eng = array("Choose your language:", "Welcome!");
		 
	 
		 $lingua=$farsi_ita;
		 //conrollo de esiste il cookie della lingua
		 if (isset($_COOKIE["lingua"])) {
			 if ($_COOKIE["lingua"] == "eng") {
				 $lingua = $farsi_eng;
			 } else {
				 $lingua = $farsi_ita;
			 }
		 }
?>

<html>
	<head>
		<title>Elenco Regioni</title>
		<link rel="stylesheet" href="stile.css">
	</head>
	<body>
		<h1>Formula 1</h1>
        <h2>Classifica piloti per numero di gare vinte</h2>


		<?php
			
			require("config.php"); 
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}

		
			$query1 = "SELECT p.id,p.nome,p.cognome,COUNT(*) as vittorie 
						FROM pilota p 
						JOIN partecipa pa ON p.id=pa.fkPilota
						WHERE pa.posizione=1 
						GROUP BY p.id,p.nome,p.cognome;
						";
			$risultato1 = $mydb->query($query1);
			
			
			if($risultato1->num_rows > 0){  
                echo "<table>";
                echo "<tr><td>Nome</td><td>Cognome</td><td>Vittorie</td></tr>";
				
				while($VittoriePiloti = $risultato1->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$VittoriePiloti["nome"]."</td>";
					echo "<td>".$VittoriePiloti["cognome"]."</td>";
					echo "<td>".$VittoriePiloti["vittorie"]."</td>";
					echo "</tr>";	
				}
                echo "</table>";
			}
			else{
				echo "<p>Non ci sono Piloti al interno database.</p>";
			}
		
		?>

        <h2>Classifica Scuderia che ha vinto almeno 3 gare</h2>
        <?php
        	

			$query2 = "SELECT s.nome,s.nazione,COUNT(*) AS vittorie 
							FROM scuderia s
							JOIN pilota p ON s.id=p.fkScuderia
							JOIN partecipa pa ON p.id=pa.fkPilota
							WHERE pa.posizione=1
							GROUP BY s.nome,s.nazione
							HAVING vittorie>1
							ORDER BY vittorie DESC";
			$risultato2 = $mydb->query($query2);
			
			
			if($risultato2->num_rows > 0){  
                echo "<table>";
                echo "<tr><td>Nome</td><td>Nazione</td><td>Vittorie</td></tr>";
				
				while($VittorieScuderie = $risultato2->fetch_assoc()){
							echo "<tr>";
							echo "<td>".$VittorieScuderie["nome"]."</td>";
							echo "<td>".$VittorieScuderie["nazione"]."</td>";
							echo "<td>".$VittorieScuderie["vittorie"]."</td>";
							echo "</tr>";	
				}
                echo "</table>";
			}
			else{
				echo "<p>Non ci sono scuderie al interno database.</p>";
			}
        ?>

		
		<h2>Classifica Scuderia che ha vinto almeno 3 gare</h2>

		<?php
        	

			$query3 = "SELECT p.nome,p.cognome,COUNT(*) as vittorie 
						FROM pilota p 
						JOIN partecipa pa ON p.id=pa.fkPilota
						WHERE pa.posizione=1 
						GROUP BY p.nome,p.cognome
						HAVING vittorie>3
						ORDER BY P.cognome";
			$risultato3 = $mydb->query($query3);
			
			
			if($risultato3->num_rows > 0){  
                echo "<table>";
				echo "<tr><td>Nome</td><td>Cognome</td><td>Vittorie</td></tr>";
				
				while($VittoriePilotiplus3 = $risultato3->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$VittoriePilotiplus3["nome"]."</td>";
					echo "<td>".$VittoriePilotiplus3["cognome"]."</td>";
					echo "<td>".$VittoriePilotiplus3["vittorie"]."</td>";
					echo "</tr>";	
				}
                echo "</table>";
			}
			else{
				echo "<p>Non ci sono Piloti al interno database.</p>";
			}
        ?>

		<h2>Introiti Scuderie</h2>

		<?php
        	

			$query4 = "SELECT s.nome,SUM(sp.importo)as Inroiti_complessivi 
							FROM scuderia s 
							JOIN sponsorizza sp ON s.id=sp.fkScuderia 
							GROUP BY s.nome 
							ORDER BY Inroiti_complessivi DESC;";
			$risultato4 = $mydb->query($query4);
			
			
			if($risultato4->num_rows > 0){  
                echo "<table>";
				echo "<tr><td>Nome</td><td>Introiti</td></tr>";
				
				while($IntroitiScuderie = $risultato4->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$IntroitiScuderie["nome"]."</td>";
					echo "<td>".$IntroitiScuderie["Inroiti_complessivi"]."</td>";
					echo "</tr>";	
				}
                echo "</table>";
			}
			else{
				echo "<p>Non ci sono scuderie al interno database.</p>";
			}
        ?>

		











	</body>
</html>