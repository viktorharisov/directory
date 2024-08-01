<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginOrEmail = $conn->real_escape_string($_POST['login']);
    $password = $conn->real_escape_string($_POST['password']);

    // Шифрование пароля для сравнения с хранимым паролем
    $hashed_password = md5($password);

    // Проверка логина и пароля
    $sql = "SELECT * FROM users WHERE (login='$loginOrEmail' OR email = '$loginOrEmail')AND password='$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row['login'];
        header("Location: ../index.php?page=directory");
    } else {
        echo '<script>alert("Неверный логин или пароль."); window.location.href = "/index.php?page=login";</script>';
    }
    $conn->close();
}
?>
