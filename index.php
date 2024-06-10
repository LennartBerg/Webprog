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
                            <h3><?php echo $treffen->getName() ?? 'Treffen'; ?></h3>
                            <h5><?php echo $treffen->getErsteller() ?? 'Hier gibt es einen Anonymen Ersteller'; ?></h5>
                            <span><?php echo $treffen->getOrt() ?? ''; ?></span>
                            <div class="nameOrtDatumBox">
                                <span><?php echo $treffen->getDatum() ?? ''; ?></span>
                                <span><?php echo $treffen->getZeit() ?? ''; ?></span>
                            </div>
                            <p class="entryText"><?php echo $treffen->getBeschreibung() ?? ''; ?></p>
                            <span>
                                <?php
                                if ($treffen -> getTeilnehmer()  == null){
                                    echo "Bisher keine Teilnehmer";
                                }
                                if(sizeof($treffen -> getTeilnehmer()) > 3){
                                    foreach (array_splice($treffen -> getTeilnehmer(), 3) as $teilnehmer){
                                        echo $teilnehmer . ", ";
                                    }
                                    echo "und " . (sizeof($treffen -> getTeilnehmer()) - 3) . " weitere";
                                } else{
                                    foreach ($treffen -> getTeilnehmer() as $teilnehmer){
                                        echo $teilnehmer . ", ";
                                    }
                                }
                                ?>
                            </span>
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
