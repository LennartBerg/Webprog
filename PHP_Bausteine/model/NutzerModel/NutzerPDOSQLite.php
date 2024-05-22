<?php

if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once "Nutzer.php";
require_once "NutzerListeDAO.php";

class NutzerListePDOSQLite implements NutzerListeDAO
{
    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new NutzerListePDOSQLite();
        }

        return self::$instance;
    }

    public function neuerNutzer($email, $password, $name, $birthdate, $height, $weight, $trainingsLocation, $sportstypes, $goals)
    {
        try {
            $db = $this->getConnection();
            $sql = "INSERT INTO NutzerListe (email, password, name, birthdate, height, weight, trainingsLocation, sportstypes, goals) VALUES (:email, :password, :name, :birthdate, :height, :weight, :trainingLocation, :sportstypes, :goals);";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute([":email" => $email, ":password" => $password,":name" => $name, ":birthdate" => $birthdate, ":height" => $height, ":weight" => $weight, ":trainingLocation" => $trainingsLocation, ":sportstypes" => $sportstypes, ":goals" => $goals])) {
                throw new InternerFehlerException();
            }
            return intval($db->lastInsertId());
        } catch (PDOException $exc) {
            throw new InternerFehlerException();
        }
    }

    public function getNutzer($id)
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM NutzerListe WHERE id=:id LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute([":id" => $id])) {
                throw new InternerFehlerException();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                throw new FehlenderNutzerException();
            }
            $entry = $result[0];
            return new Nutzer($entry["id"], $entry["email"], $entry["name"], $entry["birthdate"], $entry["height"], $entry["weight"], $entry["trainingsLocation"], $entry["sportstypes"], $entry["goals"]);
        } catch (PDOException $exc) {
            throw new InternerFehlerException();
        }
    }

    public function loescheNutzer($id)
    {
        try {
            $db = $this->getConnection();
            $db->beginTransaction();
            $sql = "SELECT * FROM NutzerListe WHERE id=:id LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            if (!$command->execute([":id" => $id])) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                $db->rollBack();
                throw new FehlenderNutzerException();
            }
            $sql = "DELETE FROM NutzerListe WHERE id=:id";
            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            if (!$command->execute([":id" => $id])) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            $db->commit();
        } catch (PDOException $exc) {
            $db->rollBack();
            throw new InternerFehlerException();
        }
    }

    public function getAllNutzer()
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM NutzerListe";
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
                $entry = new Nutzer($row["id"], $row["email"], $row["name"], $row["birthdate"], $row["height"], $row["weight"], $row["trainingsLocation"], $row["sportstypes"], $row["goals"]);
                $entries[] = $entry;
            }
            return $entries;
        } catch (PDOException $exc) {
            throw new InternerFehlerException();
        }
    }

    private function getConnection()
    {
        global $abs_path;
        if (!file_exists($abs_path . "/db/Gymder.db")) {
            $this->anlegen();
        }

        try {
            $user = 'root';
            $pw = null;
            $dsn = 'sqlite:' . $abs_path . '/db/Gymder.db';
            return new PDO($dsn, $user, $pw);
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
            $dsn = 'sqlite:' . $abs_path . '/db/Gymder.db';
            $db = new PDO($dsn, $user, $pw);

            $db->exec("
                CREATE TABLE NutzerListe (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
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
            unset($db);
        } catch (PDOException $e) {
            // Fehlerbehandlung
            throw new InternerFehlerException();
        }
    }
}
