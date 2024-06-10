<?php
namespace PHP_Bausteine\controller;

use PHP_Bausteine\model\NutzerModel\NutzerListe;

class NutzerController extends BaseController {

    public function nutzerNeu() {
        $_SESSION['form_registrierung']["email"] = $_POST["email"];
        $_SESSION['form_registrierung']["password1"] = $_POST["password1"];
        $_SESSION['form_registrierung']["password2"] = $_POST["password2"];
        $_SESSION['form_registrierung']["name"] = $_POST["name"];
        $_SESSION['form_registrierung']["birthdate"] = $_POST["birthdate"];
        $_SESSION['form_registrierung']["height"] = $_POST["height"];
        $_SESSION['form_registrierung']["weight"] = $_POST["weight"];
        $_SESSION['form_registrierung']["trainingLocation"] = $_POST["trainingLocation"];

        $email = $_SESSION['form_registrierung']['email'] ?? "";
        $password1 = isset($_SESSION['form_registrierung']['password1']) ? $_SESSION['form_registrierung']['password1'] : "";
        $password2 = isset($_SESSION['form_registrierung']['password2']) ? $_SESSION['form_registrierung']['password2'] : "";
        $name = isset($_SESSION['form_registrierung']['name']) ? $_SESSION['form_registrierung']['name'] : "";
        $birthdate = isset($_SESSION['form_registrierung']['birthdate']) ? $_SESSION['form_registrierung']['birthdate'] : "";
        $height = isset($_SESSION['form_registrierung']['height']) ? $_SESSION['form_registrierung']['height'] : "";
        $weight = isset($_SESSION['form_registrierung']['weight']) ? $_SESSION['form_registrierung']['weight'] : "";
        $trainingLocation = isset($_SESSION['form_registrierung']['trainingLocation']) ? $_SESSION['form_registrierung']['trainingLocation'] : "";
        $goals = isset($_SESSION['form_registrierung']['goals']) ? $_SESSION['form_registrierung']['goals'] : "";

        if($password1 != $password2){
            $_SESSION["message"] = "passwords_not_matching";
            $this->redirect("Registrieren.php");
        } else {
            $password = $password1;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        }
        if(!isset($_POST[$email]) || !isset($_POST[$password1]) || !isset($_POST[$name])){
            $_SESSION["message"] = "email, password, name failure";
            $this->redirect("Registrieren.php");
        }
        try{
            NutzerListe::getInstance()->neuerNutzer($email,$hashed_password,$name,$birthdate,$height,$weight,$trainingLocation,$height,$goals);
        } catch (InternerFehlerNutzerDatenbankException $exc){
            $this->redirect("index.php");
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
        $this->redirect("index.php");
    }
    
    public function deleteNutzer()
    {
        $NutzerID = isset($_POST[htmlspecialchars("NutzerID")]) ? $_POST[htmlspecialchars("NutzerID")] : "";
        if(!isset($_POST[$NutzerID])){
            $_SESSION["message"] = "missing_data";
            $this->redirect("Profil.php");
        }
        try{
            $tmp = NutzerListe::getInstance() ->  loescheNutzer($NutzerID);
            exit;
        } catch (InternerFehlerInNutzerDatenbankException $exc){
            $_SESSION["message"] = "internal_error";
            $this->redirect("index.php");
        }

        unset($_POST["NutzerID"]);

        $this->redirect("index.php");
    }

    public function showNutzer()
    {
        if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
            $_SESSION["message"] = "invalid_nutzer_id";
            $this->redirect("index.php");
        }

        try {
            // Aufbereitung der Daten fuer die Kontaktierung des Models
            $id = intval($_GET["id"]);

            // Kontaktierung des Models (Geschaeftslogik)
            $NutzerListe = NutzerListe::getInstance();
            $Nutzer = $NutzerListe->getNutzer($id);
            return $Nutzer;
        } catch (FehlenderNutzerException $exc) {
            // Behandlung von potentiellen Fehlern der Geschaeftslogik
            $_SESSION["message"] = "invalid_nutzer_id";
            $this->redirect("index.php");
        } catch (InternerFehlerException $exc) {
            // Behandlung von potentiellen Fehlern der Geschaeftslogik
            $_SESSION["message"] = "internal_error";
            $this->redirect("index.php");
        }
    }

    public function getAllNutzer()
    {
        try {

            $NutzerListe = NutzerListe::getInstance();
            $NutzerArray = $NutzerListe->getAllNutzer();
            return $NutzerArray;
        } catch (InternerFehlerException $exc) {

            $_SESSION["message"] = "internal_error";
            $this->redirect("index.php");
        }
    }

    public function login()
    {
        $password = $_POST["Login"]["password"];
        $email = $_POST["Login"]["email"];
        $allNutzer = NutzerListe::getInstance() -> getAllNutzer();
        foreach ($allNutzer as $nutzer){
            if($nutzer -> getEmail() == $email){
                $hashedpwd = $nutzer -> getPassword();
                if(password_verify($hashedpwd, $password)){
                    if($name = $nutzer -> getName()){
                        $_SESSION["name"] = $name;
                        $_SESSION["email"] = $nutzer -> getEmail();
                        $_SESSION["id"] = $nutzer -> getID();
                        $_SESSION["message"] = "login_successful";
                        $_SESSION["isLoggedIn"] = true;
                        $this->redirect("Profil.php");
                    }
                }
            }
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        $this->redirect("index.php");
    }

}