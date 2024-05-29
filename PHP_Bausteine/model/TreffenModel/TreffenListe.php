<?php
namespace PHP_Bausteine\model\TreffenModel;

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