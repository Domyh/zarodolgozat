<?php

require 'system/includes.php';

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: admin_login.php");
    exit;
}

if(isset($_GET['logout']))
{
    session_destroy();
    session_unset();
    header('location: admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>admin main</title>
		<link rel="stylesheet" href="./assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
		<script src="./assets/popper.min.js"></script>
		<script src="./assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./assets/style.css">
		<style>
			main {
			height: 100vh;
			height: -webkit-fill-available;
			max-height: 100vh;
			overflow-x: auto;
			overflow-y: hidden;
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
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="?w">Domyh's Parts - Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="?brands">Car brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?models">Car models</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?parts">Parts</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Logged in as <?php echo '(' . $_SESSION['id'] . ') ' . $_SESSION['username']; ?> | <a href="?logout">[log out]</a>
                    </span>
                </div>
            </div>
        </nav>

        <div class="text-white">
            <?php
                if (isset($_GET['brands'])) require('./pages/admin_brands.php');
                else if (isset($_GET['addBrand'])) require('./pages/admin_add_brand.php');
                else if (isset($_GET['modifyBrand'])) require('./pages/admin_modify_brand.php');

                else if (isset($_GET['models'])) require('./pages/admin_models.php');
                else if (isset($_GET['addModel'])) require('./pages/admin_add_model.php');
                else if (isset($_GET['modifyModel'])) require('./pages/admin_modify_model.php');

                else if (isset($_GET['parts'])) require('./pages/admin_parts.php');
                else if (isset($_GET['addPart'])) require('./pages/admin_add_part.php');
                else if (isset($_GET['modifyPart'])) require('./pages/admin_modify_part.php');

                else require('./pages/admin_welcome.php');
            ?>
        </div>
	</body>
</html>