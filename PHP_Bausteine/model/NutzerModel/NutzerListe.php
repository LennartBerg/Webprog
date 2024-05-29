<?php
namespace PHP_Bausteine\model\NutzerModel;

class NutzerListe {
    public static function getInstance()
    {
        return NutzerPDOSQLite::getInstance();
    }
}