<?php 
require 'connect.php'; 



if (isset($_POST['aanpassen'])){
    $usName = $_SESSION['username'];
    $wwnaam = $_POST['Wwname'];
    $wachtwoord = $_POST['Password'];
    $link = $_POST['Link'];

    $edditaccount = "UPDATE bit_manager.accounts SET wachtwoord=?, link=? WHERE wwNaam=?";

    $pdo->prepare($edditaccount)->execute([$wachtwoord, $link, $wwnaam]);

    header('Location: homepage.php');
}
?>
<!DOCTYPE html>
<html>
<head>

    <title>Bit_Manager</title>
    <link rel="icon" type="icon.png" href="img/bit(1).png">
    <link rel="stylesheet" href="ww_aanpassen.css">

</head>
<body>
<a class="home_back" href="homepage.php">terug</a>
  
<div class="border">
        <img src="img/Bit.png" alt="logo">
        <form method="POST" action="">
            <h3>Naam site:</h3>
            <input type="text" style="border-radius: 5px;" name="Wwname"><br>
            <h3> Nieuw wachtwoord:</h3>
            <input type="text" style="border-radius: 5px;" name="Password"><br>
            <h3>Link aanpassen:</h3>
            <input type="text" style="border-radius: 5px;" name="Link"><br><br>
            <input type="submit" id="toevoegen" name="aanpassen" style="border-radius: 5px;" value="Wachtwoord aanpassen">
        </form>
    </div>
</body>

</html> 
