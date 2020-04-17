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
    <?php
        $selector = $get["selector"];
        $validator = $get["validator"];

        if (empty($selector || empty($validator))) {
            echo "Sorry, wij konden uw verzoek niet valideren.";
        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>

                <form action="reset-password.php" method="POST">

                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                <input type="password" name="pwd" placeholder="Nieuw wachtwoord...">
                <input type="password" name="pwd-repeat" placeholder="Herhaal nieuw wachtwoord...">
                <button type="submit" name="reset-password-submit">Wachtwoord resetten</button>
            </form>





            <?php
            }
        }
        


    ?>
   
</div>
</body>

</html>