<!DOCTYPE html>
<html lang="en">
<head>
<title>Piatti Tipici Regione</title>
		<link rel="stylesheet" href="stile.css">
</head>
<body>
    <h1>Piatti tipici</h1>

    <?php
            require("config.php"); 
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}
	?>

	<?php

		if(isset($_GET['regione'])){

            $regione=$_GET["regione"];
				$query2 = "SELECT pietanza.nome
                    FROM regione    
                    JOIN pietanza ON regione.id=pietanza.fkRegione
                    WHERE regione.nome= '".$regione."'
            ";
			$risultato1 = $mydb->query($query2);

            if($risultato1->num_rows > 0){  
                echo "<table>";
                echo "<tr>

                <td>Nome</td>

                </tr>";
				
				while($pietanza = $risultato1->fetch_assoc()){
							echo "<tr>";
							echo "<td>".$pietanza["nome"]."</td>";
							echo "</tr>";	
				}
                echo "</table>";
			}
			else{
				echo "<p>Non ci sono specifiche nel database.</p>";
			}
		}
		

	else if(isset($_GET['ingrediente'])){
		

		$ingredienti=$_GET['ingrediente'];

		$query3= "SELECT p.nome AS nome_piatto
			FROM pietanza p
			JOIN utilizza u ON p.id = u.fkPietanza
			JOIN ingrediente i ON u.fkIngrediente = i.id
			WHERE i.nome = '".$ingredienti."'
		";
		$risultato1 = $mydb->query($query3);
	
		if($risultato1->num_rows > 0){  
			echo "<table>";
			echo "<tr>

			<td>Nome</td>

			</tr>";
			
			while($pietanza = $risultato1->fetch_assoc()){
						echo "<tr>";
						echo "<td>".$pietanza["nome_piatto"]."</td>";
						echo "</tr>";	
			}
			echo "</table>";
		}
		else{
			echo "<p>Non ci sono specifiche nel database.</p>";
		}

	}
	else{
		$query_e ="	SELECT *
				FROM pietanza
				";
	$risultato2 = $mydb->query($query_e);

	if($risultato2->num_rows > 0){  
		echo "<table>";
		echo "<tr>

		<td>Nome</td>

		</tr>";
		
		while($pietanza = $risultato2->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$pietanza["nome"]."</td>";
					echo "</tr>";	
		}
		echo "</table>";
	}
	else{
		echo "<p>Non ci sono specifiche nel database.</p>";
	}
}	
?>


    
</body>
</html>