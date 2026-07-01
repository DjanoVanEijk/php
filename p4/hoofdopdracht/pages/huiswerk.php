<?php
session_start();
require "../includes/check_login.php";
require "../includes/db.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $vak = trim($_POST['vak'] ?? '');
    $punten = $_POST['punten'] ?? '';
    $deadline = $_POST['deadline'] ?? '';

    if (empty($vak)) {
        $errors[] = "Vak is verplicht.";
    }

    if (strlen($vak) < 3) {
        $errors[] = "Vak moet minimaal 3 tekens bevatten.";
    }

    if (strlen($vak) > 50) {
        $errors[] = "Vak mag maximaal 50 tekens bevatten.";
    }

    if (empty($punten) || !is_numeric($punten) || $punten < 0 || $punten > 10) {
        $errors[] = "Punten moet een getal tussen 0 en 10 zijn.";
    }

    if (empty($deadline)) {
        $errors[] = "Deadline is verplicht.";
    }

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
 <div>
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

    <?php
    if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    }
    ?>

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

<div>
            <h2>Huiswerk overzicht</h2>

            <?php
            $huiswerk = $conn->prepare("SELECT * FROM huiswerk");
            $huiswerk->execute();
            $doosje_met_huiswerk = $huiswerk->fetchAll(PDO::FETCH_ASSOC);

            echo "<ul>";

            foreach ($doosje_met_huiswerk as $huiswerkdeel){

                echo "<li>";
                echo $huiswerkdeel['vak'] . " - ";
                echo $huiswerkdeel['punten'] . " punten - ";
                echo "Deadline: " . $huiswerkdeel['deadline'];

                echo ' <a href="delete.php?id=' . $huiswerkdeel['id'] . '">Verwijderen</a>';
                echo ' <a href="edit.php?id=' . $huiswerkdeel['id'] . '">Bewerken</a>';

                echo "</li>";
            }

            echo "</ul>";
            ?>
        </div>

<?php require "../includes/footer.php"; ?>