<html>
	<head>
		<title>Tabella Tecnica</title>
		<link rel="stylesheet" href="stile.css">
	</head>
	<body>
		<h1>Tabella tecnica</h1>
		<?php
			
			require("config.php"); 
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}
			
			$id=$_GET["id"];
			$query1 = "SELECT * 
                    FROM auto
                    WHERE id=$id
            ";
			$risultato1 = $mydb->query($query1);
			
			
			if($risultato1->num_rows > 0){  
                echo "<table>";
                echo "<tr>

                <td>Allestimento</td>
                <td>Anno</td>
                <td>Chilometri</td>
                <td>Alimentazione</td>
                <td>Cambio</td>
                <td>kw</td>
                <td>Prezzo</td>  

                </tr>";
				
				while($auto2 = $risultato1->fetch_assoc()){
							echo "<tr>";
							echo "<td>".$auto2["allestimento"]."</td>";
                            echo "<td>".$auto2["anno"]."</td>";
                            echo "<td>".$auto2["chilometri"]."</td>";
                            echo "<td>".$auto2["alimentazione"]."</td>";
                            echo "<td>".$auto2["cambio"]."</td>";
                            echo "<td>".$auto2["kw"]."</td>";
                            echo "<td>".$auto2["prezzo"]."</td>";
							echo "</tr>";	
				}
                echo "</table>";
			}
			else{
				echo "<p>Non ci sono specifiche nel database.</p>";
			}
			
		?>
	</body>
</html>