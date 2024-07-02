<?php
include 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $complexity = isset($_POST['complexity']) ? (int)$_POST['complexity'] : 3;

    $sql = "UPDATE directory_table SET name='$name', description='$description', complexity=$complexity WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    $sql = "SELECT * FROM directory_table WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Запись не найдена");
    }
}
?>
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
    <input type="submit" value="Сохранить">
</form>
<br>
<a href="../index.php">Вернуться к списку</a>
</body>
</html>
