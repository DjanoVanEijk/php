<?php
session_start();
require_once "../includes/db.php";

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$passwordConfirm = $_POST['password_confirm'] ?? '';
$role = 'user';



if ($password !== $passwordConfirm) {
    $_SESSION['error'] = "De wachtwoorden komen niet overeen.";
    header("Location: register.php");
    exit;
}

if (strlen($password) < 8) {
    $_SESSION['error'] = "Het wachtwoord moet minimaal 8 tekens bevatten.";
    header("Location: register.php");
    exit;
}


$sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':email' => $email
]);

if ($stmt->fetch()) {
    $_SESSION['error'] = "Dit e-mailadres is al geregistreerd.";
    header("Location: register.php");
    exit;
}


$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password, role)
        VALUES (:username, :email, :password, :role)";

$stmt = $conn->prepare($sql);

$success = $stmt->execute([
    ':username' => $name,
    ':email' => $email,
    ':password' => $hashedPassword,
    ':role' => $role
]);

if (!$success) {
    $_SESSION['error'] = "Er is iets misgegaan bij het registreren.";
    header("Location: register.php");
    exit;
}


$_SESSION['userid'] = $conn->lastInsertId();
$_SESSION['username'] = $name;

header("Location: ../index.php");
exit;