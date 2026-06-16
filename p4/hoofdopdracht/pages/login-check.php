<?php
session_start();
require_once "../includes/db.php";

unset($_SESSION['error']);

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$sql = "SELECT ID AS id, username, email, password, role FROM users WHERE email = :email LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ":email" => $email
]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    $_SESSION['error'] = "Ongeldig e-mailadres of wachtwoord";
    header("Location: login.php");
    exit;
}

if (!password_verify($password, $user['password'])) {
    $_SESSION['error'] = "Ongeldig e-mailadres of wachtwoord";
    header("Location: login.php");
    exit;
}

$_SESSION['userid'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['role'] = $user['role'];

header("Location: ../index.php");
exit;