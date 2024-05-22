<!DOCTYPE html>
<html lang="de">
<?php
$pageTitle = "Home";
require './PHP_Bausteine/head.php';
?>
    <body>
<?php
require './PHP_Bausteine/nav.php';
?>
    <div class="main">
        <h1 class="centerPagename"> Home</h1>
        <br><br>
        <h2 class="centerPagename">Neue Rezepte</h2>
        <div class="Objektliste">
            <div class="Objekt">
                <img src="Pictures/Tofu.JPG" alt="Karte"">
                <div class="inneresObjekt">
                    <h3>Reis mit Tofu</h3>
                    <h5>Max Mustermann</h5>
                    <p class="entryText">Folgendes Rezept besteht aus Reis und schmeckt leider nicht</p>
                    <button class="EntryButton" type="submit"><b>Rezept favorisieren</b></button>
                </div>
            </div>
        </div>
<br><br>

    </div>
<?php
require './PHP_Bausteine/foot.php';
?>
</body>
</html>
