<?php
session_start();

if (isset($_SESSION['userid'])) {
    header("Location: ../index.php");
    exit;
}
?>

<h2>Inloggen</h2>

<form method="POST" action="login-check.php">
    <label>Email:</label>
    <input type="email" name="email" required>

    <br>

    <label>Password:</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Login</button> 
</form>

<?php if (isset($_SESSION['error'])): ?>
    <p style="color:red;">
        <?= $_SESSION['error']; ?>
    </p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<a href="register.php">maak een account</a>