<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/NutzerListe.php";
require_once $abs_path . "/PHP_Bausteine/model/NutzerModel/Nutzer.php";

function login($password, $email)
{
    $allNutzer = NutzerListe::getInstance() -> getAllNutzer();
    foreach ($allNutzer as $nutzer){
        if($nutzer -> getEmail() == $email){
            if($nutzer -> getPassword() == $password){
                $name = $nutzer -> getName();

                return TRUE;
            }
        }
    }
}

exit;