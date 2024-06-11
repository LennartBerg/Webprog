
<!DOCTYPE html>
<html lang="de">
<?php
$pageTitle = "Registrieren";
require './PHP_Bausteine/head.php';
require './PHP_Bausteine/nav.php';
$form_registrieren = $_SESSION['form_registrierung'] ?? [];
?>
<body>
    <div class="main">
<h1 class="centerPagename"> Registrieren</h1>
    <br>
    <div class="Einloggen">
        <form method="post" class="Einloggen-Form" action="nutzerNeu.php">
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
