<?php

require_once 'Repositorios/DatabaseConfig.php';
require_once 'Entidades/Marcas.php';
class MarcasRepositories
{
        
    public static function insertMarcas(\Marcas $obj) {
        
        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('INSERT INTO eq_marcas(nome) values(:nome);');

        $stmt->bindParam(':nome', $obj->getNome(), \PDO::PARAM_STR);

        try {

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }

        $pdo->close();
    }

    public function findById($id){

        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('SELECT nome FROM eq_marcas WHERE id=:id;');

        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        try {

            $stmt->execute();
            $Dados = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($Dados)){

                $marcas = new Marcas($Dados['nome']);
               
                return $marcas;
            }

        } catch (Exception $e) {
            throw new Exception($e);
            
        }

    }
    
    public function findAll(){

        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('SELECT * FROM eq_marcas;');

        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

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

