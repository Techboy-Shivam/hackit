
<?php
$host = "localhost";
$db   = "HackItDB";
$user = "root";   
$pass = "";       

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}

// start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
