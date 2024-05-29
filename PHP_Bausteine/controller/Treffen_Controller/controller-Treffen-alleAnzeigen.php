<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../../path.php";
}

require_once $abs_path . "/PHP_Bausteine/model/TreffenModel/TreffenListe.php";
require_once $abs_path . "/PHP_Bausteine/model/TreffenModel/Treffen.php";


try {
    $TreffenListe = TreffenListe::getInstance();
    $TreffenArray = $TreffenListe->getAllTreffen();
} catch (InternerFehlerException $exc) {
    // Behandlung von potentiellen Fehlern der Geschaeftslogik
    $_SESSION["message"] = "internal_error";
    header("Location: ../../../index.php");
    exit;
}