<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <p>Ciao mondo</p>
        <?php
            //dichiaro variabili
            $x = 1;//non serve definire il tipo di variabile
            $x = "Cristiano Ronaldo";
            $y = 2;
            //stampa
            echo"<p>". $x. "<p>";//il punto serve per la concatenazione
            $z = 2;
            if($y % $z == 0){
                echo "<p>"."y pari"."<p>";
            }

            //dichiarazione array
            $animali = array("Gatto", "Cane", "Topo", "Mucca");
            //$animali = ["Gatto", "Cane", " Mucca"];
            //$animali[0] = "Elefantino";
            //$animali[5] = "Tigre";
            //ciclo per stampare array
            //foreach($animali as $animale){//fino a quando ci sono anmimali metterli nella variabile animale
            foreach($animali as $i => $animale){//aggiunta indice 
                //stampa
                echo "(".$i.")".$animale.",";
            }
            echo "<br><br>";
            //$fattoria = array("Gatto" => "Miao", "Pecora" => "Behhh", "Cane" => "Bau", "Mucca" => "Muuuu");
            $fattoria = array("Gatto" => array("Il", "Miao"),
                              "Cane" => array("Il", "Bauuu"),
                              "Mucca" => array("La", "Muuu"),
                              "Pecora" => array("La", "Behh"));
            foreach($fattoria as $animale => $verso){
                echo "<p>".$verso[0]." ".$animale." fa ".$verso[1]."</p>";
            }
                
            
        
            
        ?>
    </body>
</html>