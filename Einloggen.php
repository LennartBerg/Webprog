<?php
$pageTitle = "Einloggen";
require './PHP_Bausteine/head.php';
?>
<h1 class="centerPagename">Einloggen</h1>
<div class="Einloggen">
    <form class="Einloggen-Form" method="post">
        <label for="loginUsername">Email:<input type="email" id="loginUsername" required placeholder="mail@provider.com"></label>
        <label for="loginPassword">Passwort:<input type="password" id="loginPassword" required placeholder="Passwort"></label>
        <button class="CenterButton" type="submit">einloggen</button>
    </form>
</div>
<?php
require './PHP_Bausteine/foot.php';
?>
