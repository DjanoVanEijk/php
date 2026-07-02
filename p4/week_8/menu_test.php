<?php
session_start();
if (isset($_SESSION['user'])) {
    echo "Ingelogd";
} else {
    echo "Niet ingelogd";
}
?>