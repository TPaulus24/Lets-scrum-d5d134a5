<!DOCTYPE html>

<head>
<title>Bit_Manager</title>
<link rel="icon" type="icon.png" href="img/bit(1).png">
<link rel="stylesheet" href="ww_aanpassen.css">
</head>

<body>
<a class="login_back" href="index.php">terug</a>

<div class="border">
    <img src="img/Bit.png" alt="logo">
    <form method="POST" action="include/reset-request.php">
        <input name="Email" type="text" placeholder="E-mail" style="border-radius: 5px;"><br><br>
        <button type="submit" name="reset-request-submit" style="border-radius: 5px;">Verstuur E-mail</button>
    </form>
    <?php
        if (isset($_GET['reset'])) {
            if ($_GET['reset'] == "success") {
                echo '<p class="signupsuccess">Check uw E-mail!</p>';
            }
        }
    ?>
</div>
</body>

</html>