<?php
include '../includes/db_connect.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $complexity = isset($_POST['complexity']) ? (int)$_POST['complexity'] : 3;

    if ($complexity < 1 || $complexity > 5) {
        $complexity = 3;
    }

    $sql = "INSERT INTO directory_table (name, description, complexity) VALUES ('$name', '$description', $complexity)";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
