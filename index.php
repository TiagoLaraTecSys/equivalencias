<?php

require_once 'Repositorios/MarcasRepositories.class.php';
require_once 'Entidades/Marcas.php';

$teste = "Hello WORD";

$newMarcas = new Marcas($teste);

$MarcasRepo = new MarcasRepositories();

//$us = $MarcasRepo->insertMarcas($newMarcas);

$marca = $MarcasRepo->findAll();

echo print_r($marca);
?>