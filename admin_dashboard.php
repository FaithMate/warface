<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="icon" type="image/x-icon" href="./img/logo.svg">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/reset.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="fdlex">



    
    </div>


</body>

<?php
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: php-back/login.php");
    exit();
}
?>


