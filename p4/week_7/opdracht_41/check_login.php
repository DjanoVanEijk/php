<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "Niet ingelogd";
} else {
    echo "Welkom!";
}
?>