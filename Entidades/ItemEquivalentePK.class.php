<?php

require_once 'Concorrentes.class.php';
class ItemEquivalentePK
{
    
    private $portfolio;
    private $concorrente;


    public function setPortfolio(\Portfolio $obj) {
        $this -> portfolio = $obj;
    }
    
    public function getPortfolio() {
        return $this -> portfolio;
    }
    
    public function setConcorrente(\Concorrentes $obj) {
        $this -> Concorrente = $obj;
    }
    
    public function getConcorrente() {
        return $this -> Concorrente;
    }
    
    public function __toString()
    {
        return $this->id.', '.$this->nome ;
    }
}
?>
