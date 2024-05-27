<?php

session_start();
if (!isset($abs_path)) {
    require_once "../../../path.php";
}

require_once $abs_path . "/PHP_Bausteine/model/TreffenModel/TreffenListe.php";
require_once $abs_path . "/PHP_Bausteine/model/TreffenModel/Treffen.php";

// Ueberpruefung der Parameter
//TODO: Workaround überlegen wie wir den Parameter für ID bekommen,lol
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    $_SESSION["message"] = "invalid_Treffen_id";
    header("Location: index.php");
    exit;
}

try {

    $id = intval($_GET["id"]);


    $treffenListe = TreffenListe::getInstance();
    $treffen = $treffenListe->getTreffen($id);
} catch (FehlenderNutzerException $exc) {

    $_SESSION["message"] = "invalid_nutzer_id";
    header("Location: index.php");
    exit;
} catch (InternerFehlerException $exc) {

    $_SESSION["message"] = "internal_error";
    header("Location: index.php");
    exit;
}