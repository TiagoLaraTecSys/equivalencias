<?php
namespace Services;
use Repositorios\MarcasRepositories;

require_once 'Repositorios/MarcasRepositories.php';

class MarcasService
{
    
    public function insetMarcas(\Marcas $obj) {
        
        $marcaRepo = new MarcasRepositories();
        $marcaRepo->insertMarcas($obj);
    }
    
}

