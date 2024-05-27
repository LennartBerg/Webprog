<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/NutzerListe.php";
require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/Nutzer.php";

$_SESSION['form_registrierung']["email"] = $_POST["email"];
$_SESSION['form_registrierung']["password1"] = $_POST["password"];
$_SESSION['form_registrierung']["password2"] = $_POST["password"];
$_SESSION['form_registrierung']["name"] = $_POST["name"];
$_SESSION['form_registrierung']["birthdate"] = $_POST["birthdate"];
$_SESSION['form_registrierung']["height"] = $_POST["height"];
$_SESSION['form_registrierung']["weight"] = $_POST["weight"];
$_SESSION['form_registrierung']["trainingLocation"] = $_POST["trainingLocation"];
$_SESSION['form_registrierung']["sportstypes"] = $_POST["sportstypes"];


$email = isset($_SESSION['form_registrierung']['email']) ? $_SESSION['form_registrierung']['email'] : "";
$password1 = isset($_SESSION['form_registrierung']['password1']) ? $_SESSION['form_registrierung']['password1'] : "";
$password2 = isset($_SESSION['form_registrierung']['password2']) ? $_SESSION['form_registrierung']['password2'] : "";
$name = isset($_SESSION['form_registrierung']['name']) ? $_SESSION['form_registrierung']['name'] : "";
$birthdate = isset($_SESSION['form_registrierung']['birthdate']) ? $_SESSION['form_registrierung']['birthdate'] : "";
$height = isset($_SESSION['form_registrierung']['height']) ? $_SESSION['form_registrierung']['height'] : "";
$weight = isset($_SESSION['form_registrierung']['weight']) ? $_SESSION['form_registrierung']['weight'] : "";
$trainingLocation = isset($_SESSION['form_registrierung']['trainingLocation']) ? $_SESSION['form_registrierung']['trainingLocation'] : "";
$sportstypes = isset($_SESSION['form_registrierung']['sportstypes']) ? $_SESSION['form_registrierung']['sportstypes'] : "";
$goals = isset($_SESSION['form_registrierung']['goals']) ? $_SESSION['form_registrierung']['goals'] : "";



if($password1 != $password2){
    $_SESSION["message"] = "passwords_not_matching";
    header("Location: /Registrieren.php");
    exit;
} else { $password = $password1;}

if(!isset($_POST[$email]) || !isset($_POST[$password]) || !isset($_POST[$name])){
    $_SESSION["message"] = "email, password, name failure";
    header("Location: /Registrieren.php");
    exit;
}
try{
    NutzerListe::getInstance() ->  neuerNutzer($email,$password,$name,$birthdate,$height,$weight,$trainingLocation,$height,$goals);
} catch (InternerFehlerNutzerDatenbankException $exc){
    $_SESSION["message"] = "internal_error";
    header("Location: /index.php");
}

unset($_POST["email"]);
unset($_POST["password1"]);
unset($_POST["password2"]);
unset($_POST["name"]);
unset($_POST["birthdate"]);
unset($_POST["height"]);
unset($_POST["weight"]);
unset($_POST["trainingLocation"]);
unset($_POST["sportstypes"]);
unset($_POST["goals"]);
header("Location: ../../../index.php"); //Keine Ahnung weswegen der mich nicht weiterleitet zu index.php -> Kann mir das Jemand beantworten ?
?>


