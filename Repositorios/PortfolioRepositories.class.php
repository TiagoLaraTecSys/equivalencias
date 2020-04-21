<?php

require_once 'Repositorios/DatabaseConfig.php';
require_once 'Entidades/Marcas.class.php';
require_once 'Entidades/Portfolio.class.php';
class PortfolioRepositories
{
        
    public static function insertPortfolio(\Portfolio $obj) {
        
        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('INSERT INTO eq_portfolio(codigoSafety,codigoFornecedor,nomeDescricao,id_fornecedor) values(:codigoSafety,:codigoFornecedor,:nomeDescricao,:id_fornecedor);');

        $stmt->bindParam(':codigoSafety', $obj->getCodigo(), \PDO::PARAM_STR);
        $stmt->bindParam(':codigoFornecedor', $obj->getCodigo(), \PDO::PARAM_STR);
        $stmt->bindParam(':nomeDescricao', $obj->getNomeDescricao(), \PDO::PARAM_STR);
        $id_fornecedor = $obj->getFornecedor()->getId();
        $stmt->bindParam(':id_fornecedor', $id_fornecedor, \PDO::PARAM_INT);

        try {

            $stmt->execute();
            return  $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo $e;
        }

        
    }

    public function findById($id){

        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('SELECT eq_portfolio.id,codigoSafety,codigoFornecedor,nomeDescricao,eq_fornecedor.nome FROM industri_vendedores.eq_portfolio inner join eq_fornecedor
            on eq_portfolio.id_Fornecedor = eq_fornecedor.id where eq_portfolio.id = :id;');

        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        try {

            $stmt->execute();
            $Dados = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($Dados)){

                $portfolio = new Portfolio($Dados['id'],$Dados['codigoFornecedor'],$Dados['nomeDescricao'],$Dados['codigoSafety']);
                //$fornecedor = new Marcas();
                $portfolio->setFornecedor(new Marcas($Dados['nome']));
                return $portfolio;
            }

        } catch (Exception $e) {
            throw new Exception($e);
            
        }

    }
    
    public function findAll(){

        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('SELECT eq_portfolio.id,codigoSafety,codigoFornecedor,nomeDescricao,eq_fornecedor.nome FROM industri_vendedores.eq_portfolio inner join eq_fornecedor
            on eq_portfolio.id_Fornecedor = eq_fornecedor.id');

        try {

            $marcas = array();

            $stmt->execute();

        while($Dados = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            $resultado[] = $Dados;
            //return $maletas;
        }

        return $resultado; 
        } catch (Exception $e) {
            throw new Exception($e);
            
        }

    }
    
}

