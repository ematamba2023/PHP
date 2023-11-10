<?php
class carte{
    private $numero; 
    private $seme;

    public function __construct($num, $sem) {
        $this->numero = $num;
        $this->seme = $sem;
    }

    public function getNumero(){
        return $numero;
    }

    public function getSeme(){
        return $seme;
    }
    
    
}

//creo un'array con i numeri delle carte
$numero = array("1","2","3","4","5","6","7","fante","cavallo","re");

//creo l'array con il seme delle carte
$seme = array("bastone", "spade", "denari", "coppe");

//creo mazzo di carte
$mazzo = array();
for($i=0; $i<10; $i++){
    for($j=0; $j<4; $j++){
        $carte = new carte($numero[$i],$seme[$j]);
        $mazzo[] = $carte;
    }
}
    shuffle($mazzo);
?>