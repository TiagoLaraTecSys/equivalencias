<?php

require_once 'Repositorios/MarcasRepositories.class.php';
require_once 'Repositorios/ConcorrentesRepositories.class.php';
require_once 'Repositorios/PortfolioRepositories.class.php';
require_once 'Entidades/Marcas.class.php';
require_once 'Entidades/Concorrentes.class.php';
require_once 'Entidades/Portfolio.class.php';
require_once 'Entidades/ItemEquivalente.class.php';
require_once 'Services/ItemEquivalenteService.php';
$newMarcas = new Marcas('WAGO');
$newMarcas->setId(1);
/* ----------Teste de inserção do Concorrente e Marcas.



$MarcasRepo = new MarcasRepositories();
$us = $MarcasRepo->insertMarcas($newMarcas);
$newMarcas -> setId($us);
echo $newMarcas->getId();



$c1 = new Concorrentes(null,'6E094I2304','Remota Siemens',$newMarcas);
$c2 = new Concorrentes(null,'6E99919123','Cartão Siemens',$newMarcas);
$c1->setMarcas($newMarcas);
$c2->setMarcas($newMarcas);
$ConcorrentesRepo = new ConcorrentesRepositories();
echo $conc = $ConcorrentesRepo->insertConcorrentes($c1);
echo $conc1 = $ConcorrentesRepo->insertConcorrentes($c2);
echo $ConcorrentesRepo->findById($conc);*/


$newPort = new Portfolio(null,'750-430','Módulo de entrada Digital','000333');
$newPort-> setFornecedor($newMarcas);
//echo $newPort;

$PortfolioRepo = new PortfolioRepositories();
$ConcorrentesRepo = new ConcorrentesRepositories();

$newPorto = ($PortfolioRepo->insertPortfolio($newPort));

$motivo = 'Apenas mais um show';
//echo $PortfolioRepo->findById($newPorto);

$newEquivalente = new ItemEquivalente($PortfolioRepo->findById($newPorto), $ConcorrentesRepo->findById(1),$motivo);
ItemEquivalenteService::insertEquivalente($newEquivalente);
echo $newEquivalente;


?>