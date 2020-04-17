<?php

if(isset($_POST["reset-request-submit"])){


    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(23);

    $url = "http://localhost/Scrum%202.0/create-new-password.php?selector=" . $selector . "&validator" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'connect.php';

    $userEmail = $POST["Email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($dsn);
    if (!msqli_stmt_prepair($stmt, $sql)) {
        echo "Oeps er ging iets mis!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "s",$userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
}
   

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
   
    if (!msqli_stmt_prepair($stmt, $sql)) {
        echo "Oeps er ging iets mis!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "s",$userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close();

$to = $userEmail;

$subject = 'Wachtwoord Bit_Manager resetten';

$message = '<p>We hebben uw wachtwoord reset verzoek ontvangen. De link om uw wachtwoord te resetten bevind zich hieronder.
Als U dit verzoek niet heeft aangevraagt, kunt U deze mail negeren.</p>';
$message .= '<p> Hierbij uw wachtwoord reset link: </br>';
$message .= '<a href="' . $url .'">' . $url .'</a></p>';

$headers = "From: Bit_Manager <info.bit.manager@gmail.com>\r\n";
$headers .= "Reply-To: info.bit.manager@gmail.com\r\n";
$headers .= "Content-type: text/html\r\n";

mail($to, $subject, $message, $headers);

header("Location: ../reset_password.php?reset=success");

} else{

    header("Location: ../index.php");

}