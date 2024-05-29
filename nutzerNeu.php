<?php
require_once './vendor/autoload.php';

$nutzerController = new \PHP_Bausteine\controller\NutzerController;
$nutzerController->nutzerNeu();

//@Markus und @Dibp, könnt ihr uns beim nächsten Tutorium vielleicht sagen weswegen keine Einträge in die Datenbank geschrieben werden?