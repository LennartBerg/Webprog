<?php

namespace PHP_Bausteine\model\NutzerModel;

 $NutzerID = 0;
class Nutzer{
    private $email;
    private $password;
    private $name;


    public function __construct($email, $password, $name, $birthdate, $height, $weight, $trainingLocation, $sportstypes, $goals){
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getName(){
        return $this->name;
    }

    public function getBirthdate(){
        return $this->birthdate;
    }

    public function getHeight(){
        return $this->height;
    }

    public function getWeight(){
        return $this->weight;
    }

    public function getTrainingLocation(){
        return $this->trainingLocation;
    }

    public function getSportstypes(){
        return $this->sportstypes;
    }

    public function getGoals(){
        return $this->goals;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setBirthdate($birthdate){
        if($birthdate == null){
            $birthdate = null;}
        $this->birthdate = $birthdate;
    }

    public function setHeight($height){
        if($height == null){
            $height = null;}
        $this->height = $height;
    }

    public function setWeight($weight){
        if($weight == null){
            $weight = null;}
        $this->weight = $weight;
    }

    public function setTrainingLocation($trainingLocation){
        if($trainingLocation == null){
            $trainingLocation = null;}
        $this->trainingLocation = $trainingLocation;
    }

    public function setSportstypes($sportstypes){
        if($sportstypes == null){
            $sportstypes = null;}
        $this->sportstypes = $sportstypes;
    }

    public function setGoals($goals){
        if($goals == null){
            $goals = null;}
        $this->goals = $goals;
    }
}