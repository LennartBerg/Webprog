<!DOCTYPE html>
<html lang="de">
<?php
$pageTitle = "Einloggen";
require './PHP_Bausteine/head.php';
$form_einloggen = isset($_SESSION['Form_einloggen']) ? $_SESSION['Form_einloggen'] : [];
?>
<body>
<?php
require './PHP_Bausteine/nav.php';
?>
<div class="main">
<h1 class="centerPagename">Einloggen</h1>
<div class="Einloggen">

    <form class="Einloggen-Form" action="PHP_Bausteine/controller/Nutzer_Controller/login_controller.php" method="post">
        <?php
        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            if($message == "login_failure"){
                echo "<p class='error'>Die Email oder das Passwort ist falsch</p>";
            } else if($message == "internal_error") {
                echo "<p class='error'>Es ist ein interner Fehler aufgetreten</p>";
            }
        }
        ?>
        <label for="loginUsername">Email:
            <input type="email" id="loginUsername" name="name" required placeholder="mail@provider.com" value="<?php echo htmlspecialchars($form_einloggen['loginUsername'] ?? ''); ?>">
        </label>
        <label for="loginPassword">Passwort:
            <input type="password" id="loginPassword" name="password" placeholder="Passwort" required  >
        </label>
        <button class="CenterButton" type="submit">einloggen</button>
    </form>
</div>
</div>
<?php
require './PHP_Bausteine/foot.php';
?>
</body>
</html>
