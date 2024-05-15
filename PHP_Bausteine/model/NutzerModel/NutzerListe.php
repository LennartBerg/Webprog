<?php
require_once dirname(__FILE__) . "/NutzerListeFix.php";

class NutzerListe{
    public static function getInstance()
    {
        return NutzerListeFix::getInstance();
    }
}