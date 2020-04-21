<?php

require_once 'Repositorios/DatabaseConfig.php';
require_once 'Entidades/Marcas.class.php';
require_once 'Entidades/Concorrentes.class.php';
class ConcorrentesRepositories
{
        
    public static function insertConcorrentes(\Concorrentes $obj) {
        
        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('INSERT INTO eq_concorrente(codigo,nomeDescricao,id_marcas) values(:codigo,:nomeDescricao,:id_marcas);');

        $stmt->bindParam(':codigo', $obj->getCodigo(), \PDO::PARAM_STR);
        $stmt->bindParam(':nomeDescricao', $obj->getNomeDescricao(), \PDO::PARAM_STR);
        $id_marcas = $obj->getMarcas()->getId();
        $stmt->bindParam(':id_marcas', $id_marcas, \PDO::PARAM_INT);

        try {

            $stmt->execute();
            return  $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo $e;
        }

        
    }

    public function findById($id){

        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('SELECT eq_concorrente.id,eq_concorrente.codigo, eq_concorrente.nomeDescricao, eq_marcas.nome
                                FROM industri_vendedores.eq_concorrente inner join eq_marcas
                                on eq_concorrente.id_marcas = eq_marcas.id where eq_concorrente.id = :id;');

        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        try {

            $stmt->execute();
            $Dados = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($Dados)){

                $concorrentes = new Concorrentes($Dados['id'],$Dados['codigo'],$Dados['nomeDescricao']);
                $concorrentes->setMarcas(new Marcas($Dados['nome']));
                
                return $concorrentes;
            }

        } catch (Exception $e) {
            throw new Exception($e);
            
        }

    }
    
    public function findAll(){

        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('SELECT eq_concorrente.id,eq_concorrente.codigo, eq_concorrente.nomeDescricao, eq_marcas.nome
                                FROM industri_vendedores.eq_concorrente inner join eq_marcas
                                on eq_concorrente.id_marcas = eq_marcas.id;');

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

