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
    <title>Iets</title>
</head>
<body>
<form>
    <input type="text" name="vak" value="<?= $item['vak'] ?>">
    <input type="number" name="punten" value="<?= $item['punten'] ?>">
    <input type="date" name="deadline" value="<?= $item['deadline'] ?>">
    <button type="submit">Edit</button>
</form>

</body>
</html>