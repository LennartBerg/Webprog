<?php
if(!isset($abs_path)){
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/RezeptModel/Rezept.php";
require_once $abs_path . "/PHP_Bausteine/model/RezeptModel/Rezeptbuch.php";

if(!isset($_GET["RezeptID"]) || !is_numeric($_GET["RezeptID"])){
    $_SESSION["message"] = "invalid_recipe_id";
    header("Location: Rezepte.php");
    exit;
}

try{

    $RezeptID = intval($_GET["RezeptID"]);
    $Rezeptbuch = Rezeptbuch::getInstance();
    $Rezept = $Rezeptbuch->getRezept($RezeptID);

}catch(FehlendesRezeptException $exc) {

    $_SESSION["message"] = "invalid_recipe_id";
    header("Location: Rezepte.php");
    exit;
}catch(InternerFehlerException $exc) {

    $_SESSION["message"] = "internal_error";
    header("Location: Rezepte.php");
    exit;
}

/**
 * TODO: HIER WRAPPER FÜR DATENBANK EINBAUEN (DIE GESAMTE DATEI)
 */