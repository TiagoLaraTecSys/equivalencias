<?php
namespace Repositorios;
require_once 'Repositorios/DatabaseConfig.php';
require_once 'Entidades/Marcas.php';
class MarcasRepositories
{
    
    public function MarcasRepositories(){}
    
    public static function insertMarcas(\Marcas $obj) {
        
        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('INSERT INTO marcas(nome) values(:nome);');

        $stmt->bindParam(':nome', $obj->getNome(), \PDO::PARAM_STR);

        if($stmt->execute() == TRUE){
            return TRUE;
            echo "Record updated successfully";
        } else {
            echo "Cago no pau";
            return FALSE;
        }
        $pdo->close();
    }
    
    
}

