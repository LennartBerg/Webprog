<?php
namespace PHP_Bausteine;

use PDO;
use PDOException;

class Connection {

    private PDO $db;

    public function getDB(): PDO {
        return $this->db;
    }

    function __construct()
    {
            $user = 'root';
            $pw = null;
            $dsn = 'sqlite:./db/Gymder.db';
            $this->db = new PDO($dsn, $user, $pw);
            $this->checkTables();
    }

    function __destruct()
    {

    }

    private static ?Connection $instance = null;

    public static function getInstance(): Connection {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }
        return self::$instance;
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
        //try {

            $tableName = 'NutzerListe';

            $query = "SELECT name FROM sqlite_master WHERE type='table' AND name=:tableName";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':tableName', $tableName, PDO::PARAM_STR);
            $stmt->execute();

            // Überprüfen, ob die Tabelle existiert
            if (!$stmt->fetch()) {
                $this->buildNutzerTable();
            }

            $tableName2 = 'TreffenListe';
            $query = "SELECT name FROM sqlite_master WHERE type='table' AND name=:tableName2";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':tableName2', $tableName2, PDO::PARAM_STR);
            $stmt->execute();

            if (!$stmt->fetch()) {
                $this->buildTreffenTable();
            }
        //} catch (PDOException $e) {
        //    echo "Fehler beim Verbinden mit der Datenbank: " . $e->getMessage();
        //}
    }

    function buildNutzerTable()
    {
        $this->db->exec("
                CREATE TABLE NutzerListe (
                    NutzerID INTEGER PRIMARY KEY AUTOINCREMENT,
                    email TEXT UNIQUE NOT NULL, /* UNIQUE NOT NULL macht den quatsch zum Primär-Key*/
                    password TEXT NOT NULL,
                    name TEXT UNiQUE NOT NULL
                );
            ");
        $this->db->exec("
                INSERT INTO NutzerListe (email, password, name, birthdate, height, weight, trainingsLocation, sportstypes, goals) VALUES
                ('test1@test.de', 'password1', 'Test User 1', '2000-01-01', 180, 80, 'Berlin', 'Krafttraining', 'Abnehmen');
            ");
    }

    function buildTreffenTable()
    {
        $this->db->exec("
                CREATE TABLE TreffenListe (
                    TreffenID INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT UNIQUE NOT NULL,
                    ort TEXT,
                    datum DATE,
                    zeit TIME,
                    beschreibung TEXT,
                    ersteller NutzerID
                );
            ");

        $this->db->exec("
                INSERT INTO TreffenListe (name, ort, datum, zeit, beschreibung, ersteller) VALUES
                ('Test Treffen 1', 'Berlin', '2020-01-01', '12:00', 'Test Treffen 1 Beschreibung', '1', '1');");
    }

    function checkExpiryDateofTreffen()
    {
        $this->db->exec("
            DELETE FROM TreffenListe WHERE datum < date('now') AND zeit < time('now');
        ");
    }

    function buildTeilnehmerBeiTreffenTable()
    {
        $this->db->exec("
                CREATE TABLE IF NOT EXISTS TeilnehmerBeiTreffen (
                    TreffenID INTEGER,
                    NutzerID INTEGER,
                    BeigetretenID INTEGER PRIMARY KEY AUTOINCREMENT,
                    UNIQUE (TreffenID, NutzerID),
                    PRIMARY KEY (TreffenID, NutzerID),
                    FOREIGN KEY (TreffenID) REFERENCES TreffenListe(TreffenID),
                    FOREIGN KEY (NutzerID) REFERENCES NutzerListe(NutzerID)
                );
            ");
    }
}
