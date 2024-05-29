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
        <div class="NutzerListContainer">
            <div class="user-list-container">
                <div class="grid-list">
                    <div class="grid-header">Email</div>
                    <div class="grid-header">Beitrittsdatum</div>
                    <div class="grid-header">Beigetretenen Treffen</div>
                    <div class="grid-header">Aktionen</div>

                    <div class="grid-item">user1@examplas,dnasdnasnd,nasd,nas,e.com</div>
                    <div class="grid-item">2022-01-15</div>
                    <div class="grid-item">5</div>
                    <div class="grid-item">
                        <button onclick="deleteUser('user1@example.com')">Löschen</button>
                        <button onclick="viewProfile('user1')">Profil</button>
                    </div>

                    <div class="grid-item">user2@example.com</div>
                    <div class="grid-item">2023-03-22</div>
                    <div class="grid-item">3</div>
                    <div class="grid-item">
                        <button class="Nutzerbutton" onclick="deleteUser('user2@example.com')">Löschen</button>
                        <button class="Nutzerbutton" onclick="viewProfile('user2')">Profil</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php
require './PHP_Bausteine/foot.php';
?>
    </body>
</html>
