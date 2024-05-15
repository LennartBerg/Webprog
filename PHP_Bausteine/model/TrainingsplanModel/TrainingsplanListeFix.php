<?php
require_once 'TrainingsplanListeDAO.php';
require_once 'Trainingsplan.php';


class TrainingsplanListeFix implements TrainingsplanListeDAO{
private static $instance = null;


    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new TrainingsplanListeFix();
        }
        return self::$instance;
    }
    private $trainingsplaene = array();

    private function __construct(){
        $this->trainingsplaene[0] = new Trainingsplan("Trainingsplan 1", "Text 1");
        $this->trainingsplaene[1] = new Trainingsplan("Trainingsplan 2", "Text 2");
        $this->trainingsplaene[2] = new Trainingsplan("Trainingsplan 3", "Text 3");
    }
    public function neuerTrainingsplan($title_trainingsplan, $text_trainingsplan)
    {
        $trainingsplanToAdd = new Trainingsplan($title_trainingsplan, $text_trainingsplan);
        array_push($this -> trainingsplaene ,$trainingsplanToAdd);
    }

    public function getTrainingsplan($TrainingsplanID)
    {
        if($TrainingsplanID < 0 || $TrainingsplanID >= count($this->trainingsplaene)){
            throw new FehlenderTrainingsplanException();
        }
        return $this-> trainingsplaene[$TrainingsplanID];
    }

    public function loescheTrainingsplan($TrainingsplanID)
    {
        if($TrainingsplanID < 0 || $TrainingsplanID >= count($this->trainingsplaene)){
            throw new FehlenderTrainingsplanException();
        }
        unset($this->trainingsplaene[$TrainingsplanID]);
    }
    public function getTrainingsplaene()
    {
        return $this->trainingsplaene;
    }

    public function replace($arr)
    {
        $this -> trainingsplaene = $arr;
    }

}
