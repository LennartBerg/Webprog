<?php

require_once dirname(__FILE__) . "/TreffenListePDOSQLite.php";

class TreffenListe
{
    private static $instance = null;
    private $treffens = array()
    ;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = TreffenListePDOSQLite::getInstance();
        }
        return self::$instance;
    }
    public function getAllTreffen()
    {
        return $this->treffens;
    }
}