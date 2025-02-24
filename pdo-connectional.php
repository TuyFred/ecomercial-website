<?php
// Database connection using PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=db_ecommercial", "root", "Fred0727167240@", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $err) {
    die("Database connection failed: " . $err->getMessage());
}
?>
