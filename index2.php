<?php
require_once('./functions.php');

include './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$Server = $_ENV['SMTP_SERVER'];
$port = $_ENV['PORT'];
$userName = $_ENV['NAME'];
$password = $_ENV['PASSWORD'];
console_log('used SMPT Server:'.($Server));
console_log('used port:'.($port));
console_log('used userName:'.($userName));
console_log('used password:'.($password));