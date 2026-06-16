<!-- De ECHTE Canvas -->
 
<?php require "includes/header.php"; ?>
<?php require "includes/db.php"; ?>

<main>
    <div class="container">
        <h2><span id="greeting">Hoi</span>, welkom bij <?= $appNaam ?></h2>

        <?php if (!empty($_SESSION['username'])): ?>
            <p>Je bent ingelogd als <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?>.</p>
        <?php endif; ?>

        <?php require "includes/nav.php"; ?>
    </div>
</main>

<?php require "includes/footer.php"; ?>
