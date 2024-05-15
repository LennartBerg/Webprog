<?php
$pageTitle = "Trainingspartner suchen";
require './PHP_Bausteine/head.php';
?>
<h1 class="pagename"> Trainingspartner suchen</h1>
<div>
    <h2>Anfragen</h2>
    <form method="post">
        <h3>Lisa Musterfrau</h3>
        Gewicht: 59kg <br>
        Trainingsort: Oldenburg <br>
        Sportarten: Kraftsport <br>
        Ausrichtung des Trainings: Muskelaufbau <br>
        Häufigkeit des Trainings: täglich <br>
        Sportliche Ziele: Wettkampf <br> <br>
        <button class="button" type="submit">Anfrage annehmen</button>
    </form>
</div>
<br>

<h2>Neue Mitglieder in deiner Nähe</h2>
<form  method="post">
    <h3>Max Mustermann</h3>
    Trainingsort: Hamburg <br>
    Gewicht: 89kg <br>
    Sportarten: Kraftsport <br>
    Ausrichtung des Trainings: Muskelaufbau <br>
    Häufigkeit des Trainings: mehrmals pro Woche <br>
    Sportliche Ziele: Wettkampf <br> <br>
    <button class="button" type="submit">Anfrage senden</button>
</form>
<br>
<?php
require './PHP_Bausteine/foot.php';
?>