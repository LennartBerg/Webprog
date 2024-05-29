<?php
namespace PHP_Bausteine\controller;

class BaseController {

    public function redirect(String $location) {
        header("Location: " . $location);
        exit;
    }

}