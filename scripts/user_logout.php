<?php
session_start();
session_unset();
session_destroy();
header("Location: ../forms/user_login_form.php");
?>
