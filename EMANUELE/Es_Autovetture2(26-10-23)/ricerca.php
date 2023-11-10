<html>
	<head>
		<title>FORM</title>
		<link rel="stylesheet" href="stile.css">
	</head>
	<body>
		<h1>Ricerca Auto</h1>
		<?php
			
			require("config.php"); 

			
		?>
        <form method="post" action="risultati.php">
            Anno: <input type="text" name="anno" id="anno"><br></br>
            Km: <input type="text" name="km" id="anno"><br></br>
            Alimentazione: <input type="text" name="alimentazione" id="anno"><br></br>
            Kw: <input type="text" name="kw" id="anno"><br></br>
            <input type="submit" value="cerca">
        </form>
		

	</body>
</html>