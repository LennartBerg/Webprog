<?php
namespace PHP_Bausteine\model\TreffenModel;

class TreffenListePDOSQLite implements TreffenListeDAO{

    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new TreffenListePDOSQLite();
        }

        return self::$instance;
    }

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
        try {
            $db = new Connection();
            $db->beginTransaction();
            $sql = "SELECT * FROM TreffenListe WHERE TreffenID=:TreffenID LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            if (!$command->execute([":TreffenID" => $TreffenID])) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                $db->rollBack();
                throw new FehlendesTreffenException();
            }
            $sql = "DELETE FROM TreffenListe WHERE TreffenID=:TreffenID";
            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            if (!$command->execute([":id" => $TreffenID])) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            $db->commit();
        } catch (PDOException $exc) {
            $db->rollBack();
            throw new InternerFehlerException();
        }
    }


    /**
     * @return array of all Treffen to show up in controller-Treffen-anzeigen.php to use in a foreach loop in index.php
     * comment function missing in Properties of Treffen.php so users can interact with each other
     */

    public function getAllTreffen()
    {
        try {
            $db = new Connection();
            $sql = "SELECT * FROM TreffenListe";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute()) {
                throw new InternerFehlerException();
            }
            $result = $command->fetchAll();

            $entries = [];
            foreach ($result as $row) {
                $entry = new Treffen($row["TreffenID"], $row["ort"], $row["datum"], $row["ersteller"], $row["zeit"], $row["beschreibung"]);
                $entries[] = $entry;
            }
            return $entries;
        } catch (PDOException $exc) {
            throw new InternerFehlerException();
        }
    }
}
