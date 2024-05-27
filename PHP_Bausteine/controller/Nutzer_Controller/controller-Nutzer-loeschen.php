<?php
if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/NutzerListe.php";
require_once $abs_path . "/PHP_Bausteine/model/RezeptModel/Nutzer.php";

$NutzerID = isset($_POST[htmlspecialchars("NutzerID")]) ? $_POST[htmlspecialchars("NutzerID")] : "";

if(!isset($_POST[$NutzerID])){
    $_SESSION["message"] = "missing_data";
    header("Location: ../../../Profil.php");
    exit;
}
try{
    $tmp = NutzerListe::getInstance() ->  loescheNutzer($NutzerID);
    exit;
} catch (InternerFehlerInNutzerDatenbankException $exc){
    $_SESSION["message"] = "internal_error";
    header("Location: ../../../index.php");
    exit;
}

unset($_POST["NutzerID"]);

header("Location: ../../../Rezepte.php");
?>