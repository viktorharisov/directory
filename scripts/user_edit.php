<?php
session_start();
include '../includes/db_connect.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_SESSION['user'];
    $surname = $conn->real_escape_string($_POST['surname']);
    $name = $conn->real_escape_string($_POST['name']);

    $sql = "UPDATE users SET surname='$surname', name='$name' WHERE login='$login'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Имя и Фамилия успешно сохранились."); window.location.href = "/index.php?page=directory";</script>';
    } else {
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
}
?>

