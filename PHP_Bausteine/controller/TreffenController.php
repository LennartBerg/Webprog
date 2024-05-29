<?php
namespace PHP_Bausteine\controller;

use PHP_Bausteine\model\TreffenModel\TreffenListe;

class TreffenController{

    function deleteTrefen()
    {
        $TreffenID = isset($_POST[htmlspecialchars("TreffenID")]) ? $_POST[htmlspecialchars("TreffenID")] : "";

        if(!isset($_POST[$TreffenID])){
            $_SESSION["message"] = "missing_data";
            header("Location: ./index.php");
            exit;
        }
        try{
            TreffenListe::getInstance() ->  loescheTreffen($TreffenID);
            exit;
        } catch (InternerFehlerInTreffenDatenbankException $exc){
            $_SESSION["message"] = "internal_error";
            header("Location: ./index.php");
            exit;
        }

        unset($_POST["TreffenID"]);

        header("Location: ./index.php");
    }

    function getTreffen(){
        if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
            $_SESSION["message"] = "invalid_Treffen_id";
            header("Location: ./index.php");
            exit;
        }

        try {

            $id = intval($_GET["id"]);

            $treffenListe = TreffenListe::getInstance();
            $treffen = $treffenListe->getTreffen($id);
            return $treffen;
        } catch (FehlenderNutzerException $exc) {

            $_SESSION["message"] = "invalid_nutzer_id";
            header("Location: ./index.php");
            exit;
        } catch (InternerFehlerException $exc) {

            $_SESSION["message"] = "internal_error";
            header("Location: ./index.php");
            exit;
        }
    }
    function getAllTreffen()
    {
        try {
            $TreffenListe = TreffenListe::getInstance();
            $TreffenArray = $TreffenListe->getAllTreffen();
            return $TreffenArray;
        } catch (InternerFehlerException $exc) {
            // Behandlung von potentiellen Fehlern der Geschaeftslogik
            $_SESSION["message"] = "internal_error";
            header("Location: ./index.php");
            exit;
        }
    }
    function createTreffen(){
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
            header("Location: ./Einloggen.php");
            exit;
        } else {
            $ersteller = $_SESSION['form_einloggen']['name'];
        }

        if(!isset($_POST[$name]) || !isset($_POST[$ort]) || !isset($_POST[$datum]) || !isset($_POST[$zeit]) || !isset($_POST[$beschreibung])){
            $_SESSION["message"] = "name, ort, datum, zeit, beschreibung failure";
            header("Location: ./index.php"); //TODO: Hier korrekten Link einfügen!!!
            exit;
        }
        try{
            TreffenListe::getInstance() ->  neuesTreffen($name,$ort,$datum,$ersteller,$zeit,$beschreibung);
        } catch (InternerFehlerTreffenDatenbankException $exc){
            $_SESSION["message"] = "internal_error";
            header("Location: ./index.php");
        }
        unset($_POST["name"]);
        unset($_POST["ort"]);
        unset($_POST["datum"]);
        unset($_POST["zeit"]);
        unset($_POST["beschreibung"]);
    }
}