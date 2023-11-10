<?php
class Domanda{
    private $testo;         //testo della domanda
    private $rispGiusta;    //valore della risposta giusta
    private $rispErrate;    //array di risposte sbagliate

    //il costruttore riceve: una stringa, una stringa, un array di stringhe
    public function __construct($testo, $giusta, $errate){
        $this->testo = $testo;
        $this->rispGiusta = $giusta;
        $this->rispErrate = $errate;
    }

    public function getTesto(){
        return $this->testo;
    }

    //ritorna tutte le risposte (giusta e sbagliate insieme) in ordine casuale
    public function getRisposte(){
        $risposte = $this->rispErrate; //mi copio l'array con le risp errate
        $risposte[] = $this->rispGiusta; //faccio l'append della risp giusta
        shuffle($risposte); //mischio l'array casualmente
        return $risposte;
    }

    //controlla la risposta dell'utente
    public function isGiusta($risp){
        if($risp == $this->rispGiusta) return true;
        else return false;
    }
}

//creo l'array delle domande
$domande = array(
        new Domanda("Che anno è?", "2023", array("1990", "2002", "2030")),
        new Domanda("Quando è stata scoperta l'America?", "1492", array("1990", "2002", "2030")),
        new Domanda("Di che colore è il cavallo bianco di Napoleone?", "Bianco", array("Nero", "Verde", "Grigio")),
        new Domanda("Chi è il migliore amico di Topolino?", "Pippo", array("Paperino", "Zio Paperone", "Clarabella")),
        new Domanda("Qual è la prima lettera dell'alfabeto?", "A", array("Z", "B", "K"))
);

?>