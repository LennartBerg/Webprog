<?php
require_once 'Nutzer.php';
require_once dirname(__FILE__) . "/NutzerListeDAO.php";
class NutzerListeFix implements NutzerListeDAO
{
    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = NutzerListePDOSQLite::getInstance();
        }
        return self::$instance;
    }

    private $nutzer = array();

    private function __construct()
    {

    }

    public function neuerNutzer($email, $password, $name, $birthdate, $height, $weight, $trainingLocation, $sportstypes, $goals)
    {
        $nutzerToAdd = new Nutzer($email, $password, $name, $birthdate, $height, $weight, $trainingLocation, $sportstypes, $goals);
        array_push($this -> nutzer,$nutzerToAdd);
    }
    public function getNutzer($NutzerID)
    {
        if($NutzerID < 0 || $NutzerID >= count($this->nutzer)){
            throw new FehlenderNutzerException();
        }
        return $this->nutzer[$NutzerID];
    }
    public function loescheNutzer($NutzerID)
    {
        if($NutzerID < 0 || $NutzerID >= count($this->nutzer)){
            throw new FehlenderNutzerException();
        }
        unset($this->nutzer[$NutzerID]);
    }
    public function getAllNutzer()
    {
        return $this->nutzer;
    }
}