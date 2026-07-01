<?php
session_start();
require "../includes/check_login.php";
require "../includes/db.php";

$id = $_GET['id'] ?? null;

if ($id) {

    $sql = "DELETE FROM huiswerk WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);
}

header("Location: huiswerk.php");
exit;