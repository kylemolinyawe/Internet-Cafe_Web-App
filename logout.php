<?php
session_start();
session_unset();
session_destroy();
header("location: https://localhost/Internet-Cafe_Web-App/user/login.php");
die();
?>


