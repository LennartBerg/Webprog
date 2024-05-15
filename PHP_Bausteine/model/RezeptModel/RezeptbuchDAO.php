<?php
class InternerFehlerInRezeptDatenbankException extends Exception {}
class FehlendesRezeptException extends Exception {}

interface RezeptbuchDAO {
    public function neuesRezept($title_recipe, $text_recipe, $picture_recipe);
    public function getRezept($RezeptID);
    public function loescheRezept($RezeptID);
    public function getAllRezepte();
}
