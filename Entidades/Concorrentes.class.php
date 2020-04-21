<?php

require_once 'Marcas.class.php';

class Concorrentes{

	private $id;
	private $codigo;
	private $nomeDescricao;

	private $marcas;

	public function Concorrentes($id, $codigo, $nomeDescricao){

		$this -> id = $id;
		$this -> codigo = $codigo;
		$this -> nomeDescricao = $nomeDescricao;
        
	}

    public function setId($id) {
        $this -> id = $id;
    }
    
    public function getId() {
        return $this -> id;
    }
    
    public function setCodigo($codigo){

    	$this -> codigo = $codigo;
    }

    public function getCodigo(){
    	return $this -> codigo;
    }

    public function setNomeDescricao($nomeDescricao) {
        $this -> nomeDescricao = $nomeDescricao;
    }
    
    public function getNomeDescricao() {
        return $this -> nomeDescricao;
    }

    public function setMarcas(Marcas $marcas)
    {
    	$this -> marcas = $marcas;
    }

    public function getMarcas()
    {
    	return $this -> marcas;
    }


    public function __toString()
    {
        return $this->id.', '.$this->codigo.', '.$this->nomeDescricao.', Marca: '.$this->marcas;
    }

}

?>