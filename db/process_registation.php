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
            <li><a href="#aboutSite">О сайте</a></li>
        </ul>
  </nav>


    <?php
        // Подключение к базе данных
        require_once 'db_config.php';

        // Получение данных из формы
        $fullName = $_POST['fullName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $section = $_POST['section'];
        $dob = $_POST['dob'];
        $presentation = $_POST['presentation'];
        $topic = $_POST['topic'];

        // SQL запрос для вставки данных в базу
        $sql = "INSERT INTO registrations (full_name, phone, email, section, dob, presentation, topic)
        VALUES ('$fullName', '$phone', '$email', '$section', '$dob', '$presentation', '$topic')";

        if ($conn->query($sql) === TRUE) {
            echo "Регистрация прошла успешно!";
        } else {
            echo "Ошибка при регистрации: " . $conn->error;
        }


        // Закрытие подключения
        $conn->close();
    ?>

    <h2>Результаты регистрации</h2>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p><strong>ФИО:</strong> " . $_POST['fullName'] . "</p>";
            echo "<p><strong>Телефон:</strong> " . $_POST['phone'] . "</p>";
            echo "<p><strong>Email:</strong> " . $_POST['email'] . "</p>";
            echo "<p><strong>Секция конференции:</strong> " . $_POST['section'] . "</p>";
            echo "<p><strong>Дата рождения:</strong> " . $_POST['dob'] . "</p>";
            echo "<p><strong>Доклад:</strong> " . $_POST['presentation'] . "</p>";
            if (isset($_POST['topic'])) {
                echo "<p><strong>Тема доклада:</strong> " . $_POST['topic'] . "</p>";
            }
        } else {
            echo "<p>Данные не отправлены.</p>";
        }
    ?>
</body>
</html>
