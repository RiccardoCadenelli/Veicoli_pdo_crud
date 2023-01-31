<?php
/**
 * @var $targa
 * @var $marca
 * @var $modello
 * @var $colore
 */
require_once 'vendor/autoload.php';
require_once 'conf/config.php';

use League\Plates\Engine;
use Model\CarRepository;

$template = new Engine('templates','tpl');

$cars = [];

if (isset($_POST['cars'])){
    $cars = $_POST['cars'];
    $targa = $_POST['targa'];
    $marca = $_POST['marca'];
    $modello = $_POST['modello'];
    $colore = $_POST['colore'];

    if (isset($_POST['id'])){
        $id = $_POST['id'];
        CarRepository::updateCar($targa, $marca, $modello, $colore, $id);
    }
    else if ($cars != '') {
        CarRepository::add($cars, $targa, $marca, $modello, $colore);
    }
}


if(isset($_POST['targa'])){
    $targa =$_POST['targa'];
    $cars = CarRepository::searchOne($targa);
}

if(isset($_POST['']))


/*if(isset($_POST['traga']) == null){
    "C'è un problema, scrivi un' altra targa parziale";
    $cars = CarRepository::searchOne($targa);
}*/

//var_dump($cars);



echo $template->render('crud', [
    'cars' => $cars,
]);