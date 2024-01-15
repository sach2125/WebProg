<?php
// Подключение к базе данных
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение введенных пользователем данных
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberMe = isset($_POST['rememberMe']) ? 1 : 0;

    // Поиск пользователя в базе данных
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Успешный вход
        session_start();
        $_SESSION['username'] = $username;

        // Перенаправление на главную страницу или другую защищенную страницу
        header("Location: ../pages/messages.php");
        exit;
    } else {
        // Неправильный логин или пароль
        echo "Неправильный логин или пароль. Пожалуйста, попробуйте еще раз.";
    }
} else {
    // Обработка ситуации, когда скрипт был вызван напрямую, а не через POST-запрос
    echo "Доступ запрещен.";
}

// Закрытие подключения
$conn->close();
?>
