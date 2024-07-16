<?php
include '../includes/db_connect.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;



$sql = "DELETE FROM directory_table WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
