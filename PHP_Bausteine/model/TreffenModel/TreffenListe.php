<?php
namespace PHP_Bausteine\model\TreffenModel;

class TreffenListe
{
    public static function getInstance()
    {
        return TreffenListePDOSQLite::getInstance();
    }
}