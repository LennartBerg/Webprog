<?php
require_once dirname(__FILE__) . "/../NutzerModel/Nutzer.php";

$RezeptID = 0;
class Rezept{
    private $title_recipe;
    private $text_recipe;
    private $likes;
    private $picture_recipe;
    private $RezeptID;
    private $Nutzer;

    public function __construct($title_recipe, $text_recipe, $picture_recipe){
        global $RezeptID;
        $this->title_recipe = $title_recipe;
        $this->text_recipe = $text_recipe;
        $this->likes = 0;
        $this->picture_recipe = $picture_recipe;
        $this->RezeptID = $RezeptID;
        $RezeptID++;
    }

    private function setPicture($picture_recipe){
        if($picture_recipe == null){
            $this -> picture_recipe = null;
            return;
        }
        $this->picture_recipe = $picture_recipe;
    }

    /**
     * @return mixed
     */
    public function getTitleRecipe()
    {
        return $this->title_recipe;
    }

    /**
     * @return mixed
     */
    public function getTextRecipe()
    {
        return $this->text_recipe;
    }

    /**
     * @return int
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @return mixed
     */
    public function getPictureRecipe()
    {
        return $this->picture_recipe;
    }

    /**
     * @return int
     */
    public function getRezeptID()
    {
        return $this->RezeptID;
    }

    /**
     * @return mixed
     */
    public function getNutzer()
    {
        return $this->Nutzer;
    }

}
