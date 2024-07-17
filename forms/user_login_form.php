<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Вход</h1><form action="/directory_project/scripts/user_login.php" method="POST">
    <label for="login">Логин:</label>
    <input type="text" id="login" name="login" required><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Войти</button>
</form>
<p>Нет аккаунта? <a href="index.php?page=register">Регистрация</a></p>

</form>
</body>
</html>
