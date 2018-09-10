<?php
require "includes/config.php";
include "function.php";
session_start();

if(isset($_GET['action']) && $_GET['action'] == 'logout') {
	$_SESSION['korisnik_login'] = null;
	unset($_SESSION['korisnik_login']);
	header("Location: index.php");
	exit;
}

$error = false;


if(isset($_POST['submit'])) {
	$username = db_escape($_POST['username']);
	$password = db_escape($_POST['password']);
	$password = sha1($password);
	
	$query = "SELECT * FROM korisnici WHERE `username` = '$username' AND `password` = '$password'";
	$res = mysqli_query($connection, $query);
	if(mysqli_num_rows($res) > 0){
     $_SESSION['korisnik_login'] = $username;
		header("Location: index.php");
		exit;
	} else {
		$error = 'Pogrešni podaci. ';
	}
}






?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/signin.css">

    <title>Amplitudo</title>
	
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body class="text-center">
	<form class="form-signin" method="post" action="login.php">
		<h1 class="h3 mb-3 font-weight-normal">Molimo ulogujte se</h1>
		<?php if($error) { ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $error; ?>
		</div>
		<?php } ?>
		<label for="inputUsername" class="sr-only">Korisnik</label>
		<input  type="text" id="inputUsername" name="username" class="form-control" placeholder="Korisnik" required autofocus <?php if(isset($_POST['username'])) { echo 'value="' . ($_POST['username']) . '" '; } ?>>
		<label for="inputPassword" class="sr-only">Lozinka</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Lozinka" required>
		<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Prijavi se</button>
	</form>
</body>
</html>