<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление справочником</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Управление справочником</h1>

<?php include 'add_entry_form.php'; ?>

<h2>Список записей</h2>
<table id="entries-table">
    <?php include 'table_headres.php'; ?>
    <?php include 'fetch_entries.php'; ?>
</table>
</body>
</html>
