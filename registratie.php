<?php   
require 'connect.php';

if (isset($_POST['account'])) {
    $voornaam = $_POST['fname'];
    $achternaam = $_POST['lname'];
    $geboortedatum = $_POST['birth'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['pass'];

    $createaccount = "INSERT INTO users(naam, achternaam, DOB, username, password)VALUES (?, ?, ?, ?, ?)";

    $pdo->prepare($createaccount)->execute([$voornaam, $achternaam, $geboortedatum, $email, $wachtwoord]);
}

?>


<!DOCTYPE html>
<html class="background">

<head>

    <meta charset="UTF-8">
    <link href="img/bit(1).png" rel="icon" type="icon.png" />
    <title>Bit_Manager</title>
    <link rel="stylesheet" href="registratie_style.css">

</head>

<body>
<a class="login_back" href="index.php">terug</a>

    <div class="border">
        <img src="img/Bit.png" alt="logo">
        <h2>Aanmelden</h2>
        <form action="registratie.php" method="POST">
            <h3>Voornaam:</h3>
            <input style="border-radius:5px ;" type="text" id="fname" name="fname" required>
            <h3>Achternaam:</h3>
            <input style="border-radius:5px ;" type="text" id="lname" name="lname" required>
            <h3>Geboorte Datum:</h3>
            <input style="border-radius:5px ;" type="date" id="birth" name="birth" required>
            <h3>E-Mail:</h3>
            <input style="border-radius:5px ;" type="email" id="email" name="email" required>
            <h3>Wachtwoord:</h3>
            <input style="border-radius:5px ;" type="password" id="pass" name="pass" required>
            <br>
            <br>
            <input type="submit" name="account" style="border-radius:5px ;" value="Account Maken">
            <button style="border-radius: 5px;"><a href="Login.php">Ik heb al een account</a></button>

        </form>

    </div>


</body>

</html>