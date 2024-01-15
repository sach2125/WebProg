<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Удаление сообщения
    session_start();
    $query = "DELETE FROM messages WHERE id = ? AND user_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $id, $_SESSION['username']);
    $stmt->execute();

    // Перенаправление на главную страницу
    header("Location: ../pages/messages.php");
    exit;
}
?>
