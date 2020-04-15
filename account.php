<?php
require 'connect.php';
$usName = $_SESSION['username'];


$stmt = $pdo->query("SELECT * FROM users WHERE username LIKE '$usName'");
foreach ($stmt as $row) {
    $naam = $row['naam'];
    $achterNaam = $row['achternaam'];
    $dob = $row['DOB'];
    $password = $row['password'];
    $email = $row['username'];
}
?>
<!DOCTYPE html>
<html class="background">

<head>

    <title>Bit_Manager</title>
    <link rel="icon" type="icon.png" href="img/bit(1).png">
    <link rel="stylesheet" href="homepage.css">


</head>

<body>
    <div class="sidebar">
        <a href="homepage.php">Terug</a>
        <a class="help" href="hulp_page.php">Help</a>
        <a class="logout" href="Login.php">Uitloggen</a>
    </div>
    <div class="logo">
        <img src="img/Bit.png" alt="logo">
    </div>
    <div class="tabel">
        <span class="letter">
            <h3>Accountgegevens:</h3><br>
            <h4>Naam:</h4>
            <?php
            echo $naam . " " . $achterNaam . "<br>";
            ?>
            <h4>Geboortedatum:</h4>
            <?php
            echo $dob . "<br>";
            ?>
            <h4>E-mail / gebruikersnaam:</h4>
            <?php
            echo $email;
            ?>
        </span>
    </div>
    <script src="https://kit.fontawesome.com/8d581dbd68.js" crossorigin="anonymous"></script>
</body>

</html>
