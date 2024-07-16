<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Импорт данных</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Импорт данных</h1>
<form action="../csv/import.php" method="post" enctype="multipart/form-data">
    <label for="file">Выберите CSV файл:</label>
    <input type="file" id="file" name="file" required><br>
    <button type="submit">Импортировать</button>
</form>
<br>
<a href="index.php?page=directory">Вернуться к списку</a>
</body>
</html>
