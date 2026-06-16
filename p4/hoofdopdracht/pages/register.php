<?php
session_start();

if (isset($_SESSION['userid'])) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
</head>
<body>

    <h2>Registreren</h2>

    <form method="POST" action="register-check.php">
        <label>Gebruikersnaam:</label>
        <input type="text" name="name" required>

        <br>

        <label>Email:</label>
        <input type="email" name="email" required>

        <br>

        <label>Wachtwoord:</label>
        <input type="password" name="password" required>

        <br>

        <label>Herhaal Wachtwoord:</label>
        <input type="password" name="password_confirm" required>

        <input type="hidden" name="role" value="user">

        <br><br>

        <button type="submit">Registreren</button>
    </form>

        <?php if (isset($_SESSION['error'])): ?>
        <p style="color:red;">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>


    <a href="login.php">Heb je al een account?</a>

</body>
</html>