<!DOCTYPE html>
<html lang="de">
<?php
$pageTitle = "Profil";
require './PHP_Bausteine/head.php';
require './PHP_Bausteine/PHP_Bausteine\controller\NutzerController.php';
require './PHP_Bausteine\controller\TreffenController.php';
$nutzerController = new \PHP_Bausteine\controller\NutzerController();
$treffenController = new \PHP_Bausteine\controller\TreffenController();
//TODO: getBeigetreteneTreffen() und getErstellteTreffen() in GUI einfügen @Bennart Lerg, hoffe, dass die Controller so funktionieren ansonsten fragen, hab ums verrecken versucht SQL zu vermeiden ....,
// können danach auch direkt die UpdateTreffen und DeleteTreffen Funktionen implementieren Inshallah, also HTML/CSS direkt mit diesen Buttons um Funktionen zu verknüpfen,
// am besten wäre es, wenn der Nutzer an den eigens erstellen treffen für jedes Eingabefeld einen "Stift Button" hat, sodass der veränderte Parameter so identifiziert wird
$beigetreteneTreffen = $nutzerController->getBeigetreteneTreffen();
$erstellteTreffen = $nutzerController->getErstellteTreffen();
?>
    <body>
<?php
require './PHP_Bausteine/nav.php';
?>
    <div class="main">
<h1 class="pagename"> Profil</h1>
<br>
<div>
    <form  method="post">
        <label for="goals"> Trainingsort: Oldenburg<br>
            <select name="goals" size="3" id="goals">
                <option value="gain" selected>Oldenburg</option>
                <option value="hold">Bremen</option>
                <option value="lose">Hamburg</option>
            </select></label>
        <button type="submit">update</button>
    </form>
    <br>
    <form  method="post">
        <label for="weight"></label><input id="weight" type="number" placeholder="90" min="0" max="400">
        <button type="submit">update</button>
    </form>
    <br>
    <form  method="post">
        <label for="sportstypes"> Sportarten: Kraftsport<br>
            <select name="sportstypes" size="3" multiple id="sportstypes">
                <option value="weightlifting" selected>Kraftsport</option>
                <option value="teamsports">Teamsportart</option>
                <option value="individualsports">Einzelsportart</option>
            </select></label>
        <button type="submit">update</button>
    </form>
    <br>
    <form method="post">
        <label for="goals"> Ausrichtung des Trainings: Muskelaufbau<br>
            <select name="goals" size="3" id="goals">
                <option value="gain" selected>Muskelaufbau</option>
                <option value="hold">Muskelerhalt</option>
                <option value="lose">Fettabbau</option>
            </select></label>
        <button type="submit">update</button>
    </form>
    <br>
    <form method="post">
        <label for="motivation"> Sportliche Ziele: Wettkampf<br>
            <select name="motivation" size="3" id="motivation">
                <option value="reha" selected>Reha</option>
                <option value="competition">Wettkampf</option>
                <option value="fun">Freude am Sport</option>
            </select></label>
        <button type="submit">update</button>
    </form>
    <br>
    <form  method="post">

        <label for="frequency"> Häufigkeit des Trainings: mehrmals pro Woche<br>
            <select name="frequency" size="3" id="frequency">
                <option value="daily" selected>täglich</option>
                <option value="multipleperweek">mehrfach pro Woche</option>
                <option value="weekly">mehrmals im Monat</option>
                <option value="less">seltener</option>
            </select></label>
        <button type="submit">update</button>
    </form>
    <br>
</div>
    </div>
<?php
require './PHP_Bausteine/foot.php';
?>
    </body>
</html>
