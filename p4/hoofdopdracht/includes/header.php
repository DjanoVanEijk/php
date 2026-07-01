<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$appNaam = "Kanvas";
$trackerType = "Huiswerk";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanvas</title>
    <link rel="stylesheet" href="/php/p4/hoofdopdracht/style.css">
</head>
<header>
        <h1><?= $appNaam ?></h1>
    </header>
<body>