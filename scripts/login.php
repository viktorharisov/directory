<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $conn->real_escape_string($_POST['login']);
    $password = $conn->real_escape_string($_POST['password']);

    // Шифрование пароля для сравнения с хранимым паролем
    $hashed_password = md5($password);

    // Проверка логина и пароля
    $sql = "SELECT * FROM users WHERE login='$login' AND password='$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $login;
        header("Location: protected_page.php");
    } else {
        echo "Неверный логин или пароль.";
    }
    $conn->close();
}
?>
