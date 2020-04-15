<?php
require 'connect.php';

if (isset($_POST['login'])) {
	$errMsg = '';

	// Get data from FORM
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username == '')
		$errMsg = 'Enter username';
	if ($password == '')
		$errMsg = 'Enter password';

	if ($errMsg == '') {
		try {
			$stmt = $pdo->prepare('SELECT id, naam, username, password FROM users WHERE username = :username');
			$stmt->execute(array(
				':username' => $username
			));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($data == false) {
				$errMsg = "User $username not found.";
			} else {
				if ($password == $data['password']) {
					$_SESSION['name'] = $data['name'];
					$_SESSION['username'] = $data['username'];
					$_SESSION['password'] = $data['password'];

					header('Location: homepage.php');
					exit;
				} else
					$errMsg = 'Password not match.';
			}
		} catch (PDOException $e) {
			$errMsg = $e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Bit_Manager</title>
	<link rel="icon" type="icon.png" href="img/bit(1).png">
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>

<body>


	<div class="login">
		<img src="img/Bit.png" alt="logo"><br>
		<?php
		if (isset($errMsg)) {
			echo $errMsg;
		}
		?>
		<form method="POST" action="">
			<h3>Login Name:</h3>
			<input type="text" style="border-radius: 5px;" name="username"><br>
			<h3>Password:</h3>
			<input type="password" style="border-radius: 5px;" name="password"><br><br>
			<input type="submit" style="border-radius: 5px;" name="login" value="login">
		</form>
		<h3>Ik heb nog geen account ?</h3>
		<a href="registratie.php"><button style="border-radius: 5px;">Registreren</button></a>

		<h3>Wachtwoord vergeten</h3>
		<?php
        	if (isset($_GET['newpwd'])) {
            	if ($_GET['newpwd'] == "passwordupdated") {
                	echo '<p class="signupsuccess">Uw wachtwoord is gereset!</p>';
            	}
        	}
    	?>
		<a href="reset_password.php"><button style="border-radius: 5px;">Wachtwoord reset</button></a>

	</div>
</body>

</html>