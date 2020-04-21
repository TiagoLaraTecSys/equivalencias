<?php

require_once 'Concorrentes.class.php';
class Marcas
{
    
    private $id;
    private $nome;
    
    private $concorrentes = array();

    public function __Marcas($id){
        $this -> id=$id;
    }
    public function Marcas($nome){

        $this->nome=$nome;
        
    }
    
    public function setId($id) {
        $this -> id = $id;
    }
    
    public function getId() {
        return $this -> id;
    }
    
    public function setNome($nome) {
        $this -> nome = $nome;
    }
    
    public function getNome() {
        return $this -> nome;
    }
    
    public function setConcorrentes(Concorrentes $concorrentes)
    {
        $this -> concorrentes = $concorrentes;
    }

    public function getConcorrentes()
    {
        return $this -> concorrentes;
    }
    
    public function __toString()
    {
        return $this->id.', '.$this->nome ;
    }
}
?>
