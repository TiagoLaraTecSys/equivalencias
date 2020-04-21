<?php
use Repositorios\MarcasRepositories;

require_once 'Repositorios/MarcasRepositories.class.php';
require_once 'Repositorios/ConcorrentesRepositories.class.php';
require_once 'Repositorios/PortfolioRepositories.class.php';
require_once 'Repositorios/ItemEquivalenteRepositories.class.php';

class ItemEquivalenteService
{
    
    public static function insertEquivalente(\ItemEquivalente $obj) {
        
        $ItemEquivRepo = new ItemEquivalenteRepositories();
        $ItemEquivRepo->insertItemEquivalente($obj);
    }
    
}

