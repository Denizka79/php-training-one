<?php
session_start();

session_destroy(); //убиваем сессию пользователя
header("Location: index.php"); //перенаправляем пользователя обратно на страницу ввода логина и пароля
?>