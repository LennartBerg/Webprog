<?php
require_once dirname(__FILE__) . "/NutzerPDOSQLite.php";

class NutzerListe{
    public static function getInstance()
    {
        return NutzerListePDOSQLite::getInstance();
    }
}