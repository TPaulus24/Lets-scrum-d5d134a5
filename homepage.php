<?php
require 'connect.php';
$usName = $_SESSION['username'];
if(isset($_POST['zoeken'])) {
    $zoekvar = $_POST['zoeken'];
}else{
    $zoekvar = "";
}

$test = "test";
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
        <a class="help" href="hulp_page.php">Help</a>
        <a class="logout" href="index.php">Uitloggen</a>
    </div>

    <div class="logo">
        <img src="img/Bit.png" alt="logo">
    </div>

    <div class="wrapper">
        <div class="search-box">
        <form method="POST" action="">
            <input name="zoeken" type="text" placeholder="Search" class="input">
            <button class="button" type="submit" aria-hidden="true">
        </form>
                <i class="fa fa-search" aria-hidden="true"></i>
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
                <label class="letter">Wachtwoord lengte</label>
                <input type="number" id="length" min='8' max='20' value='15' />
            </div>

            <div class="setting">
                <label class="letter">Hooftletters toevoegen</label>
                <input type="checkbox" id="uppercase" checked />
            </div>

            <div class="setting">
                <label class="letter">letters toevoegen</label>
                <input type="checkbox" id="lowercase" checked />
            </div>

            <div class="setting">
                <label class="letter">Nummers toevoegen</label>
                <input type="checkbox" id="numbers" checked />
            </div>

            <div class="setting">
                <label class="letter">symbolen toevoegen</label>
                <input type="checkbox" id="symbols" checked />
            </div>
        </div>
        <button class="btn btn-large" id="generate">
            Genereer Wachtwoord
        </button>
    </div>
    
    <div class="tabel">
            <form action="ww_aanmaak.php">
                <button class="aanmaak" type="submit" style="border-radius: 50%; color: yellowgreen; background-color: orangered; display: flex; justify-content: flex-end; align-items: flex-end; padding: 10px 15px; border-color: black;"> + </button>
            </form>

        <?php
        $stmt = $pdo->query("SELECT id, user, wwNaam, wachtwoord, link FROM accounts WHERE user LIKE '$usName'AND wwNaam LIKE '%$zoekvar%'");
        foreach ($stmt as $row) {
            echo "<p class='letter'><a href=".$row['link'].">".$row['wwNaam']."</a> |"."<a href='ww_aanpassen.php?id=".$row['id']."'> <i class='far fa-edit'></i> </a>" . " " . "" . "" . "<i class='far fa-copy' onclick='Clipboard_CopyTo(\"".$row['wachtwoord']."\")' id='Copypsw'></i> "."<br>";
        }
        ?>
    </div>

    <script src="CoppyButton.js"></script>
    <script src="genarator.js"></script>
    <script src="https://kit.fontawesome.com/8d581dbd68.js" crossorigin="anonymous"></script>

</body>

</html>
