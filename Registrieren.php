
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
            <?php
            if(isset($_SESSION['message'])){
                $message = $_SESSION['message'];
                if($message == "passwords_not_matching"){
                    echo "<p class='error'>Die Passwörter stimmen nicht überein</p>";
                } else if($message == "email, password, name failure"){
                    echo "<p class='error'>Es wurden nicht alle benötigten Felder ausgefüllt</p>";
                } else if($message == "internal_error"){
                    echo "<p class='error'>Es ist ein interner Fehler aufgetreten</p>";
                }
            }
            ?>
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
            <label for="trainingLocation">Trainingsort:<br>
                <input id="trainingLocation" type="text" maxlength="50" name="trainingLocation" placeholder="Oldenburg"
                       value="<?php echo htmlspecialchars($form_registrieren['trainingLocation'] ?? ''); ?>">
            </label>
            <label for="sportstypes">Sportart(-en): <br>
                <input id="sportstypes" type="text" maxlength="70" name="sportstypes" placeholder="Fußball, Tennis, Schwimmen, Krafttraining"
                       value="<?php echo htmlspecialchars($form_registrieren['sportstypes'] ?? ''); ?>">
            </label>
            <label for="goals">Ausrichtung des Trainings: <br>
                <input id="goals" type="text" maxlength="50" name="goals" placeholder="Kraft, Ausdauer, Schnelligkeit"
                       value="<?php echo htmlspecialchars($form_registrieren['goals'] ?? ''); ?>">
            </label>
            <label for="motivation">Sportliche Ziele: <br>
                <input id="motivation" type="text" maxlength="50" name="motivation" placeholder="Abnehmen, Muskelaufbau, Spaß"
                       value="<?php echo htmlspecialchars($form_registrieren['motivation'] ?? ''); ?>">
            </label>
            <label for="frequency">Häufigkeit des Trainings:
                <input id="frequency" type="text" maxlength="50" name="frequency" placeholder="täglich, mehrfach pro Woche, mehrmals im Monat"
                       value="<?php echo htmlspecialchars($form_registrieren['frequency'] ?? ''); ?>">
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
