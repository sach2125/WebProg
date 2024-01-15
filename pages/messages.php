<?php
session_start();

// Проверка авторизации пользователя

if (!isset($_SESSION['username'])) {
    header("Location: login_form.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Минитвиттер</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.html">Главная</a></li>
            <li><a href="../pages/registrationForm.html">Регистрация участников</a></li>
            <li><a href="../pages/registered_users.php">Участники</a></li>
            <li><a href="../phpmyadmin/index.php">PHPMyAdmin</a></li>
            <li><a href="../pages/photoGallery.html">Фотогалерея</a></li>
            <li><a href="../pages/messages.php">Минитвитер</a></li>
            <li><a href="../pages/test.html">Тест</a></li>
            <li><a href="../pages/about.html">О сайте</a></li>
        </ul>
    </nav>
    <h1>Минитвиттер</h1>
    <form action="../db/add_message.php" method="post">
        <label for="message">Отправить сообщение:</label><br>
        <input type="text" id="message" name="message" required><br>
        <input type="submit" value="Отправить">
    </form>

    <?php
        
        require_once '../db/db_config.php';

        // Получение всех сообщений из базы данных
        $query = "SELECT id, user_name, content, created_at FROM messages";
        $result = $conn->query($query);

        // Отображение сообщений в виде таблицы
        echo "<table>";
        echo "<tr><th>ID</th><th>Отправитель</th><th>Сообщение</th><th>Дата создания</th><th>Удалить</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['content'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "<td><a href='../db/delete_message.php?id=" . $row['id'] . "'>Удалить</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    
</body>
</html>
