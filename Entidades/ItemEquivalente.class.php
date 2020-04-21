<?php

require_once 'Concorrentes.class.php';
require_once 'ItemEquivalentePK.class.php';
class ItemEquivalente
{
    
    private $id;
    private $motivoEquivalencia;
    
    public function ItemEquivalente(\Portfolio $port, \Concorrentes $conc, $motivoEquivalencia ){

        $itemEquivalentePK = new ItemEquivalentePK();
        $itemEquivalentePK->setPortfolio($port);
        $itemEquivalentePK->setConcorrente($conc);
        $this -> id =  $itemEquivalentePK;
        $this -> motivoEquivalencia = $motivoEquivalencia;
    }

    public function setId(\ItemEquivalentePK $id) {
        $this -> id = $id;
    }
    
    public function getId() {
        return $this -> id;
    }

    public function setMotivoEquivalencia($motivoEquivalencia)
    {
        $this-> motivoEquivalencia = $motivoEquivalencia;
    }
    
    public function getMotivoEquivalencia()
    {
        return $this -> motivoEquivalencia;
    }
    public function getPortfolio()
    {
        return $this->id->getPortfolio();
    }

        public function getConcorrente()
    {
        return $this->id->getConcorrente();
    }

    public function __toString()
    {
        return $this->getPortfolio().', '.$this->getConcorrente().', '.$this->motivoEquivalencia;
    }
}
?>
