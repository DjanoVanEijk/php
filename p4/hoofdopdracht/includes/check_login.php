<?php
if (!isset($_SESSION['userid'])) {
    header("Location: /php/p4/hoofdopdracht/pages/login.php");
    exit;
}
?>
