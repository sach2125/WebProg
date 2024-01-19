<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" sizes="96x96" rel="icon" href="../img/icons8-hp-96.png">
    <title>Вход на сайт</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        p {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <form action="../db/process_login.php" method="post">
        <h2>Вход на сайт</h2>
        <input type="text" name="username" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <label for="rememberMe">Автоматический вход:</label>
        <input type="checkbox" id="rememberMe" name="rememberMe">
        <input type="submit" value="Войти">
        Еще нет аккаунта? <a href="registrationUserForm.html">Зарегистрируйтесь здесь</a>
    </form>
    <!--<br><p>Еще нет аккаунта? <a href="registrationUserForm.html">Зарегистрируйтесь здесь</a>.</p>-->
</body>
</html>
