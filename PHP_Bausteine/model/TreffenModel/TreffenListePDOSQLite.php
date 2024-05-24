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
        try {
            $db = new Connection();
            $sql = "SELECT * FROM TreffenListe WHERE id=:id LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute([":id" => $TreffenID])) {
                throw new InternerFehlerException();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                throw new FehlendesTreffenException();
            }
            $entry = $result[0];
            return new Treffen($entry["TreffenID"], $entry["ort"], $entry["datum"], $entry["ersteller"], $entry["zeit"], $entry["beschreibung"]);
        } catch (PDOException $exc) {
            throw new InternerFehlerException();
        }
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
