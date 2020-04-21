<?php

require_once 'Repositorios/DatabaseConfig.php';
require_once 'Entidades/Portfolio.class.php';
require_once 'Entidades/Concorrentes.class.php';
require_once 'Entidades/ItemEquivalente.class.php';

class ItemEquivalenteRepositories
{
        
    public static function insertItemEquivalente(\ItemEquivalente $obj) {
        
        $pdo = DatabaseConfig::conexao();
        $stmt = $pdo->prepare('INSERT INTO eq_itemEquivalente(id_portfolio,id_concorrente,motivoEquivalencia) values(:id_portfolio,:id_concorrente,:motivoEquivalencia);');

        $stmt->bindParam(':id_portfolio', $obj->getPortfolio()->getId(), \PDO::PARAM_INT);
        $stmt->bindParam(':id_concorrente', $obj->getConcorrente()->getId(), \PDO::PARAM_INT);
        $stmt->bindParam(':motivoEquivalencia', $obj->getMotivoEquivalencia(), \PDO::PARAM_STR);
        try {

            $stmt->execute();
            return  $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo $e;
        }

        //$pdo->close();
    }

}

