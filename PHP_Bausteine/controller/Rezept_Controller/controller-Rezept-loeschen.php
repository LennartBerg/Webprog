<?php
if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/RezeptModel/Rezeptbuch.php";
require_once $abs_path . "/PHP_Bausteine/model/RezeptModel/Rezept.php";

$RezeptID = isset($_POST[htmlspecialchars("RezeptId")]) ? $_POST[htmlspecialchars("RezeptID")] : "";

if(!isset($_POST[$RezeptID])){
    $_SESSION["message"] = "missing_data";
    header("Location: /Rezepte.php");
    exit;
}
try{
    $tmp = Rezeptbuch::getInstance() ->  loescheRezept($RezeptID);
    exit;
} catch (InternerFehlerInRezeptDatenbankException $exc){
    $_SESSION["message"] = "internal_error";
    header("Location: /index.php");
    exit;
}

unset($_POST["RezeptID"]);

header("Location: /Rezepte.php");
?>

