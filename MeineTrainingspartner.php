<?php
$pageTitle = "Meine Trainingspartner";
require './PHP_Bausteine/head.php';
?>
<h1 class="pagename"> Meine Trainingspartner</h1>
<div class="splitscreen">
    <div>   
        <ul class="partner-container">
            <li>Max Mustermann <br> <a class="button"><b>Starte den Chat</b></a><br><br></li>
            <li>Lisa Musterfrau <br> <a class="button"><b>Starte den Chat</b></a><br><br></li>
        </ul>
    </div>
    <div>
        <?php
        require './PHP_Bausteine/chatBox.php';
        ?>
    </div>
</div>

<?php
require './PHP_Bausteine/foot.php';
?>