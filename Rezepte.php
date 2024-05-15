<?php
$pageTitle = "Rezepte";
require './PHP_Bausteine/head.php';
require './PHP_Bausteine/model/RezeptModel/Rezept.php';
require './PHP_Bausteine/model/RezeptModel/Rezeptbuch.php';
$rezepte = Rezeptbuch::getInstance()->getAllRezepte();
?>
<h1 class="centerPagename"> Rezepte</h1>
<div class="Objektliste">

    <?php foreach ($rezepte as $rezept): ?>
            <div class="Objekt">
                <img src="<?=htmlspecialchars($rezept -> getPictureRecipe())?>" alt="Karte">
                <div class="inneresObjekt">
                    <h3><?=htmlspecialchars($rezept -> getTitleRecipe())?></h3>
                    <h4>Max Mustermann</h4>
                    <p class="entryText"><?=htmlspecialchars($rezept -> getTextRecipe())?></p>
                    <button class="EntryButton" type="submit"><b>Rezept favorisieren</b></button>
                </div>
            </div>
    <?php endforeach; ?>
</div>
<br>
    <br>
<h2 class="centerPagename">Neues Rezept hinzufügen</h2>
<form action="/PHP_Bausteine/controller/Rezept_Controller/controller-Rezept-neu.php" method="post" enctype="multipart/form-data">
    <div class="newEntry">
        <label for="title"><b>Titel des Rezepts:</b></label><br>
        <input id="title_recipe" name="title_recipe" type="text" maxlength="150" required><br> <br>
        <label for="recipe"><b>Rezept:</b></label><br>
        <textarea class="textField" id="recipe" name="text_recipe" cols="50" rows="20" minlength="150" maxlength="10000" required></textarea>
    </div>
    <b>Bild des Gerichts: </b>
    <input type="file" name="picture_recipe" accept="image/*" required> <br> <br>
    <button class="button" type="submit"><b>Poste dein Rezept</b></button>
</form>
<?php
require './PHP_Bausteine/foot.php';
?>