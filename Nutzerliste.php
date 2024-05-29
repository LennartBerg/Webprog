<!DOCTYPE html>
<html lang="de">
<?php
$pageTitle = "Nutzerliste";
require './PHP_Bausteine/head.php';
require_once './vendor/autoload.php';
$nutzerController = new \PHP_Bausteine\controller\NutzerController();
$nutzers = $nutzerController->getAllNutzer();
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
                    <div class="grid-header">Beigetretenen Treffen</div>
                    <div class="grid-header">Aktionen</div>

                    <?php foreach ($nutzers as $nutzer): ?>
                    <div class="grid-item"> <?= htmlspecialchars($nutzer->getEmail()) ?> </div>
                    <div class="grid-item"> <?php //TODO: Treffen beitreten ?> </div>
                    <div class="grid-item">
                        <button class="Nutzerbutton" onclick="deleteUser('user1@example.com')">Löschen</button>
                        <button class="Nutzerbutton" onclick="viewProfile('user1')">Profil</button>
                    </div>
                    <?php endforeach; ?>

                    <div class="grid-item">user2@example.com</div>
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
