<?php


class Portfolio extends Concorrentes{


	private $codigoSafety;

	private $fornecedor;

	function __construct($id, $codigo, $nomeDescricao, $codigoSafety) {
       parent::Concorrentes($id,$codigo,$nomeDescricao);

       $this -> codigoSafety = $codigoSafety;
   	}

	public function setCodigoSafety($obj){

    	$this -> codigoSafety = $obj;
    }

    public function getCodigoSafety(){
    	return $this -> codigoSafety;
    }

   	public function setFornecedor(Marcas $fornecedor)
   	{
   		$this -> fornecedor = $fornecedor;
   	}

  	public function getFornecedor()
  	{
    	return $this -> fornecedor;
    }

    public function __toString()
    {
        return $this->getId().', '.$this->getCodigo().', '.$this->getNomeDescricao().', '.$this->codigoSafety.', Fornecedor: '.$this->fornecedor;
    }
}

?>