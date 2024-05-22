<?php
require_once dirname(__FILE__) . "/Treffen.php";
require_once dirname(__FILE__) . "/TreffenListePDOSQLite.php";

class TreffenListePDOSQLite implements TreffenListeDAO{

    public function neuesTreffen($name, $ort, $datum, $ersteller, $zeit, $beschreibung)
    {
        // TODO: Implement neuesTreffen() method.
    }

    public function getTreffen($TreffenID)
    {
        // TODO: Implement getTreffen() method.
    }

    public function loescheTreffen($TreffenID)
    {
        // TODO: Implement loescheTreffen() method.
    }

    public function getAllTreffen()
    {
        // TODO: Implement getAllTreffen() method.
    }
}
