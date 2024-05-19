<?php
include "../DBConfiguration/config.php";

$sqlRezepte = "CREATE TABLE Rezept (
    RezeptID INT(6) UNSIGNED PRIMARY KEY,
    titel_recipe VARCHAR(30) NOT NULL,
    text_recipe VARCHAR(1000) NOT NULL,
    picture_recipe VARCHAR(255) NOT NULL,
    author_recipe VARCHAR(30) NOT NULL,
    likes INT(6) UNSIGNED
)";