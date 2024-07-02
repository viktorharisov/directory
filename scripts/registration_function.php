<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $conn->real_escape_string($_POST['surname']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $login = $conn->real_escape_string($_POST['login']);
    $password = $conn->real_escape_string($_POST['password']);

    // Проверка заполненности полей
    if (empty($surname) || empty($name) || empty($email) || empty($login) || empty($password)) {
        die("Все поля должны быть заполнены.");
    }

    // Проверка корректности email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Некорректный email.");
    }

    // Проверка уникальности email и логина
    $check_query = "SELECT * FROM users WHERE email='$email' OR login='$login'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        die("Email или логин уже заняты.");
    }

    // Шифрование пароля
    $hashed_password = md5($password);

    // Вставка данных в таблицу users
    $insert_query = $conn->prepare("INSERT INTO users (surname, name, email, login, password) VALUES (?, ?, ?, ?, ?)");
    $insert_query->bind_param("sssss", $surname, $name, $email, $login, $hashed_password);

    if ($insert_query->execute() === TRUE) {
        echo "Регистрация успешна.";
    } else {
        echo "Ошибка: " . $insert_query->error;
    }

    $insert_query->close();
    $conn->close();
}
?>
