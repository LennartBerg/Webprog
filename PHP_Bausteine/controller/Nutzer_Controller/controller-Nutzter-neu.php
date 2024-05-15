<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/NutzerListe.php";
require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/Nutzer.php";


$email = isset($_POST[htmlspecialchars("email")]) ? $_POST[htmlspecialchars("email")] : "";
$password1 = isset($_POST[htmlspecialchars("password1")]) ? $_POST[htmlspecialchars("password1")] : "";
$password2 = isset($_POST[htmlspecialchars("password2")]) ? $_POST[htmlspecialchars("password2")] : "";
$name = isset($_POST[htmlspecialchars("name")]) ? $_POST[htmlspecialchars("name")] : "";
$birthdate = isset($_POST[htmlspecialchars("birthdate")]) ? $_POST[htmlspecialchars("birthdate")] : "";
$height = isset($_POST[htmlspecialchars("height")]) ? $_POST[htmlspecialchars("height")] : "";
$weight = isset($_POST[htmlspecialchars("weight")]) ? $_POST[htmlspecialchars("weight")] : "";
$trainingLocation = isset($_POST[htmlspecialchars("trainingLocation")]) ? $_POST[htmlspecialchars("trainingLocation")] : "";
$sportstypes = isset($_POST[htmlspecialchars("sportstypes")]) ? $_POST[htmlspecialchars("sportstypes")] : "";
$goals = isset($_POST[htmlspecialchars("goals")]) ? $_POST[htmlspecialchars("goals")] : "";

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
    //var_dump(NutzerListe::getInstance()); Ist zum debuggen, loesche ich später!!!!!11!!!!1!!!
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
header("Location: /index.php"); //Keine Ahnung weswegen der mich nicht weiterleitet zu index.php -> Kann mir das Jemand beantworten ?
?>


