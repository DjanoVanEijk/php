<?php
session_start();
session_destroy();

echo "Successvol uitgelogd. <br> <a href='login.php'>Opnieuw inloggen</a> <br> <a href='../index.php'>Home</a>";
exit;