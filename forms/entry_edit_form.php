<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать запись</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Редактировать запись</h1>
<form method="post" action="">
    <label for="name">Название:</label><br>
    <input type="text" id="name" name="name" required maxlength="50" value="<?php echo htmlspecialchars($row['name']); ?>"><br>
    <label for="description">Описание:</label><br>
    <textarea id="description" name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea><br>
    <label for="complexity">Сложность:</label><br>
    <input type="number" id="complexity" name="complexity" min="1" max="5" value="<?php echo $row['complexity']; ?>"><br><br>
    <button type="submit">Сохранить</button>
</form>
<br>
<a href="/directory_project/index.php">Вернуться к списку</a>
</body>
</html>
