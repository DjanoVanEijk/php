<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$sql = "SELECT * FROM get_item WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$_GET['id']]);

$item = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
</head>
<body>

<h1>Details</h1>

<?php if($item): ?>

    <p>ID: <?php echo $item['id']; ?></p>

    <p>Naam: <?php echo $item['naam']; ?></p>

    <p>Beschrijving:<?php echo $item['beschrijving']; ?>
</p>

</body>
</html>