<?php

    class Rettangolo{
        private $base;
        private $altezza;

        public function __construct($b, $a){
            $this->base = $b;
            $this->altezza = $a;
        }

        public function getBase(){
            return $this->base;
        }

        public function getAltezza(){
            return $this->altezza;
        }

        public function getArea(){
            return $this->base * $this->altezza;
        }

        public function stampa($lingua = "ITA"){
            $frase;
            switch($lingua){
                case "ENG":
                    $frase = "The rectangle area is: ".$this->getArea();
                    break;
                case "FRA":
                    $frase = "Mangiabaguette es: ".$this->getArea();
                    break;
                case "ITA":
                    $frase = "L'area del rettangolo e': ".$this->getArea();
                default:
                    $frase = "Lingua non riconosciuta";
                    break;
            }
            return $frase;
        }

        public function esempio($p1, $p2="val2", $p3="val3"){
            return "Hai inserito ".$p1.", ".$p2.", ".$p3;
        }
    }

    class Quadrato extends Rettangolo{

        //OVERRIDE COSTRUTTORE
        public function __construct($l){
            parent::__construct($l,$l); //utilizzo il costruttore del genitore
        }

        public function getLato(){
            return parent::getBase();
        }
    }

?>