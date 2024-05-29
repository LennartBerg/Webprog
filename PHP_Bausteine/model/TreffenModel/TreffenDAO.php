<?php
namespace PHP_Bausteine\model\TreffenModel;

interface TreffenDAO
{
    public function neuesTreffen($name, $ort, $datum, $ersteller, $zeit, $beschreibung);

    public function getTreffen($TreffenID);

    public function loescheTreffen($TreffenID);

    public function getAllTreffen();
}
