<?php
require 'connect.php';
$usName = $_SESSION['username'];
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
        <a href="account.php">Account</a>
        <a class="addpass" href="ww_aanmaak.php">Wachtwoord toevoegen</a>
        <a class="help" href="hulp_page.php">Help</a>
        <a class="logout" href="Login.php">Uitloggen</a>
    </div>
    <div class="logo">
        <img src="img/Bit.png" alt="logo">
    </div>
    <div class="wrapper">
        <div class="search-box">
            <input type="text" placeholder="Search" class="input">
            <div class="button">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
        </div>
    </div>


    <div class="container">
        <h2 class="letter">Wachtwoord Generator</h2>
        <div class="result-container">
            <span id="result"></span>
            <button class="btn" id="clipboard">
                <i class="far fa-clipboard"></i>
            </button>
        </div>
        <div class="settings">
            <div class="setting">
                <label class="letter" for="length">Wachtwoord Lengte</label>
                <input type="number" id="length" min="4" max="20" value="20"></input>
            </div>
            <div class="setting">
                <label class="letter" for="uppercase">Hoofdletters Bevatten</label>
                <input type="checkbox" id="uppercase" checked></input>
            </div>
            <div class="setting">
                <label class="letter" for="numbers">Nummers Bevatten</label>
                <input type="checkbox" id="numbers" checked></input>
            </div>
            <div class="setting">
                <label class="letter" for="symbols">Symbolen Toevoegen</label>
                <input type="checkbox" id="symbols" checked></label>
            </div>
        </div>
        <button class="btn btn-large" id="genarate">Wachtwoord Genereren</button>

    </div>
    <div class="tabel">
        <?php
        $stmt = $pdo->query("SELECT user, wwNaam, wachtwoord, link FROM accounts WHERE user LIKE '$usName'");
        foreach ($stmt as $row) {
            echo "<p class='letter'><a href='http://" . $row['link'] . "'>" . $row['wwNaam'] . "</a> | " . $row['wachtwoord'] . "<br>";
        }
        ?>
    </div>

    <script src="genarator.js"></script>
    <script src="https://kit.fontawesome.com/8d581dbd68.js" crossorigin="anonymous"></script>
</body>

</html>
