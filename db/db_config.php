<?php
$servername = "localhost:3306";
$username = "root";
$password = "AdminAdmin###123";
$dbname = "dubnafinal";

// Установка соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
