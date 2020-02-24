<!DOCTYPE html>
<html class="background">

<head>

    <title>Bit_Manager</title>
    <link rel="icon" type="icon.png" href="img/bit(1).png">
    <link rel="stylesheet" href="homepage.css">


</head>

<body>

    <div class="sidebar">
        <a href="Account">Account</a>
        <a href="addpass">Wachtwoord toevoegen</a>
        <a href="help">Help</a>
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
                <label class="letter">Wachtwoord lengte</label>
                <input type="number" id="length" min='4' max='20' value='20' />
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


    </div>





</body>
<script src="genarator.js"></script>
<script src="https://kit.fontawesome.com/8d581dbd68.js" crossorigin="anonymous">
</script>
</body>