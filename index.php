<?php
$pageTitle = "Home";
require_once './vendor/autoload.php';

$treffenController = new \PHP_Bausteine\controller\TreffenController();
$treffen = $treffenController->getAllTreffen();
?>

<!DOCTYPE html>
<html lang="de">
    <?php require './PHP_Bausteine/head.php'; ?>
    <body>
        <?php require './PHP_Bausteine/nav.php'; ?>
        <div class="main">
            <h1 class="centerPagename"> Home</h1>
            <br><br>
            <h2 class="centerPagename">Neue Treffen</h2>
            <div class="Objektliste">
                <?php foreach ($treffen as $treffen): ?>
                    <div class="Objekt">
                        <div class="inneresObjekt">
                            <h3><?php echo $treffen->getName(); ?></h3>
                            <h5><?php echo $treffen->getErsteller(); ?></h5>
                            <p class="entryText"><?php echo $treffen->getBeschreibung(); ?></p>
                            <button class="EntryButton" type="submit"><b>Treffen beitreten</b></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <br><br>
        </div>
        <?php  require './PHP_Bausteine/foot.php'; ?>
    </body>
</html>
