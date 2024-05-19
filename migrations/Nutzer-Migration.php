<?php
include "../DBConfiguration/config.php";

$sqlNutzer = "CREATE TABLE Nutzer (
    NutzerID INT(6) UNSIGNED PRIMARY KEY,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
)";