<?php
session_start();

include 'includes/db_connect.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'directory';

if ($page === 'logout') {
    session_unset();
    session_destroy();
    header("Location: index.php?page=login");
    exit;
}

if (!isset($_SESSION['user']) && $page !== 'login' && $page !== 'register') {
    header("Location: index.php?page=login");
    exit;
}

$userData = ['surname' => '', 'name' => ''];
if (isset($_SESSION['user'])) {
    $login = $_SESSION['user'];
    $sql = "SELECT surname, name FROM users WHERE login='$login'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление справочником</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="header">
    <h1>Управление справочником</h1>
    <?php if (isset($_SESSION['user'])): ?>
        <div class="user-info">
            <div class="welcome">Добро пожаловать, <?php echo htmlspecialchars($userData['name']); ?>!</div>
            <div class="user-actions">
                <a href="index.php?page=edit_user" class="button">Изменить данные пользователя</a>
                <a href="csv/export.php" class="button">Экспортировать данные</a>
                <a href="forms/import_form.php" class="button">Импортировать данные</a>

                <a href="index.php?page=logout" class="button logout-button">Выйти</a>
            </div>

        </div>
    <?php endif; ?>
</div>

<div class="container">
    <?php
    switch ($page) {
        case 'login':
            include 'forms/user_login_form.php';
            break;
        case 'register':
            include 'forms/user_register_form.php';
            break;
        case 'edit':
            include 'scripts/entry_edit.php';
            break;
        case 'edit_user':
            include 'forms/user_edit_form.php';
            break;
        case 'directory':
        default:
            include 'forms/entry_add_form.php';
            echo '<h2>Список записей</h2>';
            echo '<table id="entries-table">';
            include 'includes/table_headers.php';
            include 'includes/entries_fetch.php';
            echo '</table>';
            break;
    }
    ?>
</div>
</body>
</html>
