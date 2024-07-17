<?php
include '../../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $field = $_POST['field'];
    $value = $conn->real_escape_string($_POST['value']);

    $sql = "SELECT * FROM users WHERE $field='$value'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo 'taken';
    } else {
        echo 'available';
    }

    $conn->close();
}
?>
