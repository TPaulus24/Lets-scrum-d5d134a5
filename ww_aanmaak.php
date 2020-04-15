<?php
require 'connect.php';

if (isset($_POST['toevoegen'])) {
    $usName = $_SESSION['username'];
    $naam = $_POST['wwname'];
    $wachtwoord = $_POST['Password'];
    $link = $_POST['Link'];

    $createaccount = "INSERT INTO accounts(user, wwNaam, wachtwoord, link)VALUES (?, ?, ?, ?)";

    $pdo->prepare($createaccount)->execute([$usName, $naam, $wachtwoord, $link]);

    header('Location: homepage.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Bit_Manager</title>
    <link rel="icon" type="icon.png" href="img/bit(1).png">
    <link rel="stylesheet" type="text/css" href="ww_aanmaak.css">
</head>
<a class="home_back" href="homepage.php">terug</a>


<body>


    <div class="border">
        <img src="img/Bit.png" alt="logo">
        <form method="POST" action="">
            <h3>Naam Wachtwoord:</h3>
            <input type="text" style="border-radius: 5px;" name="wwname"><br>
            <h3>Wachtwoord:</h3>
            <input type="text" style="border-radius: 5px;" name="Password"><br>
            <h3>Link toevoegen:</h3>
            <input type="text" style="border-radius: 5px;" name="Link"><br><br>
            <input type="submit" id="toevoegen" name="toevoegen" style="border-radius: 5px;" value="Wachtwoord toevoegen">
        </form>
    </div>
</body>

</html>