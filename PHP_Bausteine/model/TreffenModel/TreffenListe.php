<?php

require_once dirname(__FILE__) . "/TreffenListePDOSQLite.php";

class TreffenListe
{
    public static function getInstance()
    {
        return TreffenListePDOSQLite::getInstance();
    }
}