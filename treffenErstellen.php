<?php
$pageTitle = "Treffen Erstellen";
require_once './vendor/autoload.php';
$treffenController = new \PHP_Bausteine\controller\TreffenController();
$form_treffen = $_SESSION['form_treffen'] ?? [];
?>
<!DOCTYPE html>
<html lang="de">
<?php require './PHP_Bausteine/head.php'; ?>
    <body>
    <?php require './PHP_Bausteine/nav.php'; ?>
        <div class="main">
            <form method="post" class="Einloggen-Form" action="treffenNeu.php">
                <label for="name">Name:<br>
                    <input id="name" type="text" maxlength="20" name="name" placeholder="Muster Titel"
                           value="<?php echo htmlspecialchars($form_treffen['name'] ?? ''); ?>" required>
                </label>
                <label for="ort">Ort:<br>
                    <input id="ort" type="text" maxlength="20" name="ort" placeholder="Oldenburg"
                           value="<?php echo htmlspecialchars($form_treffen['ort'] ?? ''); ?>" required>
                </label>
                <label for="datum">Datum:<br>
                    <input id="datum" type="date" name="datum"
                    value="<?php echo htmlspecialchars($form_treffen['datum'] ?? ''); ?>" required>
                </label>
                <label for="zeit">Uhrzeit:<br>
                    <input id="zeit" type="time" name="zeit"
                           value="<?php echo htmlspecialchars($form_treffen['zeit'] ?? ''); ?>" required>
                </label>
                <label for="beschreibung">Beschreibung:<br>
                    <input id="beschreibung" type="text" maxlength="700" name="beschreibung" placeholder="Dies ist die Beschreibung deines Meetings"
                           value="<?php echo htmlspecialchars($form_treffen['beschreibung'] ?? ''); ?>" required>
                </label>
            </form>
        </div>
<?php
require './PHP_Bausteine/foot.php';
?>
</body>
</html>
