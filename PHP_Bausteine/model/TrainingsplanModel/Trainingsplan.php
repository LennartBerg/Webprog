<?php

require_once dirname(__FILE__) . "/../NutzerModel/Nutzer.php";

$TrainingsplanID = 0;

class Trainingsplan{
    private $title_trainingsplan;
    private $text_trainingsplan;
    private $likes;
    private $TrainingsplanID;

    public function __construct($title_trainingsplan, $text_trainingsplan){
        global $TrainingsplanID;
        $this->title_trainingsplan = $title_trainingsplan;
        $this->text_trainingsplan = $text_trainingsplan;
        $this->likes = 0;
        $this->TrainingsplanID = $TrainingsplanID;
        $TrainingsplanID++;
    }

}