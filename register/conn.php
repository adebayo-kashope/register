<?php
$host = "127.0.0.1";
$db = "blogger";
$user = "root";
$password = "blackdiamond";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e) {
    // throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// // contact.php
// require 'conn.php';

// $name = "Ore Makinde";
// $subject = "New Contact";
// $message = "This is a new message";
// $email = "ore@gmail.com";

// $statement = $pdo->prepare('INSERT INTO contacts (name, subject, message, email) 
//                            VALUES (:name, :subject, :message, :email) ');

// $statement->execute([
//     ':name' => $name,
//     ':subject' => $subject,
//     ':message' => $message,
//     ':email' => $email
// ]);

// echo "Records saved successfully";