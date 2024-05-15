<?php
require_once dirname(__FILE__) . "/TrainingsplanListeFix.php";
class TrainingsplanListe{
    public static function getInstance()
    {
        return TrainingsplanListeFix::getInstance();
    }
}
