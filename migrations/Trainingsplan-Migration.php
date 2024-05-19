<?php
include "../DBConfiguration/config.php";

$sqlTrainingsplane = "CREATE TABLE Trainingsplane (
    TrainingsplanID INT(6) UNSIGNED PRIMARY KEY,
    title_trainingsplan VARCHAR(30) NOT NULL,
    text_trainingsplan VARCHAR(1000) NOT NULL,
    author_trainingsplan VARCHAR(30) NOT NULL,
    likes INT(6) UNSIGNED
)";

if ($conn->query($sqlTrainingsplane) === TRUE) { //Hier Error, obwohl Datei "included", warum ?
    echo "Tabelle 'trainingsplaene' erfolgreich erstellt.<br>";
} else {
    echo "Fehler beim Erstellen der Tabelle 'trainingsplaene': " . $conn->error . "<br>";
}

$conn->close();