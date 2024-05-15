<?php
require_once 'RezeptbuchFix.php';
class Rezeptbuch{
    public static function getInstance()
    {
        return RezeptbuchFix::getInstance();
    }
}
