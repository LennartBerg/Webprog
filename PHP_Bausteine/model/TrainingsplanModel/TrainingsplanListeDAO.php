<?php
class InternerFehlerException extends Exception {}
class FehlenderTrainingsplanException extends Exception {}

interface TrainingsplanListeDAO {
    public function neuerTrainingsplan($title_trainingsplan, $text_trainingsplan);
    public function getTrainingsplan($TrainingsplanID);
    public function loescheTrainingsplan($TrainingsplanID);
    public function getTrainingsplaene();
}
