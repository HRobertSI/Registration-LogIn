<?php
session_start();

unset($_SESSION['login_name']);


header('Location: index.php');
exit;