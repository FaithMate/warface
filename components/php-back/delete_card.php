<?php
session_start();

// Перевірте, чи користувач є адміністратором
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    echo json_encode(['success' => false, 'message' => 'Access denied']);
    exit;
}

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
    $stmt->bindValue(1, $id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    if ($result) {
        // У SQLite3 немає affected_rows, тому використовуємо changes()
        if ($conn->changes() > 0) {
            echo json_encode(['success' => true, 'message' => 'Card deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error deleting card']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error executing query']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

$conn->close();
?>
