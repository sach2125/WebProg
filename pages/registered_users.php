<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Участники</title>
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

  <h2>Зарегистрированные участники</h2>
  <?php
    // Подключение к базе данных
    require_once '../db/db_config.php';

    // Выполнение запроса
    $result = $conn->query("SELECT * FROM registrations");

    echo "<table border='1'>
    <tr>
    <th>Имя</th>
    <th>Телефон</th>
    <th>Email</th>
    <th>Секция</th>
    <th>Дата Рождения</th>
    <th>Доклад</th>
    <th>Тема</th>
    </tr>";

    // Вывод данных в виде таблицы
    while($row = $result->fetch_assoc()) {
      // Преобразование формата даты
      $dobFormatted = date('d.m.Y', strtotime($row['dob']));
      
      echo "<tr>";
      echo "<td>" . $row['full_name'] . "</td>";
      echo "<td>" . $row['phone'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['section'] . "</td>";
      echo "<td>" . $dobFormatted . "</td>";  // Используем новый формат даты
      echo "<td>" . $row['presentation'] . "</td>";
      echo "<td>" . $row['topic'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    $conn->close();
  ?>

</body>
</html>

