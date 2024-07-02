<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login_form.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Защищенная страница</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['user']); ?></h1>
<p>Это защищенная страница, доступная только авторизованным пользователям.</p>
<a href="scripts/logout.php">Выйти</a>
</body>
</html>
