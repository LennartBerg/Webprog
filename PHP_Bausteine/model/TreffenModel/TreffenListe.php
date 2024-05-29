<?php
namespace PHP_Bausteine\model\TreffenModel;

class TreffenListe
{
    private static ?TreffenListePDOSQLite $instance = null;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = TreffenListePDOSQLite::getInstance();
        }
        return self::$instance;
    }
}