<?php

require_once dirname(__FILE__) . "/TreffenListePDOSQLite.php";

class TreffenListe
{
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = TreffenListePDOSQLite::getInstance();
        }
        return self::$instance;
    }
}