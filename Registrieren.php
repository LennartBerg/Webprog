
<!DOCTYPE html>
<html lang="de">
<?php
$pageTitle = "Registrieren";
require './PHP_Bausteine/head.php';
require './PHP_Bausteine/nav.php';
$form_registrieren = isset($_SESSION['form_registrierung']) ? $_SESSION['form_registrierung'] : [];
?>
<body>
    <div class="main">
<h1 class="centerPagename"> Registrieren</h1>
    <br>
    <div class="Einloggen">
        <form method="post" class="Einloggen-Form" action="PHP_Bausteine/controller/Nutzer_Controller/controller-Nutzter-neu.php">
            <label for="Email">Email:<br>
                <input id="Email" type="email" name="email" placeholder="mail@provider.com"
                       value="<?php echo htmlspecialchars($form_registrieren['email'] ?? ''); ?>" required>
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
                       value="<?php echo htmlspecialchars($form_registrieren['Name'] ?? ''); ?>">
            </label>
            <label for="birthdate">Geburtstag:<br>
                <input id="birthdate" type="date" name="birthdate"
                       value="<?php echo htmlspecialchars($form_registrieren['birthdate'] ?? ''); ?>">
            </label>
            <label for="height">Größe in cm:<br>
                <input id="height" type="number" name="height" placeholder="180" min="0"
                       value="<?php echo htmlspecialchars($form_registrieren['height'] ?? ''); ?>">
            </label>
            <label for="weight">Gewicht in kg:<br>
                <input id="weight" type="number" name="weight" placeholder="90" min="0"
                       value="<?php echo htmlspecialchars($form_registrieren['weight'] ?? ''); ?>">
            </label>
            <p>Trainingsort:<br>
                <label class="registerLabel" for="trainingLocation"> Oldenburg
                <input class="registerInput" type="checkbox" id="trainingLocation" name="Oldenburg" value="Oldenburg" <?php echo (isset($form_registrieren['trainingLocation']) && $form_registrieren['trainingLocation'] == 'Oldenburg') ? 'checked' : ''; ?>>
                </label><br>
                <label class="registerLabel" for="trainingLocation"> Bremen
                <input class="registerInput" type="checkbox" id="trainingLocation" name="Bremen" value="Bremen" <?php echo (isset($form_registrieren['trainingLocation']) && $form_registrieren['trainingLocation'] == 'Bremen') ? 'checked' : ''; ?>>
                </label><br>
                <label class="registerLabel" for="trainingLocation"> Hamburg
                <input class="registerInput" type="checkbox" id="trainingLocation" name="Hamburg" value="Hamburg" <?php echo (isset($form_registrieren['trainingLocation']) && $form_registrieren['trainingLocation'] == 'Hamburg') ? 'checked' : ''; ?>>
                </label><br>
            </p>
            <p>Sportarten:<br>
                <label class="registerLabel" for="weightlifting"> Kraftsport
                <input class="registerInput" type="checkbox" id="sportstypes" name="weightlifting" value="weightlifting" <?php echo (isset($form_registrieren['sportstypes']) && in_array('weightlifting', $form_registrieren['sportstypes'])) ? 'checked' : ''; ?>>
                </label><br>
                <label class="registerLabel" for="teamsports"> Teamsportart
                <input class="registerInput" type="checkbox" id="sportstypes" name="teamsports" value="teamsports" <?php echo (isset($form_registrieren['sportstypes']) && in_array('teamsports', $form_registrieren['sportstypes'])) ? 'checked' : ''; ?>>
                </label><br>
                <label class="registerLabel" for="individualsports"> Einzelsportart
                <input class="registerInput" type="checkbox" id="sportstypes" name="individualsports" value="individualsports" <?php echo (isset($form_registrieren['sportstypes']) && in_array('individualsports', $form_registrieren['sportstypes'])) ? 'checked' : ''; ?>>
                </label><br>
            </p>
            <p>
            Ausrichtung des Trainings:<br>
                    <label class="registerLabel" for="gain"> Muskelaufbau
                    <input class="registerInput" type="checkbox" id="goals" name="gain" value="gain" <?php echo (isset($form_registrieren['goals']) && $form_registrieren['goals'] == 'gain') ? 'checked' : ''; ?>>
                    </label><br>
                    <label class="registerLabel" for="hold"> Muskelerhalt
                    <input class="registerInput" type="checkbox" id="goals" name="hold" value="hold" <?php echo (isset($form_registrieren['goals']) && $form_registrieren['goals'] == 'hold') ? 'checked' : ''; ?>>
                    </label><br>
                    <label class="registerLabel" for="lose"> Fettabbau
                    <input class="registerInput" type="checkbox" id="goals" name="lose" value="lose" <?php echo (isset($form_registrieren['goals']) && $form_registrieren['goals'] == 'lose') ? 'checked' : ''; ?>>
                    </label><br>
            </p>
            <p>Sportliche Ziele:<br>
                <label class="registerLabel" for="reha"> Reha
                    <input class="registerInput" type="checkbox" id="motivation" name="reha" value="reha" <?php echo (isset($form_registrieren['motivation']) && $form_registrieren['motivation'] == 'reha') ? 'checked' : ''; ?>>
                   </label><br>
                <label class="registerLabel" for="competition"> Wettkampf
                    <input class="registerInput" type="checkbox" id="motivation" name="competition" value="competition" <?php echo (isset($form_registrieren['motivation']) && $form_registrieren['motivation'] == 'competition') ? 'checked' : ''; ?>>
                    </label><br>
                <label class="registerLabel" for="fun"> Freude am Sport
                    <input class="registerInput" type="checkbox" id="motivation" name="fun" value="fun" <?php echo (isset($form_registrieren['motivation']) && $form_registrieren['motivation'] == 'fun') ? 'checked' : ''; ?>>
                    </label><br>
            </p>
            <p>
            Häufigkeit des Trainings:<br>
                <label class="registerLabel" for="daily"> täglich
                    <input class="registerInput" type="checkbox" id="frequency" name="daily" value="daily" <?php echo (isset($form_registrieren['frequency']) && $form_registrieren['frequency'] == 'daily') ? 'checked' : ''; ?>>
                    </label><br>
                <label class="registerLabel" for="multipleperweek"> mehrfach pro Woche
                    <input class="registerInput" type="checkbox" id="frequency" name="multipleperweek" value="multipleperweek" <?php echo (isset($form_registrieren['frequency']) && $form_registrieren['frequency'] == 'multipleperweek') ? 'checked' : ''; ?>>
                    </label><br>
                <label class="registerLabel" for="weekly"> mehrmals im Monat
                    <input class="registerInput" type="checkbox" id="frequency" name="weekly" value="weekly" <?php echo (isset($form_registrieren['frequency']) && $form_registrieren['frequency'] == 'weekly') ? 'checked' : ''; ?>>
                   </label><br>
            </p>
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
