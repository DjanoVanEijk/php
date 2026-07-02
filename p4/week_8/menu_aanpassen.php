<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Menu aanpassen</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="../hoofdopdracht/index.php">Home</a></li>

            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="dit is een test">Nieuw item</a></li>
                <li><a href="dit is een test">Logout</a></li>
            <?php else: ?>
                <li><a href="dit is een test">Login</a></li>
                <li><a href="dit is een test">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
