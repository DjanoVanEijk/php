<?php
$wachtwoord = "geheim123";
$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

$test = "geheim123";

if (password_verify($test, $hash)) {
    echo "Correct wachtwoord";
} else {
    echo "Onjuist wachtwoord";
}
?>