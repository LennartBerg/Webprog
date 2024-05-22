

<header>
    <h1 class="title">Gymder</h1>
    <h2 class="slogan">Klick, Match, Workout!</h2>
    <div class=""></div>
</header>
<nav class="navigation">
    <ul class="menu">
        <li> <a href="../index.php"> <svg class="homeIcon" viewBox="0 0 640 512">
                    <!-- https://www.iconfinder.com/search?q=dumbbell&price=free -->
                    <path
                        d="M104 96H56c-13.3 0-24 10.7-24 24v104H8c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h24v104c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24zm528 128h-24V120c0-13.3-10.7-24-24-24h-48c-13.3 0-24 10.7-24 24v272c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V288h24c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8zM456 32h-48c-13.3 0-24 10.7-24 24v168H256V56c0-13.3-10.7-24-24-24h-48c-13.3 0-24 10.7-24 24v400c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V288h128v168c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24z" />
                </svg></a> </li>
        <li> <a href="../Profil.php">Profil</a> </li>
        <li> <a href="../Trainingstreff.php">Trainingstreff</a> </li>
        <li> <a href="../Nutzerliste.php">Nutzerliste</a> </li>
        <?php if (!isset($_SESSION['Name'])) { ?>
            <li> <span>Einloggen/ Registrieren</span>
                <ul>
                    <li> <a href="../Registrieren.php">Registrieren</a> </li>
                    <li> <a href="../Einloggen.php">Einloggen</a> </li>
                </ul>
            </li>
        <?php } ?>
        <?php if (isset($_SESSION['Name'])) { ?>
            <li> <span>Abmelden</span>
                <ul>
                    <!--Link anpassen-->
                    <li> <a href="/PHP_Bausteine/controller/logout_Controller.php">Abmelden</a> </li>
                </ul>
            </li>
        <?php } ?>
        <li>
            <span>Hallo <?php if (isset($_SESSION['Name'])) { echo htmlspecialchars($_SESSION['Name']); } else { echo "Gast"; } ?></span>
        </li>
    </ul>
</nav>