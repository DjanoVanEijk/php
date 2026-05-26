<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p3_app";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $vak = $_POST["vak"];
    $punten = $_POST["punten"];
    $deadline = $_POST["deadline"];

    $sql = "DELETE FROM huiswerk 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header("Location: ../index.php");
    exit;
}

$sql = "SELECT * FROM huiswerk WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$_GET['id']]);

$item = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>

<form method="POST">
    <input type="hidden" name="id" value="<?= $item['id'] ?>">
    <button type="submit">Klik om te verwijderen</button>
</form>

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
</body>
</html>