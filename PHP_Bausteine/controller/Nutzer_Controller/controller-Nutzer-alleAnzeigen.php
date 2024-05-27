<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../../path.php";
}

require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/NutzerListe.php";
require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/Nutzer.php";


try {

    $NutzerListe = NutzerListe::getInstance();
    $NutzerArray = $NutzerListe->getAllNutzer();
} catch (InternerFehlerException $exc) {

    $_SESSION["message"] = "internal_error";
    header("Location: ../../..index.php");
    exit;
}


