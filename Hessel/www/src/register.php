<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>
<body>
<header>
    <h1>Register</h1>
</header>

<div id="intro">
    <h2>Register page</h2>
</div>
<form action="" method="post" id="registerform">
    <label for="frstname">Voornaam: <br></label><input type="text" name="firstname" id="firstname" placeholder="Voornaam" required><br><br>
    <label for="lastname">Achternaam: <br></label><input type="text" name="lastname" id="lastname" placeholder="Achternaam" required><br><br>
    <label for="street">Straat: <br></label><input type="text" name="street" id="street" placeholder="straat" required><br><br>
    <label for="address">Adres: <br></label><input type="text" name="address" id="address" placeholder="Adres" required><br><br>
    <label for="postalcode">Postcode: <br></label><input type="text" name="postalcode" id="postalcode" placeholder="Postcode" required><br><br>
    <label for="town">Stad: <br></label><input type="text" name="town" id="town" placeholder="Stad" required><br><br>
    <label for="phone">Tel. nummer: <br></label><input type="text" name="phone" id="phone" placeholder="Tel. nummer" required><br><br>
    <label for="email">Email: <br></label><input type="email" name="email" id="email" placeholder="Email" required><br><br>
    <label for="studentnumber">Email: <br></label><input type="text" name="studentnumber" id="studentnumber" placeholder="studentnumber" required><br><br>
    <label for="password">Wachtwoord: <br></label><input type="password" name="password" id="password" placeholder="Wachtwoord" required><br><br>
    <label for="repassword">Herhaal wachtwoord: <br></label><input type="password" name="repassword" id="repassword" placeholder="Herhaal wachtwoord:" required><br><br>
    <input type="submit" name="submit" id="register" value="Registrer">
    <a shref="index.php">Login</a>
</form>
<?php
//connect to database and check if connection succeeded yes or no
try {
	$database = new PDO('sqlite:portfolio.db');
	$database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
} catch(PDOException $e) {
	echo $e->getMessage();
}

//checking inserted data if username already exists
if(isset($_POST["submit"])) {
	$firstname = htmlspecialchars($_POST["firstname"]);
	$lastname = htmlspecialchars($_POST["lastname"]);
	$address = htmlspecialchars($_POST["address"]);
	$street = htmlspecialchars($_POST["street"]);
	$postalcode = htmlspecialchars($_POST["postalcode"]);
	$town = htmlspecialchars($_POST["town"]);
	$phone = htmlspecialchars($_POST["phone"]);
	$email = htmlspecialchars($_POST["email"]);
	$studentnumber = htmlspecialchars($_POST["studentnumber"]);
	$password = htmlspecialchars($_POST["password"]);
	$repassword = htmlspecialchars($_POST["repassword"]);

	$query = "SELECT email FROM user";
	$usertest = $database->prepare($query);

	try {
		$usertest->execute();
		$usertest->setFetchMode(PDO::FETCH_ASSOC);
		foreach ($usertest as $test) {
			if($test['email'] === $email) {
				echo "<p style='color: red; text-align: center;'>Email bestaat al</p>";
				exit;

			}
		}

	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	//check if passwords match
	if($password != $repassword) {
		echo "<p style='color: red; text-align: center;'>Passwords do not match</p>";
		exit;
	}


	//hash the password for safety
	$passwordhash = password_hash($password, PASSWORD_BCRYPT);

	$query = "INSERT INTO user (firstname, lastname, address, street, postcode, city, phonenumer, email, street, password, studentnummer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$insert = $database->prepare($query);

	//insert all in database
	$data = array($firstname, $lastname, $address, $street,$postalcode, $town, $phone, $email, $user, $passwordhash, "1");
	try {
		$insert->execute($data);
		$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color: green; text-align: center;'>User added</p>";
	} catch (PDOException $e) {
		echo $e->getMessage();
		echo "<p style='color: red; text-align: center;'>User NOT added!!</p>";
	}
}
?>
<footer>
    <p>Gemaakt door: Hossel -<?php echo date("M Y"); ?></p>
</footer>
</body>
</html>