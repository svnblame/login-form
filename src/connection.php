<?php
$auth = require __DIR__ . "/../config/auth.php";

// Database credentials
define('DB_HOST', $auth['db']['host']);
define('DB_NAME', $auth['db']['database']);
define('DB_USER', $auth['db']['user']);
define('DB_PASS', $auth['db']['password']);
define('DB_PORT', $auth['db']['port']);

// Create database connection
try {
    $conn = new PDO("mysql:host=" .DB_HOST . ";dbname=" .DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo "DB Connection Error: " . $e->getMessage();
    exit();
}
