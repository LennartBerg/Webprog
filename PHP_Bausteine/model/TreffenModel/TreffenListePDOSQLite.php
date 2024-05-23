<?php
require_once dirname(__FILE__) . "/Treffen.php";
require_once dirname(__FILE__) . "/TreffenListePDOSQLite.php";

class TreffenListePDOSQLite implements TreffenListeDAO{

    public function neuesTreffen($name, $ort, $datum, $ersteller, $zeit, $beschreibung)
    {
        try {
            $db = new Connection();
            $sql = "INSERT INTO TreffenListe (name, ort, datum, ersteller, zeit, beschreibung) VALUES (:name, :ort, :ersteller, :zeit, :beschreibung);";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute([":name" => $name, ":ort" => $ort,":datum" => $datum, ":ersteller" => $ersteller, ":zeit" => $zeit, ":beschreibung" => $beschreibung])) {
                throw new InternerFehlerException();
            }
            return intval($db->lastInsertId());
        } catch (PDOException $exc) {
            throw new InternerFehlerException();
        }
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
