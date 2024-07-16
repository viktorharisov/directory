
<form action="scripts/user_edit.php" method="POST">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required maxlength="50" value="<?php echo htmlspecialchars($userData['name']); ?>"><br>

    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname" required maxlength="50" value="<?php echo htmlspecialchars($userData['surname']); ?>"><br>

    <button type="submit">Сохранить</button>
</form>
<br>
<a href="index.php?page=directory">Вернуться к списку</a>
