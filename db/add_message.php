<?php
session_start();
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];
    $username = $_SESSION['username'];

    // Вставка сообщения в базу данных
    $query = "INSERT INTO messages (user_name, content) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('is', $username, $message);
    $stmt->execute();
    
    // Перенаправление на главную страницу
    header("Location: ../pages/messages.php");
    exit;
}
?>
