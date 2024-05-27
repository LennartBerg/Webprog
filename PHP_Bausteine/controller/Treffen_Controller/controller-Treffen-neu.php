<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/TreffenModel/TreffenListe.php";
require_once $abs_path . "/PHP_Bausteine/model/TreffenModel/Treffen.php";

$_SESSION['form_treffen']["name"] = $_POST["name"];
$_SESSION['form_treffen']["ort"] = $_POST["ort"];
$_SESSION['form_treffen']["datum"] = $_POST["datum"];
$_SESSION['form_treffen']["zeit"] = $_POST["zeit"];
$_SESSION['form_treffen']["beschreibung"] = $_POST["beschreibung"];

$name = isset($_SESSION['form_treffen']['name']) ? $_SESSION['form_treffen']['name'] : "";
$ort = isset($_SESSION['form_treffen']['ort']) ? $_SESSION['form_treffen']['ort'] : "";
$datum = isset($_SESSION['form_treffen']['datum']) ? $_SESSION['form_treffen']['datum'] : "";
$zeit = isset($_SESSION['form_treffen']['zeit']) ? $_SESSION['form_treffen']['zeit'] : "";
$beschreibung = isset($_SESSION['form_treffen']['beschreibung']) ? $_SESSION['form_treffen']['beschreibung'] : "";

/**
 * Prüft ob der Name des Nutzers in der Session abgespeichert ist
 *TODO: form_einloggen anlegen, wenn nicht vorhanden
 *User wird auf die Einloggen Seite weitergeleitet, wenn er nicht eingeloggt ist
 */

if(!isset($_SESSION['form_einloggen']['name'])){
    $_SESSION['message'] = "Sie sind nicht eingeloggt";
    header("Location: ../../../Einloggen.php");
    exit;
} else {
    $ersteller = $_SESSION['form_einloggen']['name'];
}

if(!isset($_POST[$name]) || !isset($_POST[$ort]) || !isset($_POST[$datum]) || !isset($_POST[$zeit]) || !isset($_POST[$beschreibung])){
    $_SESSION["message"] = "name, ort, datum, zeit, beschreibung failure";
    header("Location: "); //TODO: Hier korrekten Link einfügen!!!
    exit;
}
try{
    TreffenListe::getInstance() ->  neuesTreffen($name,$ort,$datum,$ersteller,$zeit,$beschreibung);
} catch (InternerFehlerTreffenDatenbankException $exc){
    $_SESSION["message"] = "internal_error";
    header("Location: ../../..index.php");
}
unset($_POST["name"]);
unset($_POST["ort"]);
unset($_POST["datum"]);
unset($_POST["zeit"]);
unset($_POST["beschreibung"]);





