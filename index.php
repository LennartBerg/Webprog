<!DOCTYPE html>
<html lang="de">
<?php
$pageTitle = "Home";
require './PHP_Bausteine/head.php';
require './PHP_Bausteine/model/TreffenModel/TreffenListe.php';
require './PHP_Bausteine/model/TreffenModel/Treffen.php';
$treffens = Treffen::getInstance()->getAllTreffen();
?>
    <body>
<?php
require './PHP_Bausteine/nav.php';
?>
    <div class="main">
        <h1 class="centerPagename"> Home</h1>
        <br><br>
        <h2 class="centerPagename">Neue Treffen</h2>
            <?php foreach ($treffens as $treffen): ?>
                <div class="Objektliste">
                    <div class="inneresObjekt">
                        <h3><?=htmlspecialchars($treffen -> getTitleRecipe())?></h3>
                        <h4>Max Mustermann</h4>
                        <p class="entryText"><?=htmlspecialchars($treffen -> getTextRecipe())?></p>
                        <button class="EntryButton" type="submit"><b>Rezept favorisieren</b></button>
                    </div>
                </div>
            <?php endforeach; ?>
<br><br>

    </div>
<?php
require './PHP_Bausteine/foot.php';
?>
</body>
</html>
