<?php
$pageTitle = "Registrieren";
require './PHP_Bausteine/head.php';
?>
<h1 class="centerPagename"> Registrieren</h1>
    <br>
    <div class="Einloggen">
<form method="post" class="Einloggen-Form" action="PHP_Bausteine/controller/Nutzer_Controller/controller-Nutzter-neu.php">
    <label for="Email">Email: <br>
            <input id="Email" type="email" name="email" placeholder="mail@provider.com"
                required>
        </label>
    <label for="password">Passwort:<br>
            <input id="password" type="password" name="password1" minlength="7"  maxlength="30"
                placeholder="Passwort" required>
        </label>
    <label for="password_repeat">Passwort wiederholen:<br>
            <input id="password_repeat" type="password" name="password2" minlength="7" maxlength="30"
                placeholder="Passwort" required>
        </label>
    <label for="Name">Name:<br>
            <input id="Name" type="text" name="Name" placeholder="Mustermann">
        </label>
    <label for="birthdate">Geburtstag:<br>
            <input id="birthdate" type="date" name="birthdate">
        </label>
    <label for="height">Größe in cm:<br>
            <input id="height" type="number" name="height" placeholder="180" min="0">
        </label>
    <label for="weight">Gewicht in kg:<br>
            <input id="weight" type="number" name="weight" placeholder="90" min="0">
        </label>
    <label for="trainingLocation">Trainingsort:<br>
            <select name="trainingLocation" id="trainingLocation">
                <option value="" selected disabled>Trainingsort auswählen</option>
                <option value="gain" selected>Oldenburg</option>
                <option value="hold">Bremen</option>
                <option value="lose">Hamburg</option>
            </select></label>
    <label for="sportstypes">Sportarten:<br>
            <select name="sportstypes" size="3" multiple id="sportstypes">
                <option value="weightlifting" selected>Kraftsport</option>
                <option value="teamsports">Teamsportart</option>
                <option value="individualsports">Einzelsportart</option>
            </select></label>
    <label for="goals">Ausrichtung des Trainings:<br>
            <select name="goals" size="3" id="goals">
                <option value="gain" selected>Muskelaufbau</option>
                <option value="hold">Muskelerhalt</option>
                <option value="lose">Fettabbau</option>
            </select></label>
    <label for="motivation">Sportliche Ziele:<br>
            <select name="motivation" size="3" id="motivation">
                <option value="reha" selected>Reha</option>
                <option value="competition">Wettkampf</option>
                <option value="fun">Freude am Sport</option>
            </select></label>
    <label for="frequency">Häufigkeit des Trainings:<br>
            <select name="frequency" size="3" id="frequency">
                <option value="daily" selected>täglich</option>
                <option value="multipleperweek">mehrfach pro Woche</option>
                <option value="weekly">mehrmals im Monat</option>
                <option value="less">seltener</option>
            </select></label>
    <label for="profile_picture">Profilbild:<input type="file" id="profile_picture" name="profile_picture" accept="image/*"></label>
    <button class="button" type="submit"><b>abschicken</b></button>
</form>
    </div>

<?php
require './PHP_Bausteine/foot.php';
?>