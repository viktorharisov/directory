<?php
echo '
<form id="add-entry-form" action="add_entry.php" method="POST">
    <label for="name">Название:</label>
    <input type="text" id="name" name="name" required maxlength="50">

    <label for="description">Описание:</label>
    <textarea id="description" name="description" required></textarea>

    <label for="complexity">Сложность:</label>
    <input type="number" id="complexity" name="complexity" min="1" max="5" value="3">

    <button type="submit">Добавить запись</button>
</form>
';
?>