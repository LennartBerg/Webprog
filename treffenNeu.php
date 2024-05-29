<?php
require_once './vendor/autoload.php';

$treffenController = new \PHP_Bausteine\controller\TreffenController();
$nutzerController = new \PHP_Bausteine\controller\NutzerController();

$name = $_Post ['name'];
$ort = $_Post ['ort'];
$datum = $_Post ['datum'];
$ersteller = $nutzerController -> getNutzer();
$zeit = $_Post ['zeit'];
$beschreibung = $_Post ['beschreibung'];

$treffenController->treffenNeu($name, $ort, $datum, $ersteller, $zeit, $beschreibung);

