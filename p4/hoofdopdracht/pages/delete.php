<?php

require "../includes/db.php";

// ID ophalen uit URL
$id = $_GET['id'] ?? null;

// controleren of ID bestaat
if ($id) {

    // DELETE query
    $sql = "DELETE FROM huiswerk WHERE id = :id";

    // prepared statement
    $stmt = $conn->prepare($sql);

    // uitvoeren
    $stmt->execute([
        ':id' => $id
    ]);
}

// terug naar index
header("Location: huiswerk.php");
exit;