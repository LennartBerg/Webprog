<?php
require_once dirname(__FILE__) . "/Gymder.db";
class Connection{
    private $db;
    function getConnection()
    {
        global $abs_path;
        if (!file_exists($abs_path . "/Gymder.db")) {
            $this->anlegen();
        }

        try {
            $user = 'root';
            $pw = null;
            $dsn = 'sqlite:' . $abs_path . '/Gymder.db';
            return $this ->db = PDO($dsn, $user, $pw);
        } catch (PDOException $e) {
            throw new InternerFehlerException();
        }
    }

    private function anlegen()
    {
        global $abs_path;
        try {
            $user = 'root';
            $pw = null;
            $dsn = 'sqlite:' . $abs_path . '/Gymder.db';
            $db = new PDO($dsn, $user, $pw);

            $db->exec("
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
            $db->exec("
                INSERT INTO NutzerListe (email, password, name, birthdate, height, weight, trainingsLocation, sportstypes, goals) VALUES
                ('test1@test.de', 'password1', 'Test User 1', '2000-01-01', 180, 80, 'Berlin', 'Krafttraining', 'Abnehmen');
            ");
            $db->exec("
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

            $db->exec("
                INSERT INTO TreffenListe (name, ort, datum, zeit, beschreibung, teilnehmer, ersteller) VALUES
                ('Test Treffen 1', 'Berlin', '2020-01-01', '12:00', 'Test Treffen 1 Beschreibung', '1', '1');");
            unset($db);
        } catch (PDOException $e) {
            // Fehlerbehandlung
            throw new InternerFehlerException();
        }
    }


}
