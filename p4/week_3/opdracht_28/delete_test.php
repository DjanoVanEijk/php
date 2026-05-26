<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $title = "Nieuwe title";
    $id = 1;

    $sql = "DELETE FROM delete_test WHERE id = ?

";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    echo "succesvol verwijderd!";

} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>