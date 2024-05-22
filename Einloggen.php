<!DOCTYPE html>
<html lang="de">
<?php
$pageTitle = "Einloggen";
require './PHP_Bausteine/head.php';
?>
<body>
<?php
require './PHP_Bausteine/nav.php';
?>
<div class="main">
<h1 class="centerPagename">Einloggen</h1>
<div class="Einloggen">
    <form class="Einloggen-Form" method="post">
        <label for="loginUsername">Email:<input type="email" id="loginUsername" required placeholder="mail@provider.com"></label>
        <label for="loginPassword">Passwort:<input type="password" id="loginPassword" required placeholder="Passwort"></label>
        <button class="CenterButton" type="submit">einloggen</button>
    </form>
</div>
</div>
<?php
require './PHP_Bausteine/foot.php';
?>
</body>
</html>
