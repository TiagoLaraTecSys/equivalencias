<?php

class Marcas
{
    
    var $id;
    var $nome;
    

    public function Marcas($nome){

        $this->nome=$nome;
        
    }
    
    public function setId($id) {
        $this -> $id = $id;
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
    
    
    
}
?>
