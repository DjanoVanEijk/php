<?php
// Inclusie van databaseverbinding
require "../includes/db.php";

// Start de sessie om berichten tussen pagina's door te geven
session_start();

// Array voor foutmeldingen
$errors = [];

// Controleer of het formulier is verzonden via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Haal de ingevoerde waarden op en trim ze
    $vak = trim($_POST['vak'] ?? '');
    $punten = $_POST['punten'] ?? '';
    $deadline = $_POST['deadline'] ?? '';

    // Validatie van vak
    if (empty($vak)) {
        $errors[] = "Vak is verplicht.";
    }

    if (strlen($vak) < 3) {
        $errors[] = "Vak moet minimaal 3 tekens bevatten.";
    }

    if (strlen($vak) > 50) {
        $errors[] = "Vak mag maximaal 50 tekens bevatten.";
    }

    // Validatie van punten
    if (empty($punten) || !is_numeric($punten) || $punten < 0 || $punten > 10) {
        $errors[] = "Punten moet een getal tussen 0 en 10 zijn.";
    }

    // Validatie van deadline
    if (empty($deadline)) {
        $errors[] = "Deadline is verplicht.";
    }

    // Als er geen fouten zijn, voeg het huiswerk toe aan de database
    if (empty($errors)) {
        $sql = "INSERT INTO huiswerk (vak, punten, deadline) VALUES (:vak, :punten, :deadline)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['vak' => $vak, 'punten' => $punten, 'deadline' => $deadline]);
        $_SESSION['success'] = "Opslaan gelukt!";
        header("location: huiswerk.php");
        exit();
    }
}

?>

<?php require "../includes/header.php"; ?>

 <div class="container">
<!-- Formulier voor het toevoegen van huiswerk -->
 <h2>Huiswerk toevoegen</h2>
    <form method="POST">
    <label>Vak</label><br>
    <input name="vak" type="text" value="<?= htmlspecialchars($vak ?? '') ?>"><br><br>
    <label>Punten</label><br>
    <input name="punten" type="number" min="0" max="10" value="<?= htmlspecialchars($punten ?? '') ?>"><br><br>
    <label>Deadline</label><br>
    <input name="deadline" type="date" value="<?= htmlspecialchars($deadline ?? '') ?>"><br><br>
    <button type="submit">Submit</button>
    </form>

    <!-- Toon succesbericht als het is ingesteld in de sessie -->
    <?php
    if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    }
    ?>

<!-- Toon foutmeldingen als er fouten zijn -->
    <?php
    if (!empty($errors)) {
        echo '<div><ul>';
        foreach ($errors as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        echo '</ul></div>';
    }
    ?>
</div>



 <div class="container">
<!-- Haal alle huiswerk uit de database en toon ze in een lijst -->
 <h2>Huiswerk overzicht</h2>
     <?php
        $huiswerk = $conn->prepare("SELECT * FROM huiswerk");
        $huiswerk->execute();
        $doosje_met_huiswerk = $huiswerk->fetchAll(PDO::FETCH_ASSOC);

        echo "<ul>";
        foreach ($doosje_met_huiswerk as $huiswerkdeel){
        echo "<li>" . $huiswerkdeel['vak'] . " - " . $huiswerkdeel['punten'] . " punten - Deadline: " . $huiswerkdeel['deadline'] . "</li>";
        }
        echo "</ul>";
        ?>
</div>

<?php require "../includes/footer.php"; ?>