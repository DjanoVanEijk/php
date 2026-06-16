

<?php
$password = "my_password";
$hashed_password = password_hash($password, PASSWORD_DEFAULT); 
echo "Origineel wachtwoord: " . $password . "<br>";
echo "Gehashte wachtwoord: " . $hashed_password . "<br>";
echo "de hash ziet er anders uit elke keer dat je het uitvoert, omdat er een unieke salt wordt gebruikt bij het hashen van het wachtwoord. <br> dit is goed omdat het de veiligheid van het gehashte wachtwoord verhoogt, omdat het moeilijker maakt voor aanvallers om te raden of te kraken. <br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>