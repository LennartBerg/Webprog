<?php
if(!isset($abs_path)){
    require_once "../../../path.php";
}
require_once $abs_path . "controller/model/TrainingsplanModel/Trainingsplan.php";
require_once $abs_path . "controller/model/TrainingsplanModel/TrainingsplanListe.php";

if(!isset($_GET["TrainingsplanID"]) || !is_numeric($_GET["TrainingsplanID"])){
    $_SESSION["message"] = "invalid_trainingsplan_id";
    header("Location: Trainingsplane.php");
    exit;
}

try{

    $TrainingsplanID = intval($_GET["TrainingsplanID"]);
    $TrainingsplanListe = TrainingsplanListe::getInstance();
    $Trainingsplan = $TrainingsplanListe->getTrainingsplan($TrainingsplanID);

}catch(FehlenderTrainingsplanException $exc) {

    $_SESSION["message"] = "invalid_trainingsplan_id";
    header("Location: Trainingsplane.php");
    exit;
}catch(InternerFehlerException $exc) {

    $_SESSION["message"] = "internal_error";
    header("Location: Rezepte.php");
    exit;
}

/**
 * TODO: AUCH IST DIESES DOKUMENT EIN WRAPPER FÜR DIE DATENBANK
 */