<?php
include '../../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $field = $_POST['field'];
    $value = $conn->real_escape_string($_POST['value']);

    if ($field == 'email') {
        // Проверка корректности email
        if (!filter_var($value, FILTER_VALIDATE_EMAIL) || !preg_match("/\.(ru|com|net|org)$/", $value)) {
            echo 'invalid';
            $conn->close();
            exit;
        }
    }

    $sql = "SELECT * FROM users WHERE $field='$value'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo 'taken';
    } else {
        echo 'available';
    }

    $conn->close();
} else {
    echo 'invalid_request';
}
?>
