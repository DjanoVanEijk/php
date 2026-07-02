
<nav>
    <ul>
        <li><a href="/php/p4/hoofdopdracht/pages/huiswerk.php">Huiswerk</a></li>

        <?php if (!empty($_SESSION['userid'])): ?>
            <li><a href="/php/p4/hoofdopdracht/pages/logout.php">Uitloggen</a></li>
        <?php else: ?>
            <li><a href="/php/p4/hoofdopdracht/pages/login.php">Inloggen</a></li>
            <li><a href="/php/p4/hoofdopdracht/pages/register.php">Registreren</a></li>
        <?php endif; ?>
    </ul>
</nav>