<?php
$pageTitle = "Trainingspläne";
require './PHP_Bausteine/head.php';
?>
<h1 class="centerPagename"> Trainingspläne</h1>
<div class="Objektliste">
<div class="TrainingsplanObjekt">
    <h3>Max' Trainingsplan (12 Likes)</h3>
    <h4>Max Mustermann</h4>
    <p class="entryText"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
        sed diam nonumy eirmod tempor invidunt ut labore et dolore
        magna aliquyam erat, sed diam voluptua. At vero eos et accusam
        et justo duo dolores et ea rebum. Stet clita kasd gubergren,
        no sea takimata sanctus est Lorem ipsum dolor sit amet.
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
        sed diam nonumy eirmod tempor invidunt ut labore et dolore
        magna aliquyam erat, sed diam voluptua. At vero eos et accusam
        et justo duo dolores et ea rebum. Stet clita kasd gubergren,
        no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
    <button class="EntryButton" type="submit"><b>Trainingsplan favorisieren</b></button>
</div>
<div class="TrainingsplanObjekt">
    <h3>Max' Trainingsplan (34 Likes)</h3>
    <h4>Max Mustermann</h4>
    <p class="entryText"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
        sed diam nonumy eirmod tempor invidunt ut labore et dolore
        magna aliquyam erat, sed diam voluptua. At vero eos et accusam
        et justo duo dolores et ea rebum. Stet clita kasd gubergren,
        no sea takimata sanctus est Lorem ipsum dolor sit amet.
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
        sed diam nonumy eirmod tempor invidunt ut labore et dolore
        magna aliquyam erat, sed diam voluptua. At vero eos et accusam
        et justo duo dolores et ea rebum. Stet clita kasd gubergren,
        no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
    <button class="EntryButton" type="submit"><b>Trainingsplan favorisieren</b></button>
</div>
</div>
    <br>
<h1 class="centerPagename">Neuen Trainingsplan hinzufügen</h1>
<form action="/upload" method="post" enctype="multipart/form-data">
    <div>
        <label for="title"><b>Titel des Plans:</b></label><br>
        <input type="text" id="title" maxlength="150" required><br> <br>

        <label for="plan"><b>Plan:</b></label><br>
        <textarea class="textField" id="plan" name="text" cols="50" rows="20" minlength="150" maxlength="10000" required></textarea>
        <br> <br>
        <button class="button" type="submit"><b>Poste deinen Trainingsplan</b></button> <br> <br>
    </div>
</form>

<?php
require './PHP_Bausteine/foot.php';
?>