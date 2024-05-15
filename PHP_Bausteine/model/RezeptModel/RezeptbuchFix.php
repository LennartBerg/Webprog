<?php
require_once dirname(__FILE__) . '/Rezept.php';
require_once dirname(__FILE__) . '/RezeptbuchDAO.php';

class RezeptbuchFix implements RezeptbuchDAO
{
    private static $instance = null;
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new RezeptbuchFix();
        }
        return self::$instance;
    }
    private $rezepte = array();

    private function __construct()
    {
        $this->rezepte[0] = new Rezept("Kartoffelsalat", "Kartoffelsalat mit Gurken und Zwiebeln", "/Pictures/Tofu.JPG");
        $this->rezepte[1] = new Rezept("Spaghetti Carbonara", "Spaghetti mit EReis mit Tofu (25 Likes)i, Speck und Parmesan","/Pictures/Tofu.JPG");
        $this->rezepte[2] = new Rezept("Käsespätzle", "Spätzle mit Käse überbacken", "/Pictures/Tofu.JPG");
    }

    public function neuesRezept($title_recipe, $text_recipe, $picture_recipe)
    {
        $rezeptToAdd = new Rezept($title_recipe, $text_recipe, $picture_recipe);
        array_push($this -> rezepte ,$rezeptToAdd);
    }

    public function getRezept($RezeptID)
    {
        if($RezeptID < 0 || $RezeptID >= count($this->rezepte)){
            throw new FehlendesRezeptException();
        }
        return $this->rezepte[$RezeptID];
    }

    public function loescheRezept($RezeptID)
    {
        if($RezeptID < 0 || $RezeptID >= count($this->rezepte)){
            throw new FehlendesRezeptException();
        }
        unset($this->rezepte[$RezeptID]);
    }
    /**
     * @return array
     */
    public function getAllRezepte()
    {
        return $this->rezepte;
    }
    public function replace($arr)
    {
        $this -> rezepte = $arr;
    }
}

?>
