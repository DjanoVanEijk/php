<?php
session_start();

if (isset($_SESSION['userid'])) {
    header("Location: logout.php");
    exit;
}

header("Location: login.php");
exit;
