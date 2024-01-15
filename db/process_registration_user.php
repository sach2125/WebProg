<?php
// Подключение к базе данных
require_once 'db_config.php';

// Получение данных из формы
$username = $_POST['username'];
$password = $_POST['password'];

// Подготовленный запрос для проверки существования пользователя
$checkUserQuery = $conn->prepare("SELECT username FROM users WHERE username = ?");
$checkUserQuery->bind_param("s", $username);
$checkUserQuery->execute();
$checkUserQuery->store_result();

if ($checkUserQuery->num_rows > 0) {
    echo "Пользователь с таким именем уже существует";
} else {
    // Подготовленный запрос для вставки данных пользователя
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    // Выполнение запроса
    if ($stmt->execute()) {
        echo "Регистрация прошла успешно! <a href='../index.html'>На главную</a>";
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }
}

// Закрытие подключения и запроса
$stmt->close();
$checkUserQuery->close();
$conn->close();

?>
