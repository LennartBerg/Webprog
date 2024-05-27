<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../../path.php";
}

require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/NutzerListe.php";
require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/Nutzer.php";

// Ueberpruefung der Parameter
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    $_SESSION["message"] = "invalid_nutzer_id";
    header("Location: ../../..index.php");
    exit;
}

try {
    // Aufbereitung der Daten fuer die Kontaktierung des Models
    $id = intval($_GET["id"]);

    // Kontaktierung des Models (Geschaeftslogik)
    $NutzerListe = NutzerListe::getInstance();
    $Nutzer = $NutzerListe->getNutzer($id);
} catch (FehlenderNutzerException $exc) {
    // Behandlung von potentiellen Fehlern der Geschaeftslogik
    $_SESSION["message"] = "invalid_nutzer_id";
    header("Location: ../../..index.php");
    exit;
} catch (InternerFehlerException $exc) {
    // Behandlung von potentiellen Fehlern der Geschaeftslogik
    $_SESSION["message"] = "internal_error";
    header("Location: ../../..index.php");
    exit;
}

// Aufbereitung der Daten fuer die Ausgabe (View)
// Hinweis: in diesem Fall nichts zu tun

// zum Schluss: die Ausgabe des HTML-Codes kann erfolgen: eintrag-anzeigen.php
?>