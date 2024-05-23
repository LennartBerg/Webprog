<?php
require_once dirname(__FILE__) . "/Gymder.db";
class Connection{

    private $db;

    function __construct()
    {
        global $abs_path;
        if (!file_exists($abs_path . "/Gymder.db")) {
            $this->anlegen();
        }


        try {
            $user = 'root';
            $pw = null;
            $dsn = 'sqlite:' . $abs_path . '/Gymder.db';
            $db = PDO($dsn, $user, $pw);
            $db -> checkTables();
            return $this -> db;
        } catch (PDOException $e) {
            throw new InternerFehlerException();
        }
    }

    function __destruct()
    {

    }

    private function anlegen()
    {
        global $abs_path;
        try {
            $user = 'root';
            $pw = null;
            $dsn = 'sqlite:' . $abs_path . '/Gymder.db';
            $db = new PDO($dsn, $user, $pw);

            unset($db);
        } catch (PDOException $e) {
            throw new InternerFehlerException();
        }
    }

    function checkTables()
    {
        try {

            $tableName = 'NutzerListe';

            $query = "SELECT name FROM sqlite_master WHERE type='table' AND name=:tableName";
            $stmt = $this->prepare($query);
            $stmt->bindParam(':tableName', $tableName, PDO::PARAM_STR);
            $stmt->execute();

            // Überprüfen, ob die Tabelle existiert
            if (!$stmt->fetch()) {
                $this -> buildNutzerTable();
            }

            $tableName2 = 'TreffenListe';
            $query = "SELECT name FROM sqlite_master WHERE type='table' AND name=:tableName2";
            $stmt = $this->prepare($query);
            $stmt->bindParam(':tableName2', $tableName2, PDO::PARAM_STR);
            $stmt->execute();

            if (!$stmt->fetch()) {
                $this -> buildTreffenTable();
            }
        } catch (PDOException $e) {
            echo "Fehler beim Verbinden mit der Datenbank: " . $e->getMessage();
        }
    }

    function buildNutzerTable()
    {
        $this ->exec("
                CREATE TABLE NutzerListe (
                    NUtzerID INTEGER PRIMARY KEY AUTOINCREMENT,
                    email TEXT,
                    password TEXT,
                    name TEXT,
                    birthdate TEXT,
                    height INTEGER,
                    weight INTEGER,
                    trainingsLocation TEXT,
                    sportstypes TEXT,
                    goals TEXT
                );
            ");
        $this ->exec("
                INSERT INTO NutzerListe (email, password, name, birthdate, height, weight, trainingsLocation, sportstypes, goals) VALUES
                ('test1@test.de', 'password1', 'Test User 1', '2000-01-01', 180, 80, 'Berlin', 'Krafttraining', 'Abnehmen');
            ");
    }

    function buildTreffenTable()
    {
        $this->exec("
                CREATE TABLE TreffenListe (
                    TreffenID INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT,
                    ort TEXT,
                    datum TEXT,
                    zeit TEXT,
                    beschreibung TEXT,
                    teilnehmer TEXT,
                    ersteller NutzerID,
                );
            ");

        $this->exec("
                INSERT INTO TreffenListe (name, ort, datum, zeit, beschreibung, teilnehmer, ersteller) VALUES
                ('Test Treffen 1', 'Berlin', '2020-01-01', '12:00', 'Test Treffen 1 Beschreibung', '1', '1');");
    }
}
