<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php
        //include("rettangolo.php"); //include il file, se non lo trova da un WARNING
        //require("rettangolo.php"); //include il file, se non lo trova da un ERROR
        //include_once("rettangolo.php"); //come include, ma non ripete l'inclusione se e' gia'
        require_once("rettangolo.php"); //come require, ma non ripete

        $r1 = new Rettangolo(10, 2);
        echo "<p>Base: ".$r1->getBase()."</p>";
        echo "<p>Altezza: ".$r1->getAltezza()."</p>";
        echo "<p>L'area del rettangolo e': ".$r1->getArea()."</p>";
        echo "<p>".$r1->stampa("ENG")."</p>";
        echo "<p>".$r1->stampa("FRA")."</p>";
        echo "<p>".$r1->esempio("fragola", "banana", "pera")."</p>";

        $q1 = new Quadrato(6);
        echo "<p>L'area del quadrato e': ".$q1->getArea()."</p>";

    ?>
</body>
</html>