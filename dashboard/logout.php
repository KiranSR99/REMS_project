<?php
session_start();
session_destroy();

setcookie('name', '', time() - 1);

header('location: ../index.php');
exit();
?>