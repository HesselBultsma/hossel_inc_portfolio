<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<title>Inlog - Portfolio</title>
</head>
<body>
<header>
</header>

<section class="content">
	<h2>Inloggen</h2>
	<form action="" method="post" id="inlogform">
		<label for="email">email: </label><input type="text" name="email" id="email" placeholder="email" required><br><br>
		<label for="password">Wachtwoord: </label><input type="password" name="password" id="password" placeholder="Password" required><br><br>
		<input type="submit" name="submit" id="submit" value="Login">
		<a href="register.php" id="register">Registreer</a>
	</form>
</section>

<?php
//connect to database and check if connection succeeded yes or no
try {
	$database = new PDO("sqlite:portfolio.db");
	$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
	echo "<p style='color: red; text-align: center'>Connectie niet geslaasgd, probeer later opnieuw</p>";
}

if (isset($_POST['submit'])) {
	//assign data from form to variables
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	//make query and prepare it
	$query = "SELECT * from `user` WHERE username = '{$username}' LIMIT 1";
	$result = $database->prepare($query);

	try {
		$result->execute();
		$result->setFetchMode(PDO::FETCH_ASSOC);

		//check if data in query compares to data from the form and send to another if correct if wrong echo "Username/Passowrd incorrect"
		$check = false;

		foreach ($result as $results) {
			$check = true;
			$user_id = $results['user_id'];
			$roll = $results['roll'];
			$usernamecontrol = $results["email"];
			$passwordcontrol = $results["password"];
			if ($usernamecontrol == $username && password_verify($password, $passwordcontrol)) {
				$_SESSION['loggedin'] = true;
				$user = $username;
				$_SESSION['loggedin'] = $loggedin;
				$_SESSION['email'] = $user;
				$_SESSION['user_ID'] = $user_id;
				$_SESSION['roll'] = $roll;
			}
		}
		if ($check = false) {
			echo "<p style='color: red; text-align: center;'> Gebruikersnaam / Wachtwoord incoreect, probeer opnieuw</p>";
		}
	} catch (PDOException $e) {
		echo "<script>alert('<br>er ging iets fout')";
	}
}
?>

<footer>
	<p>Copyright &copy; Hossel Inc <?php echo date("Y"); ?></p>
</footer>
</body>
</html>