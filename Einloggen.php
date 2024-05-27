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
    <form class="Einloggen-Form" method="post">
        <label for="loginUsername">Email:
            <input type="email" id="loginUsername" required placeholder="mail@provider.com" value="<?php echo htmlspecialchars($form_einloggen['loginUsername'] ?? ''); ?>">
        </label>
        <label for="loginPassword">Passwort:
            <input type="password" id="loginPassword" required placeholder="Passwort" value="<?php echo htmlspecialchars($form_registrieren['loginPassword'] ?? ''); ?> " >
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
