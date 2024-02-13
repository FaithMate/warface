<?php
session_start();

// задані користувачем ім'я користувача та пароль
$username = $_POST['username'];
$password = $_POST['password'];

// Тут ви встановлюєте правильні ім'я користувача та пароль
$correct_username = 'admin';
$correct_password = 'admin123';

if($username === $correct_username && $password === $correct_password) {
    $_SESSION['admin'] = true;
    header("Location: ../../admin_dashboard.php");
    exit();
} else {
    // повернення до сторінки входу з помилкою
    header("Location: login.php?error=Incorrect username or password");
    exit();
}
