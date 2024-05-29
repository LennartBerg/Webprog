<?php

namespace PHP_Bausteine\model\NutzerModel;

interface NutzerListeDAO {
    public function neuerNutzer($email, $password, $name, $birthdate, $height, $weight, $trainingLocation, $sportstypes, $goals);
    public function getNutzer($NutzerID);
    public function loescheNutzer($NutzerID);
    public function getAllNutzer();
}