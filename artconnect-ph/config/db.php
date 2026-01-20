<?php
$host = "localhost";
$user = "root";          // default XAMPP username
$pass = "";              // default XAMPP password (usually empty)
$dbname = "artconnect_db";  // <-- your actual database name

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
