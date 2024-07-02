<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Регистрация</h1>
<form action="../scripts/registration_function.php" method="POST">
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname" required maxlength="50"><br>

    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required maxlength="50"><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="login">Логин:</label>
    <input type="text" id="login" name="login" required maxlength="50"><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required minlength="6"><br>

    <button type="submit">Зарегистрироваться</button>
</form>
</body>
</html>
