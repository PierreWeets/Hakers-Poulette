<?php
require_once('./vendor/autoload.php');
		Dotenv\Dotenv::createImmutable(__DIR__)->load();
var_dump($_ENV);
		//$SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		$Serveur = $_ENV['SMTP_SERVER'];
        $port = $_ENV['PORT'];
        $userName = $_ENV['NAME'];
		$password = $_ENV['PASSWORD'];
		
		var_dump($Serveur);
		var_dump($port);
		var_dump($userName);
		var_dump($password);