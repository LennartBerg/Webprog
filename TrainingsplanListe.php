<?php
$pageTitle = "Trainingsplanliste";
require './PHP_Bausteine/head.php';
?>
<h1 class="pagename"> Trainingsplanliste</h1>
<ul class="AdminList">
    <li> <article class="AdminListIndex">
        <h3>Titel</h3>
        <h3>Ersteller</h3>
        <h3>Erstelldatum</h3>
        <h3>Upvotes</h3>
        <h3>Plan</h3>
    </article>
    </li>
    <li> <article class="AdminListElement">
        <p>Max' Trainingsplan</p>
        <p>Max Mustermann</p>
        <p>12.02.2024</p>
        <p>127</p>
        <a>Sprung</a>
    </article>
    </li>
</ul>
<?php
require './PHP_Bausteine/foot.php';
?>