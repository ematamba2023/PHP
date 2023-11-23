<?php
    //le operazioni sulla  sessione e sui coookie vanno qui
    $farsi_ita = array("Sciegli la lingua:", "benvenuto!");
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




<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <form method="post" action="sceglingua.php">
        <p><?php echo $lingua[0] ?></p>
        <select name="lingua">
            <option value="ita">Italiano</option>
            <option value="eng">Inglese</option>
        </select>
        <input type="submit" value="invia">
    </form>
</body>
</html>