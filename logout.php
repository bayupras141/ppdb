<?php

session_start();
unset($_SESSION['username']);
session_destroy();

// $url = $router->generate('login');
$url = 'index.php';
header("Location: $url");

?>
