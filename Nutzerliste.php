<!DOCTYPE html>
<html lang="de">
<?php
$pageTitle = "Nutzerliste";
require './PHP_Bausteine/head.php';
?>
    <body>
<?php
require './PHP_Bausteine/nav.php';
?>
    <div class="main">
<h1 class="pagename"> Nutzerliste</h1>
<ul class="AdminList">
    <li>
    <article class="NutzerListIndex">
        <h3>Mail</h3>
        <h3>Beitrittsdatum</h3>
        <h3>Erstellte Rezepte</h3>
        <h3>Erstellte Trainingspläne</h3>
        <h3>Nutzer</h3>
    </article>
    </li>
    <li>
    <article class="NutzerListElement">
        <p>maxm@mail.de</p>
        <p>12.02.2024</p>
        <p>3</p>
        <p>7</p>
        <a>Sprung</a>
    </article>
    </li>
</ul>
    </div>
<?php
require './PHP_Bausteine/foot.php';
?>
    </body>
</html>
