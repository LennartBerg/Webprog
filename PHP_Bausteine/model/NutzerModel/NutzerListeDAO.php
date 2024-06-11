<?php

namespace PHP_Bausteine\model\NutzerModel;

interface NutzerListeDAO {
    public function neuerNutzer($email, $password, $name);
    public function getNutzer($NutzerID);
    public function loescheNutzer($NutzerID);
    public function getAllNutzer();
}