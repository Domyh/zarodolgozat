<?php
require 'system/includes.php';

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: admin_main.php");
    exit;
}

$error_return = '';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (!$username || !$password || !(strlen($username) > 0) || !(strlen($password) > 0))
	{
		$error_return = "Username and/or password must not be empty";
	}
	else
	{
		$passwordhash = hash('sha512', $password);
		global $db;
		$sql = 'select * from accounts where username = ? and password = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$username, $passwordhash]);
		$res = $stmt->fetchAll();
		if (count($res) != 1)
		{
			$error_return = 'Failed to log in';
		}
		else
		{
			$_SESSION['loggedin'] = true;
			$_SESSION['id'] = $res[0]['id'];
			$_SESSION['username'] = $res[0]['username'];
			header('location: admin_main.php');
			
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin login</title>
		<link rel="stylesheet" href="./assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
		<script src="./assets/popper.min.js"></script>
		<script src="./assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="./assets/style.css">
		<style>
			._container {
			  max-width: 450px;
			  color: #dddddd !important;
        	  margin-top: 15vh;
			}
			
			body {
        margin: 0;
        padding: 0;
        width: 100vw;
        height: 100vh;
        background-repeat: no-repeat;
        background: #000000;
        background: linear-gradient(to bottom right, #800d58 0%,#0f7c80 100%);
        background: -moz-linear-gradient(to bottom right, #800d58 0%, #0f7c80 100%) no-repeat;
        background: -webkit-linear-gradient(135deg, #800d58 0%,#0f7c80 100%);
        background: -o-linear-gradient(top, #800d58 0%,#0f7c80 100%);
        background: -ms-linear-gradient(top, #800d58 0%,#0f7c80 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#800d58', endColorstr='#0f7c80',GradientType);
      }
    
		</style>
	</head>
	<body>
		<div class="container-fluid d-flex align-items-center flex-column vh-100">
			<div class="_container">
				<div class="container p-4 text-right _bg_glass">
					<h2>Log in</h2>
					<h4>Domyh's Parts</h4>
					<hr>
					<?php if ($error_return): ?>
          			<div class="alert alert-danger" id="error"><?php echo $error_return; ?></div>
					<?php endif; ?>
					<form action="admin_login.php" method="post">
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1">Username</span>
							<input type="text" id="username" class="form-control" placeholder="" aria-label="Username" name="username"
								@keydown.enter="doLogin()">
						</div>
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon1">Password</span>
							<input type="password" id="password" class="form-control" placeholder="" aria-label="Password" name="password"
								@keydown.enter="doLogin()">
						</div>
						<div class="text-end">
							<button type="submit" class="btn btn-primary mt-3">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
