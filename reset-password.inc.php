<?php

if (isset($_POST['reset-password-submit'])) {
    
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password || empty($passwordRepeat))) {
        header("Location: ../index.php?newpwd=empty");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: ../create-new-password.php?newpwdnotsame");
        exit();
    }

    $currentDate = date("U");

    require 'connect.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($dsn);
    if (!msqli_stmt_prepair($stmt, $sql)) {
        echo "Oeps er ging iets mis!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt, $currentDate);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "Er is helaas iets mis gegaan probeer uw wachtwoord opnieuw te resetten.";
            exit();
        }

        else {
            
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {
                echo "Er is helaas iets mis gegaan probeer uw wachtwoord opnieuw te resetten.";
                exit();
            } elseif ($tokenCheck === true) {
                
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE emailUsers=?;";
                $stmt = mysqli_stmt_init($dsn);
                if (!msqli_stmt_prepair($stmt, $sql)) {
                    echo "Oeps er ging iets mis!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "Er was een error!";
                        exit();
                    } else {
                        
                        $sql = "UPDATE users SET password=? WHERE username=?";
                        $stmt = mysqli_stmt_init($dsn);
                if (!msqli_stmt_prepair($stmt, $sql)) {
                    echo "Oeps er ging iets mis!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    


                    $sql = "UPDATE pwdReset SET password=? WHERE pwdResetEmail=?";
                        $stmt = mysqli_stmt_init($dsn);
                if (!msqli_stmt_prepair($stmt, $sql)) {
                    echo "Oeps er ging iets mis!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?newpwd=passwordupdated");
                }

                    }

                }

            }

        }
}

} else {
    header("Location: ../index.php");
}