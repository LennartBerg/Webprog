<!DOCTYPE html>
<html lang="de">
<?php
session_start();
$pageTitle = "Registrieren";
require './PHP_Bausteine/head.php';

// Fehlermeldung anzeigen, falls vorhanden
if (isset($_SESSION['error'])) {
    echo "<p class='error'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}

// Vorhandene Formulardaten abrufen, falls vorhanden
$form_data = isset($_SESSION['form_registrierung']) ? $_SESSION['form_registrierung'] : [];
?>
    <body>
<?php
require './PHP_Bausteine/nav.php';
?>
    <div class="main">
<h1 class="centerPagename"> Registrieren</h1>
    <br>
    <div class="Einloggen">
        <form method="post" class="Einloggen-Form" action="PHP_Bausteine/controller/Nutzer_Controller/controller-Nutzter-neu.php">
            <label for="Email">Email:<br>
                <input id="Email" type="email" name="email" placeholder="mail@provider.com"
                       value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>" required>
            </label>
            <label for="password">Passwort:<br>
                <input id="password" type="password" name="password1" minlength="7" maxlength="30"
                       placeholder="Passwort" required>
            </label>
            <label for="password_repeat">Passwort wiederholen:<br>
                <input id="password_repeat" type="password" name="password2" minlength="7" maxlength="30"
                       placeholder="Passwort" required>
            </label>
            <label for="Name">Name:<br>
                <input id="Name" type="text" name="Name" placeholder="Mustermann"
                       value="<?php echo htmlspecialchars($form_data['Name'] ?? ''); ?>">
            </label>
            <label for="birthdate">Geburtstag:<br>
                <input id="birthdate" type="date" name="birthdate"
                       value="<?php echo htmlspecialchars($form_data['birthdate'] ?? ''); ?>">
            </label>
            <label for="height">Größe in cm:<br>
                <input id="height" type="number" name="height" placeholder="180" min="0"
                       value="<?php echo htmlspecialchars($form_data['height'] ?? ''); ?>">
            </label>
            <label for="weight">Gewicht in kg:<br>
                <input id="weight" type="number" name="weight" placeholder="90" min="0"
                       value="<?php echo htmlspecialchars($form_data['weight'] ?? ''); ?>">
            </label>
            <label for="trainingLocation">Trainingsort:<br>
                <select name="trainingLocation" id="trainingLocation">
                    <option value="" disabled <?php echo empty($form_data['trainingLocation']) ? 'selected' : ''; ?>>Trainingsort auswählen</option>
                    <option value="Oldenburg" <?php echo (isset($form_data['trainingLocation']) && $form_data['trainingLocation'] == 'Oldenburg') ? 'selected' : ''; ?>>Oldenburg</option>
                    <option value="Bremen" <?php echo (isset($form_data['trainingLocation']) && $form_data['trainingLocation'] == 'Bremen') ? 'selected' : ''; ?>>Bremen</option>
                    <option value="Hamburg" <?php echo (isset($form_data['trainingLocation']) && $form_data['trainingLocation'] == 'Hamburg') ? 'selected' : ''; ?>>Hamburg</option>
                </select>
            </label>
            <label for="sportstypes">Sportarten:<br>
                <select name="sportstypes[]" size="3" multiple id="sportstypes">
                    <option value="weightlifting" <?php echo (isset($form_data['sportstypes']) && in_array('weightlifting', $form_data['sportstypes'])) ? 'selected' : ''; ?>>Kraftsport</option>
                    <option value="teamsports" <?php echo (isset($form_data['sportstypes']) && in_array('teamsports', $form_data['sportstypes'])) ? 'selected' : ''; ?>>Teamsportart</option>
                    <option value="individualsports" <?php echo (isset($form_data['sportstypes']) && in_array('individualsports', $form_data['sportstypes'])) ? 'selected' : ''; ?>>Einzelsportart</option>
                </select>
            </label>
            <label for="goals">Ausrichtung des Trainings:<br>
                <select name="goals" size="3" id="goals">
                    <option value="gain" <?php echo (isset($form_data['goals']) && $form_data['goals'] == 'gain') ? 'selected' : ''; ?>>Muskelaufbau</option>
                    <option value="hold" <?php echo (isset($form_data['goals']) && $form_data['goals'] == 'hold') ? 'selected' : ''; ?>>Muskelerhalt</option>
                    <option value="lose" <?php echo (isset($form_data['goals']) && $form_data['goals'] == 'lose') ? 'selected' : ''; ?>>Fettabbau</option>
                </select>
            </label>
            <label for="motivation">Sportliche Ziele:<br>
                <select name="motivation" size="3" id="motivation">
                    <option value="reha" <?php echo (isset($form_data['motivation']) && $form_data['motivation'] == 'reha') ? 'selected' : ''; ?>>Reha</option>
                    <option value="competition" <?php echo (isset($form_data['motivation']) && $form_data['motivation'] == 'competition') ? 'selected' : ''; ?>>Wettkampf</option>
                    <option value="fun" <?php echo (isset($form_data['motivation']) && $form_data['motivation'] == 'fun') ? 'selected' : ''; ?>>Freude am Sport</option>
                </select>
            </label>
            <label for="frequency">Häufigkeit des Trainings:<br>
                <select name="frequency" size="3" id="frequency">
                    <option value="daily" <?php echo (isset($form_data['frequency']) && $form_data['frequency'] == 'daily') ? 'selected' : ''; ?>>täglich</option>
                    <option value="multipleperweek" <?php echo (isset($form_data['frequency']) && $form_data['frequency'] == 'multipleperweek') ? 'selected' : ''; ?>>mehrfach pro Woche</option>
                    <option value="weekly" <?php echo (isset($form_data['frequency']) && $form_data['frequency'] == 'weekly') ? 'selected' : ''; ?>>mehrmals im Monat</option>
                    <option value="less" <?php echo (isset($form_data['frequency']) && $form_data['frequency'] == 'less') ? 'selected' : ''; ?>>seltener</option>
                </select>
            </label>
            <label for="profile_picture">Profilbild:<input type="file" id="profile_picture" name="profile_picture" accept="image/*"></label>
            <button class="button" type="submit"><b>abschicken</b></button>
        </form>
    </div>
    </div>
<?php
require './PHP_Bausteine/foot.php';
?>
    </body>
</html>
