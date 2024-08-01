<?php
ob_start();
include 'includes/db_connect.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $complexity = isset($_POST['complexity']) ? (int)$_POST['complexity'] : 3;

    if ($complexity < 1 || $complexity > 5) {
        $complexity = 3;
    }

    $sql = "UPDATE directory_table SET name='$name', description='$description', complexity=$complexity WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Запись успешно изменена."); window.location.href = "/index.php?page=directory";</script>';
        exit();
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
    include 'forms/entry_edit_form.php';
    ob_end_flush();
}
