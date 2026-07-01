<?php
session_start();
require "../includes/check_login.php";
require "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $vak = $_POST["vak"];
    $punten = $_POST["punten"];
    $deadline = $_POST["deadline"];

    $sql = "UPDATE huiswerk 
            SET vak = ?, punten = ?, deadline = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$vak, $punten, $deadline, $id]);

    header("Location: huiswerk.php");
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
    <title>Edit</title>
</head>
<body>

<form method="POST">
    <input type="text" name="vak" value="<?= $item['vak'] ?>">
    <input type="number" name="punten" value="<?= $item['punten'] ?>">
    <input type="date" name="deadline" value="<?= $item['deadline'] ?>">
    
    <input type="hidden" name="id" value="<?= $item['id'] ?>">

    <button type="submit">Opslaan</button>
</form>

</body>
</html>