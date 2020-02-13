<!DOCTYPE html>
<html class="background">

<head>

    <meta charset="UTF-8">
    <link href="img/bit(1).png" rel="icon" type="icon.png" />
    <title>Bit_Manager</title>
    <link rel="stylesheet" href="registratie_style.css">

</head>

<body>
    <div class="border">
        <img src="img/Bit.png" alt="logo">
        <h2>Aanmelden</h2>
        <form action="">
            <h3>Voornaam:</h3>
            <input style="border-radius:5px ;" type="text" id="fname" name="fname" required>
            <h3>Achternaam:</h3>
            <input style="border-radius:5px ;" type="text" id="lname" name="lname" required>
            <h3>Geboorte Datum:</h3>
            <input style="border-radius:5px ;" type="date" id="birth" name="birth" required>
            <h3>E-Mail:</h3>
            <input style="border-radius:5px ;" type="email" id="email" name="email" required>
            <h3>Geslacht:</h3>
            <select id="geslacht" required>
                <option value="" disabled selected hidden>Geslacht</option>
                <option value="Man">Man</option>
                <option value="Vrouw">Vrouw</option>
                <option value="Anders">Anders</option>
                <option value="Wil ik liever niet zeggen">Wil ik liever niet zeggen</option>
              </select>
            <h3>Wachtwoord:</h3>
            <input style="border-radius:5px ;" type="password" id="pass" name="pass" required>
            <br>
            <br>
            <input type="submit" style="border-radius:5px ;" value="Account Maken">
            <button style="border-radius: 5px;"><a href="Login.html">Ik heb al een account</a></button>

        </form>

    </div>


</body>

</html>