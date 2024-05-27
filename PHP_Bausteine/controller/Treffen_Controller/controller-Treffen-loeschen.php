<?php
if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/TreffenModel/TreffenListe.php";
require_once $abs_path . "/PHP_Bausteine/model/TreffenModel/Treffen.php";

$TreffenID = isset($_POST[htmlspecialchars("TreffenID")]) ? $_POST[htmlspecialchars("TreffenID")] : "";

if(!isset($_POST[$TreffenID])){
    $_SESSION["message"] = "missing_data";
    header("Location: ../../../Treffen.php");
    exit;
}
try{
    $tmp = TreffenListe::getInstance() ->  loescheTreffen($TreffenID);
    exit;
} catch (InternerFehlerInTreffenDatenbankException $exc){
    $_SESSION["message"] = "internal_error";
    header("Location: ../../../index.php");
    exit;
}

unset($_POST["TreffenID"]);

header("Location: ../../../Rezepte.php");
?>