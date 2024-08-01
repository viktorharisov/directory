<?php
$servername = "mysql-db";
$username = "u0860712_sand10";
$password = "wC0iI3vH7heP5bC7";
$dbname = "u0860712_sandbox10";

$conn = new mysqli($servername, $username, $password, $dbname);

$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
