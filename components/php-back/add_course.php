<?php
require_once 'db.php'; // Підключення до бази даних

function generateUniqueFileName($originalName) {
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    $uniqueName = uniqid('course_', true) . '.' . $extension;
    return $uniqueName;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title'], $_POST['description'], $_POST['price'], $_FILES['image']) && isset($_POST['is_hit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $is_hit = $_POST['is_hit'] ? 1 : 0;
        $image = $_FILES['image'];

        if ($image['error'] === UPLOAD_ERR_OK) {
            $imagePath = './photo/' . generateUniqueFileName($image['name']);
            if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
                echo "Помилка завантаження файлу";
                exit;
            }

            $stmt = $conn->prepare("INSERT INTO courses (title, description, image, price, is_hit) VALUES (?, ?, ?, ?, ?)");

            $stmt->bindValue(1, $title, SQLITE3_TEXT);
            $stmt->bindValue(2, $description, SQLITE3_TEXT);
            $stmt->bindValue(3, $imagePath, SQLITE3_TEXT);
            $stmt->bindValue(4, $price, SQLITE3_FLOAT);
            $stmt->bindValue(5, $is_hit, SQLITE3_INTEGER);

            $result = $stmt->execute();

            if ($result) {
                echo "Курс успішно додано!";
            } else {
                echo "Помилка: " . $conn->lastErrorMsg();
            }
        } else {
            echo "Помилка завантаження файлу";
        }
    } else {
        echo "Не всі обов'язкові поля заповнені";
    }
} else {
    echo "Неправильний запит";
}
