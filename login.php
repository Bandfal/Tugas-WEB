<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style_login.css">
    <title>Login Page</title>
</head>
<body>
	<div class="login-container">
		<h2>Login Page</h2>
		<form action="login.php" method="post">
			<label>Username :</label>
			<input type="text" name="username" placeholder="Username">
			<br>
			<label>Password :</label>
			<input type="password" name="password" placeholder="Password">
			<br>
			<button type="submit" class="" name="Login">Login</button>
		</form>
	
		<p>Belum punya akun? Yuk <a href="registrasi.php">Registrasi</a></p>
	</div>
</body>
</html>

<?php 
	session_start();
 
	include 'connect.php';

	if (isset($_POST['Login'])) {
		$username = $_POST['username'];
		// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	 
		$query = mysqli_query($connect,"SELECT * from user where username='$username'");
		 
		$cek = mysqli_fetch_array($query);
		 
		if(password_verify($_POST["password"], $cek["password"])){
			$_SESSION['username'] = $username;
			$_SESSION['status'] = "login";
	
			header("location:lihat_data.php");
		}else{
			echo "<script>alert('Incorrect username and password');
			document.location.href='login.php'</script>\n";
		}
	}
 
?>