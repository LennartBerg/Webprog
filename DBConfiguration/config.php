<?php
/**
 * Hier die Einbindung der Datenbank üder ddevcontainer `db`, wird nicht über xampp funktionieren
 */
$databaseHost = 'db'; //
$databaseUsername = 'db';
$databasePassword = 'db';
$databaseName = 'db';

$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
echo "Erfolgreich verbunden!";

