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
$marca = '';
$targa = '';
$id = null;
$modello = null;
$colore = null;

if (isset($_POST['modello'])){
    $targa = $_POST['targa'];
    $marca = $_POST['marca'];
    $modello = $_POST['modello'];
    $colore = $_POST['colore'];
    $nome_prop = $_POST['nome_proprietario'];
    $cognome_prop = $_POST['cognome_proprietario'];
    $codice_fiscale = $_POST['codice_fiscale'];

    if (isset($_POST['id'])){
        $id = $_POST['id'];
        CarRepository::updateCar($targa, $marca, $modello, $colore, $id);
    }
    else if ($targa != '') {
        CarRepository::addCar($targa, $marca, $modello, $colore,$nome_prop,$cognome_prop,$codice_fiscale);
    }
}


if(isset($_POST['targa'])){
    $targa =$_POST['targa'];
    $cars = CarRepository::searchOne($targa);
}

if(isset($_GET['action'])){
    $azione = $_GET['action'];
    $id = $_GET['id'];

    if($azione =='modifica'){
        $cars = CarRepository::getCar($targa,$marca,$modello,$colore,$id);
    }
    else{
        CarRepository::delete($id);
    }
}


/*if(isset($_POST['traga']) == null){
    "C'è un problema, scrivi un' altra targa parziale";
    $cars = CarRepository::searchOne($targa);
}*/

//var_dump($cars);



echo $template->render('crud', [
    'cars' => $cars,
    'targa' => $targa,
    'marca' => $marca,
    'modello'=> $modello,
    'colore' => $colore,
    'id'=>$id
]);