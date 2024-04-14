<?php
    require 'system/includes.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domyh's Parts</title>
    <link rel="stylesheet" href="./assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./assets/popper.min.js"></script>
    <script src="./assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="icon" href="./assets/domyhicon.png" type="image/x-icon">
    <style>
        
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
            <a class="navbar-brand" href="?main">Domyh's Parts</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="?partssearch">Alkatrészek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_login.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?php if (isset($_GET['partID'])) require './pages/partdetails.php';
    elseif (isset($_GET['partssearch'])) require './pages/partssearch.php';
    elseif (isset($_GET['contact'])) require './pages/contact.php';
    else require './pages/mainpage.php'; ?>
</body>
</html>