
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin-Log</title>
	<link rel="icon" type="image/x-icon" href="./img/logo.svg">
	<link rel="stylesheet" href="./styles/main.css">
	<link rel="stylesheet" href="./styles/reset.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="jflex">
        <form action="./components/php-back/login.php" method="post" class="admin-login-wrapp">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
