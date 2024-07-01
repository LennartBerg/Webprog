<?php

namespace PHP_Bausteine\model\NutzerModel;

 $NutzerID = 0;
class Nutzer{
    private $email;
    private $password;
    private $name;
    private $beigetreteneTreffen;
    private $erstellteTreffen;
    private $NutzerID;


    public function __construct($email, $name, $NutzerID){
        $this->email = $email;
        $this->name = $name;
        $this->NutzerID = $NutzerID;
        $this->beigetreteneTreffen = array();
        $this->erstellteTreffen = array();
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

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setNutzerID($id)
    {
        $this->NutzerID = $id;
    }

    public function getNutzerID()
    {
        return $this->NutzerID;
    }


}