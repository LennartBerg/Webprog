<?php
if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/TrainingsplanModel/TrainingsplanListe.php";
require_once $abs_path . "/PHP_Bausteine/model/TrainingsplanModel/Trainingsplan.php";

$title_trainingplan = isset($_POST[htmlspecialchars("title_trainingsplan")]) ? $_POST[htmlspecialchars("title_trainingplan")] : "";
$text_trainingplan = isset($_POST[htmlspecialchars("text_trainingsplan")]) ? $_POST[htmlspecialchars("text_trainingplan")] : "";

if(!isset($_POST[$text_trainingplan]) || !isset($_POST[$title_trainingplan])){
    $_SESSION["message"] = "missing_data";
    header("Location: /Trainingsplane.php");
    exit;
}

try{
    $tmp = TrainingsplanListe::getInstance() ->  neuerTrainingsplan($title_trainingplan,$text_trainingplan);
    var_dump(TrainingsplanListe::getInstance());
    exit;
} catch (InternerFehlerInTrainingsplanDatenbankException $exc){
    $_SESSION["message"] = "internal_error";
    header(index.php);
    exit;
}

unset($_POST["title_trainingsplan"]);
unset($_POST["text_trainingsplan"]);
header("Location: /Trainingsplan.php");