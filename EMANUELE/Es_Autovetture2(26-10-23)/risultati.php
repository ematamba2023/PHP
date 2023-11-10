<html>
	<head>
		<title>Risultati</title>
		<link rel="stylesheet" href="stile.css">
	</head>
	<body>
		<h1>Risultati Ricerca.....</h1>
		<?php
			
			require("config.php"); 
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}
			
			$anno=$_POST["anno"];
            $km=$_POST["km"];
            $alimentazione=$_POST["alimentazione"];
            $kw=$_POST["kw"];
        

			$query1 = "SELECT * 
                    FROM auto
                    WHERE 1=1";

            if($anno!=''){
                    $query1.=" AND anno=".$anno;
                }
            if($km!='' ){
                    $query1.=" AND chilometri=".$km;
            }
            if($alimentazione!=''){
                $query1.=" AND alimentazione='".$alimentazione."'";
            }
            if($kw!=''){
                $query1.=" AND kw=".$kw;
            }
            
			$risultato1 = $mydb->query($query1);
			
			
			if($risultato1->num_rows > 0){  
                echo "<table>";
                echo "<tr>


                <td>Marca</td>
                <td>Allestimento</td>
                <td>Anno</td>
                <td>Km</td>
                <td>Alimentazione</td>
                <td>kw</td>
                 

                </tr>";
				
				while($auto2 = $risultato1->fetch_assoc()){
							echo "<tr>";
                            echo "<td>".$auto2["marca"]."</td>";
                            echo "<td>".$auto2["allestimento"]."</td>";
                            echo "<td>".$auto2["anno"]."</td>";
                            echo "<td>".$auto2["chilometri"]."</td>";
                            echo "<td>".$auto2["alimentazione"]."</td>";
                            echo "<td>".$auto2["kw"]."</td>";
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
</html>